<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate(['name' => Role::ROLE_ADMIN]);
        Role::firstOrCreate(['name' => Role::ROLE_STAFF]);
        Role::firstOrCreate(['name' => Role::ROLE_QA_Manager]);
        Role::firstOrCreate(['name' => Role::ROLE_QA_Coordinator]);
        Department::firstOrCreate(['name' => Department::SUPPORT]);
        Department::firstOrCreate(['name' => Department::ACADEMIC]);
        \App\Models\User::factory(10)->create();
    }
}
