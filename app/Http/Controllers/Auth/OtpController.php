<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\User;
use App\Notifications\SendOtpNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OtpController extends Controller
{
    public function show()
    {
        if (!session()->has('otp_user_id')) {
            return redirect()->route('login');
        }

        return view('auth.otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'digits:6'],
        ]);

        $userId = session('otp_user_id');
        $otpHash = session('otp_hash');
        $expiresAt = session('otp_expires_at');
        $attempts = session('otp_attempts', 0);

        if (!$userId || !$otpHash || !$expiresAt) {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Sesi OTP sudah tidak tersedia. Silakan login kembali.',
                ]);
        }

        if (now()->greaterThan($expiresAt)) {
            session()->forget([
                'otp_user_id',
                'otp_hash',
                'otp_expires_at',
                'otp_attempts',
                'otp_last_sent_at',
                'otp_remember',
            ]);

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'OTP sudah kedaluwarsa. Silakan login kembali.',
                ]);
        }

        if ($attempts >= 5) {
            session()->forget([
                'otp_user_id',
                'otp_hash',
                'otp_expires_at',
                'otp_attempts',
                'otp_last_sent_at',
                'otp_remember',
            ]);

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Percobaan OTP sudah melebihi batas. Silakan login kembali.',
                ]);
        }

        if (!Hash::check($request->otp, $otpHash)) {
            session()->increment('otp_attempts');

            $user = User::find($userId);

            if ($user) {
                AuditLog::create([
                    'user_id' => $user->id,
                    'aktivitas' => 'OTP Failed',
                    'modul' => 'Authentication',
                    'detail' => 'User memasukkan OTP yang salah',
                ]);
            }

            return back()->withErrors([
                'otp' => 'Kode OTP salah.',
            ]);
        }

        $user = User::findOrFail($userId);

        Auth::login(
            $user,
            session('otp_remember', false)
        );

        $request->session()->regenerate();

        AuditLog::create([
            'user_id' => $user->id,
            'aktivitas' => 'OTP Verified',
            'modul' => 'Authentication',
            'detail' => 'User berhasil melakukan verifikasi OTP',
        ]);

        AuditLog::create([
            'user_id' => $user->id,
            'aktivitas' => 'Login',
            'modul' => 'Authentication',
            'detail' => 'User berhasil login ke sistem setelah verifikasi OTP',
        ]);

        session()->forget([
            'otp_user_id',
            'otp_hash',
            'otp_expires_at',
            'otp_attempts',
            'otp_last_sent_at',
            'otp_remember',
        ]);

        return redirect()->intended(
            route('dashboard', absolute: false)
        );
    }
}
