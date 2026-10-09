<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use App\Models\AuditLog;
use App\Notifications\SendOtpNotification;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $number1 = random_int(1, 9);
        $number2 = random_int(1, 9);

        session([
            'captcha_question' => "{$number1} + {$number2}",
            'captcha_answer' => $number1 + $number2,
        ]);

        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Validasi CAPTCHA + email + password
        // Belum melakukan login ke session Auth
        $user = $request->authenticate();

        /*
        |--------------------------------------------------------------------------
        | Generate OTP
        |--------------------------------------------------------------------------
        */

        $otp = (string) random_int(100000, 999999);

        /*
        |--------------------------------------------------------------------------
        | Simpan OTP ke session
        |--------------------------------------------------------------------------
        */

        session([
            'otp_user_id' => $user->id,
            'otp_hash' => Hash::make($otp),
            'otp_expires_at' => now()->addMinutes(5),
            'otp_attempts' => 0,
            'otp_last_sent_at' => now(),
            'otp_remember' => $request->boolean('remember'),
        ]);

        // CAPTCHA sudah tidak diperlukan setelah login berhasil
        session()->forget('captcha_answer');

        /*
        |--------------------------------------------------------------------------
        | Kirim OTP melalui Email
        |--------------------------------------------------------------------------
        |
        | Jika internet tersedia:
        | - OTP dikirim ke email
        | - status = sent
        |
        | Jika internet tidak tersedia:
        | - SMTP gagal
        | - OTP tetap tersimpan di session
        | - user tetap diarahkan ke halaman OTP
        | - OTP tetap masuk ke log development
        |
        */

        $emailStatus = 'sent';
        $emailError = null;

        try {

            $user->notify(new SendOtpNotification($otp));

        } catch (\Throwable $e) {

            $emailStatus = 'offline';
            $emailError = $e->getMessage();
        }

        /*
        |--------------------------------------------------------------------------
        | Satu Log untuk Satu OTP
        |--------------------------------------------------------------------------
        |
        | OTP hanya dicatat sekali agar tidak muncul dua entry.
        |
        */

        Log::info('OTP Login Generated', [
            'user_id' => $user->id,
            'email' => $user->email,
            'otp' => $otp,
            'expires_at' => now()->addMinutes(5)->format('Y-m-d H:i:s'),
            'email_status' => $emailStatus,
            'error' => $emailError,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Audit Log
        |--------------------------------------------------------------------------
        */

        AuditLog::create([
            'user_id' => $user->id,
            'aktivitas' => 'OTP Sent',
            'modul' => 'Authentication',
            'detail' => $emailStatus === 'sent'
                ? 'Kode OTP login berhasil dikirim ke email user'
                : 'Email OTP gagal dikirim karena SMTP tidak tersedia. OTP tetap tersedia untuk proses login development.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Arahkan ke Halaman OTP
        |--------------------------------------------------------------------------
        */

        return redirect()->route('otp.form');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $userId = auth()->id();

        AuditLog::create([
            'user_id' => $userId,
            'aktivitas' => 'Logout',
            'modul' => 'Authentication',
            'detail' => 'User berhasil logout dari sistem',
        ]);

        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}