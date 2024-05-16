<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'admin@demo.com',
            'password' => Hash::make('admin'),
            'user_roles_id' => 1,
        ]);

        \App\Models\User::create([
            'name' => 'Staf',
            'email' => 'staff@demo.com',
            'password' => Hash::make('12345678'),
            'user_roles_id' => 2,
        ]);
    }
}
