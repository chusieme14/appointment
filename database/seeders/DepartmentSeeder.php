<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name'=>'MIT',
            'short_name'=>'MIT'
        ]);
        Department::create([
            'name'=>'College of Engineering and Teachnology',
            'short_name'=>'CET'
        ]);
        Department::create([
            'name'=>'College of Management',
            'short_name'=>'COM'
        ]);
        Department::create([
            'name'=>'College of Information Technology',
            'short_name'=>'CIT'
        ]);
        Department::create([
            'name'=>'College of Education',
            'short_name'=>'COE'
        ]);
        Department::create([
            'name'=>'College of Arts and Sciences',
            'short_name'=>'CAS'
        ]);
        Department::create([
            'name'=>'Student Affairs and Services',
            'short_name'=>'SAS'
        ]);
    }
}
