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
            'department_id' => 1,
            'email' => 'super@admin.com',
            'username' => 'admin123',
            'password' => bcrypt('123123123'),
            'role_id' => 1,
        ]);
    }
}
