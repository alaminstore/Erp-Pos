<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'designation' => 'Admin User',
                'email' => 'admin@admin.com',
                'password' => bcrypt(123456)
            ],
        ];
        DB::table('users')->truncate();
        DB::table('users')->insert($users);
    }
}
