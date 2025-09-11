<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::firstOrCreate(['email' => 'admin@pasalmalla.lk'], [
            'name' => 'Super Admin',
            'email' => 'admin@pasalmalla.lk',
            'password' => Hash::make('admin123'),
            'role' => 'super_admin',
            'is_active' => true,
        ]);

        Admin::firstOrCreate(['email' => 'manager@pasalmalla.lk'], [
            'name' => 'Admin User',
            'email' => 'manager@pasalmalla.lk',
            'password' => Hash::make('manager123'),
            'role' => 'admin',
            'is_active' => true,
        ]);
    }
}
