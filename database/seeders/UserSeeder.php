<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'lastname' => 'admin',
            'firstname' => 'super',
            'email' => 'super@admin.com',
            'username' => 'super123',
            'password' => bcrypt('123123123'),
            'role_id' => 1,
        ]);
        User::create([
            'lastname' => 'admin',
            'firstname' => 'super',
            'department_id' => 2,
            'email' => 'test@admin.com',
            'username' => 'admin123',
            'password' => bcrypt('123123123'),
            'role_id' => 2,
        ]);
    }
}
