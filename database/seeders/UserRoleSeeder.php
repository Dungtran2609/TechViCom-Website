<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_roles')->insert([
            ['user_id' => 1, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()], // John - Admin
            ['user_id' => 1, 'role_id' => 2, 'created_at' => now(), 'updated_at' => now()], // John - Editor
            ['user_id' => 2, 'role_id' => 3, 'created_at' => now(), 'updated_at' => now()], // Jane - Viewer
        ]);
    }
}
