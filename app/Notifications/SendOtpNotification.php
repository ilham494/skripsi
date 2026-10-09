<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendOtpNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected string $otp
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Kode OTP Login - ODSLawFirm')
            ->greeting('Hello!')
            ->line('Gunakan kode OTP berikut untuk melanjutkan proses login:')
            ->line('**' . $this->otp . '**')
            ->line('Kode OTP ini berlaku selama 5 menit.')
            ->line('Jika Anda tidak mencoba login ke akun Anda, abaikan email ini.')
            ->salutation('Regards, ODSLawFirm');
    }
}