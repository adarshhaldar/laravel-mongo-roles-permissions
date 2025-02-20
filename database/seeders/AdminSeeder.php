<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::updateOrCreate(['email' => 'admin@admin.com'], [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Admin@123')
        ]);

        $role = Role::where('name', 'admin')->first();

        $admin->role_id = $role->_id;
        $admin->save();
    }
}
