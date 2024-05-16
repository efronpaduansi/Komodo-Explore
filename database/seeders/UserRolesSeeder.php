<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\UserRole::create([
            'role_name' => 'Admin',
        ]);

        \App\Models\UserRole::create([
            'role_name' => 'Staff',
        ]);

        \App\Models\UserRole::create([
            'role_name' => 'Customer',
        ]);
    }
}
