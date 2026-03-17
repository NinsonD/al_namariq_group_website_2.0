<?php

namespace Modules\NewsLetter\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\NewsLetter\Models\NewsLetter;

class NewsLetterDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emails = [
            'john.doe@mail.com',
            'jane.smith@mail.com',
            'michael.brown@mail.com',
            'sarah.jones@mail.com',
            'david.wilson@mail.com',
            'emily.davis@mail.com',
            'daniel.miller@mail.com',
            'olivia.moore@mail.com',
            'james.taylor@mail.com',
            'lisa.anderson@mail.com',
            'brian.clark@mail.com',
            'laura.hill@mail.com',
            'kevin.scott@mail.com',
            'chloe.adams@mail.com',
            'ryan.morgan@mail.com',
        ];

        foreach ($emails as $email) {
            NewsLetter::create([
                'email' => $email,
                'is_verified' => true,
                'verify_token' => null,
            ]);
        }

    }
}
