<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait GlobalInfoTrait
{
    private function set_mail_config() {
        $settings = Cache::get('setting');
        $mailConfig = [
            'transport'  => 'smtp',
            'host'       => $settings->mail_host ?? 'smtp.mail.io',
            'port'       => $settings->mail_port ?? 2525,
            'encryption' => $settings->mail_encryption ?? 'tls',
            'username'   => $settings->mail_username ?? 'mail_username',
            'password'   => $settings->mail_password ?? 'mail_password',
            'timeout'    => null,
        ];

        config(['mail.mailers.smtp' => $mailConfig]);
        config(['mail.from.address' => $settings->mail_sender_email ?? '']);
        config(['mail.from.name' => $settings->mail_sender_name ?? '']);
    }
}
