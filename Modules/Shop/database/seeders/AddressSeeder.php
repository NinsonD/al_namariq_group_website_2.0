<?php

namespace Modules\Shop\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('type', 'user')->get();

        if($users->isNotEmpty()){
            foreach ($users as $user) {
                $user->address()->createMany([
                    [
                        'title'      => 'Home',
                        'first_name' => $user->name,
                        'email'      => $user->email,
                        'phone'      => $user->phone,
                        'address'    => $user->address,
                        'province'   => 'California',
                        'city'       => 'Los Angeles',
                        'zip_code'   => $user->zip_code,
                        'country'    => 'USA',
                    ],
                    [
                        'title'      => 'Office',
                        'first_name' => $user->name,
                        'email'      => $user->email,
                        'phone'      => $user->phone,
                        'address'    => $user->address,
                        'province'   => 'California',
                        'city'       => 'San Diego',
                        'zip_code'   => $user->zip_code,
                        'country'    => 'USA',
                    ],
                    [
                        'title'      => 'Warehouse',
                        'first_name' => $user->name,
                        'email'      => $user->email,
                        'phone'      => $user->phone,
                        'address'    => $user->address,
                        'province'   => 'Nevada',
                        'city'       => 'Las Vegas',
                        'zip_code'   => $user->zip_code,
                        'country'    => 'USA',
                    ],
                ]);
            }
        }

    }
}
