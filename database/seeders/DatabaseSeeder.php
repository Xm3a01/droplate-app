<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'Admin',
            'guard_name' => 'admin'
        ]);
        Role::create([
            'name' => 'Employee',
            'guard_name' => 'admin'
        ]);
        Role::create([
            'name' => 'Driver',
            'guard_name' => 'admin'
        ]);

        $admin = Admin::create([
            'name' => 'Admin',
            'phone' => '0909090909',
            'address' => 'Nile',
            'email' => 'admin@app.com',
            'password' => Hash::make(12345678)
        ]);

        $admin->assignRole($role->name);

        $permissions = [
            'Manage-reports',
            'Manage-categories',
            'Manage-products',
            'Manage-orders',
        ];

        for ($i=0; $i < count($permissions); $i++) { 
            Permission::create([
                'name' => $permissions[$i],
                'guard_name' => 'admin'
            ]);
        }

        Setting::create([
            'vat' => 15,
            'points' => 10
        ]);
    }
}
