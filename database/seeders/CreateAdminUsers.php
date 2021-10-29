<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Webpatser\Uuid\Uuid;

class CreateAdminUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUsers = [
            [
                'uuid' => Uuid::generate()->string,
                'name' => 'Lungelo Makhaya',
                'email' => 'imadecode@gmail.com',
                'password' => 'admin12345@'
            ],
            [
                'uuid' => Uuid::generate()->string,
                'name' => 'John Doe',
                'email' => 'john@gmail.com',
                'password' => 'admin12345@'
            ],
            [
                'uuid' => Uuid::generate()->string,
                'name' => 'Jane Doe',
                'email' => 'jane@gmail.com',
                'password' => 'admin12345@'
            ],
        ];


        foreach ($adminUsers as $admin) {
            DB::table('users')->insert([
                'uuid' => $admin['uuid'],
                'name' => $admin['name'],
                'email' => $admin['email'],
                'password' => Hash::make($admin['password']),
            ]);
        }
    }
}
