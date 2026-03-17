<?php

namespace Modules\Frontend\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Frontend\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcePath = public_path('admin/img/files/contact');
        copyFilesToStorage($sourcePath, 'web');

        $data = [
            [
                'key' => 'contact_one',
                'default' => true,
                'value' => [
                    'name' => 'San Francisco',
                    'image' => 'uploads/web/contact-location-1.jpg',
                    'phone' => '123-456-7890',
                    'email' => 'francisco@mail.com',
                    'address' => '123 San Francisco St, City, Country',
                    'address_link' => 'https://maps.app.goo.gl/878MgLGDS9X65mS48',
                ],
            ],
            [
                'key' => 'contact_two',
                'default'=> false,
                'value' => [
                    'name'=> 'Germany',
                    'image' => 'uploads/web/contact-location-2.jpg',
                    'phone' => '098-765-4321',
                    'email' => 'germany@mail.com',
                    'address' => '789 Berlin St, City, Country',
                    'address_link' => 'https://maps.app.goo.gl/878MgLGDS9X65mS48',
                ]
            ],
            [
                'key' => 'contact_three',
                'default'=> false,
                'value' => [
                    'name'=> 'Germany',
                    'image' => 'uploads/web/contact-location-3.jpg',
                    'phone' => '098-765-4321',
                    'email' => 'germany@mail.com',
                    'address' => '789 Berlin St, City, Country',
                    'address_link' => 'https://maps.app.goo.gl/878MgLGDS9X65mS48',
                ]
            ]
        ];

        foreach ($data as $item) {
            Contact::updateOrCreate(
                ['key' => $item['key']],
                [
                    'value' => $item['value'],
                    'default' => $item['default'] ?? false,
                ]
            );
        }
    }
}
