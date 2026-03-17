<?php

namespace Modules\Team\Database\Seeders;

use Modules\Team\Models\Team;
use Illuminate\Database\Seeder;
use Str;

class TeamDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcePath = public_path('admin/img/files/team');
        copyFilesToStorage($sourcePath, 'team');

        $social = [
            [
                'icon' => 'fa-brands fa-facebook-f',
                'url' => '#',
            ],
            [
                'icon' => 'fa-brands fa-x-twitter',
                'url' => '#',
            ],
            [
                'icon' => 'fa-brands fa-linkedin-in',
                'url' => '#',
            ],
        ];

        $teams = [
            [
                'name' => 'Mylon Smith',
                'designation' => 'Web Developer',
                'email' => 'mylon@mail.com',
                'phone' => '+1 234 567 890',
                'qualification' => 'BSc in Computer Science',
                'location' => 'New York, USA',
                'age' => 30,
                'gender' => 'male',
            ],
            [
                'name' => 'Anna Brown',
                'designation' => 'UI/UX Designer',
                'email' => 'anna@mail.com',
                'phone' => '+1 234 567 891',
                'qualification' => 'BA in Graphic Design',
                'location' => 'Los Angeles, USA',
                'age' => 28,
                'gender' => 'male',
            ],
            [
                'name' => 'Jake Williams',
                'designation' => 'Backend Developer',
                'email' => 'jake@mail.com',
                'phone' => '+1 234 567 892',
                'qualification' => 'MSc in Software Engineering',
                'location' => 'San Francisco, USA',
                'age' => 32,
                'gender'=> 'female',
            ],
            [
                'name' => 'Emily Clark',
                'designation' => 'Frontend Developer',
                'email' => 'emily@mail.com',
                'phone' => '+1 234 567 893',
                'qualification' => 'BSc in Web Development',
                'location' => 'Chicago, USA',
                'age' => 29,
                'gender'=> 'female',
            ],
            [
                'name' => 'Liam Johnson',
                'designation' => 'Project Manager',
                'email' => 'liam@mail.com',
                'phone' => '+1 234 567 894',
                'qualification' => 'MBA in Project Management',
                'location' => 'Miami, USA',
                'age' => 35,
                'gender'=> 'male',
            ],
            [
                'name' => 'Sophia Lewis',
                'designation' => 'QA Engineer',
                'email' => 'sophia@mail.com',
                'phone' => '+1 234 567 895',
                'qualification' => 'BSc in Information Technology',
                'location' => 'Seattle, USA',
                'age' => 27,
                'gender'=> 'female',
            ],
            [
                'name' => 'Noah Lee',
                'designation' => 'DevOps Engineer',
                'email' => 'noah@mail.com',
                'phone' => '+1 234 567 896',
                'qualification' => 'BSc in Computer Engineering',
                'location' => 'Austin, USA',
                'age' => 31,
                'gender' => 'male',
            ],
            [
                'name' => 'Isabella King',
                'designation' => 'Marketing Head',
                'email' => 'isabella@mail.com',
                'phone' => '+1 234 567 897',
                'qualification' => 'MBA in Marketing',
                'location' => 'Boston, USA',
                'age' => 34,
                'gender' => 'male',
            ],
            [
                'name' => 'Mason Hill',
                'designation' => 'Content Writer',
                'email' => 'mason@mail.com',
                'phone' => '+1 234 567 898',
                'qualification' => 'BA in English Literature',
                'location' => 'Denver, USA',
                'age' => 26,
                'gender' => 'male',
            ],
            [
                'name' => 'Olivia Scott',
                'designation' => 'Support Lead',
                'email' => 'olivia@mail.com',
                'phone' => '+1 234 567 899',
                'qualification' => 'BSc in Communication',
                'location' => 'Phoenix, USA',
                'age' => 33,
                'gender' => 'male',
            ],
        ];

        $bio = 'As an artist here to solve such issues, we successfully filed several mandamus cases on behalf of more than 250 artwork and their family members and had approved green cards within several months after filing a complaint.';

        foreach ($teams as $index => $team) {
            $index = $index + 1;
            Team::create([
                'name'=> $team['name'],
                'username' => Str::slug($team['name']),
                'designation' => $team['designation'],
                'email' => $team['email'],
                'phone' => $team['phone'],
                'qualification' => $team['qualification'],
                'location' => $team['location'],
                'age' => $team['age'],
                'gender'=> $team['gender'] ?? 'male',
                'image' => "uploads/team/team-{$index}.jpg",
                'social_links' => $social,
                'bio' => $bio,
            ]);
        }
    }
}
