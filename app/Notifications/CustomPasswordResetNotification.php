<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Mail\PasswordResetEmail;
use Illuminate\Auth\Notifications\ResetPassword;

class CustomPasswordResetNotification extends ResetPassword
{
    use Queueable;

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $url = $this->resetUrl($notifiable);

        return (new PasswordResetEmail($url, $notifiable))->to($notifiable->email);
    }

}
