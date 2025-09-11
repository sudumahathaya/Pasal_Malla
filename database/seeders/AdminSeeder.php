<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@pasalmalla.lk',
            'password' => Hash::make('admin123'),
            'role' => 'super_admin',
            'is_active' => true,
        ]);

        Admin::create([
            'name' => 'Admin User',
            'email' => 'manager@pasalmalla.lk',
            'password' => Hash::make('manager123'),
            'role' => 'admin',
            'is_active' => true,
        ]);
    }
}