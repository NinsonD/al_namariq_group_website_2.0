<?php

namespace Modules\Core\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcePath = public_path('admin/img/files/admin');
        copyFilesToStorage($sourcePath, 'avatar');
        $bio = "I'm a digital marketing strategist and SEO specialist with over 7 years of experience in helping businesses grow online. I'm passionate about making SEO simple, effective, and results-driven.";

        User::firstOrCreate(
            ['type' => 'admin', 'username' => 'super_admin'],
            [
                'name' => 'Lisa Hunt',
                'email' => 'admin@gmail.com',
                'bio' => $bio,
                'designation' => 'Super Admin',
                'phone' => '0123456789',
                'address' => 'Dhaka, Bangladesh',
                'zip_code' => '1216',
                'country' => 'Bangladesh',
                'password' => bcrypt('password'),
                'status' => 'active',
                'social_links' => null,
                'avatar' => 'uploads/avatar/avatar-admin.jpg',
                'email_verified_at' => now(),
            ]
        );
    }
}
