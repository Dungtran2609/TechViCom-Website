<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
                'phone_number' => '123456789',
                'image_profile' => 'profile1.jpg',
                'is_active' => true,
                'birthday' => '1990-01-01',
                'gender' => 'male',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password123'),
                'phone_number' => '987654321',
                'image_profile' => 'profile2.jpg',
                'is_active' => true,
                'birthday' => '1992-05-15',
                'gender' => 'female',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
