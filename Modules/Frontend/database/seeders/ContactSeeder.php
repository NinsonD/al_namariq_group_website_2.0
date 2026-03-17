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
            ],
            [
                'key' => 'contact_four',
                'default' => false,
                'value' => [
                    'name' => 'New York',
                    'image' => 'uploads/web/contact-location-4.jpg',
                    'phone' => '111-222-3333',
                    'email' => 'newyork@mail.com',
                    'address' => '456 New York Ave, City, Country',
                    'address_link' => 'https://maps.app.goo.gl/example4',
                ],
            ],
            [
                'key' => 'contact_five',
                'default' => false,
                'value' => [
                    'name' => 'London',
                    'image' => 'uploads/web/contact-location-5.jpg',
                    'phone' => '444-555-6666',
                    'email' => 'london@mail.com',
                    'address' => '101 London Rd, City, Country',
                    'address_link' => 'https://maps.app.goo.gl/example5',
                ],
            ],
            [
                'key' => 'contact_six',
                'default' => false,
                'value' => [
                    'name' => 'Tokyo',
                    'image' => 'uploads/web/contact-location-6.jpg',
                    'phone' => '777-888-9999',
                    'email' => 'tokyo@mail.com',
                    'address' => '202 Tokyo Blvd, City, Country',
                    'address_link' => 'https://maps.app.goo.gl/example6',
                ],
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
