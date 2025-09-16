<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@brandinfluencer.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
            'role' => 'super_admin',
            'is_active' => true,
        ]);

        \App\Models\Admin::create([
            'name' => 'Admin User',
            'email' => 'admin2@brandinfluencer.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
            'role' => 'admin',
            'is_active' => true,
        ]);
    }
}
