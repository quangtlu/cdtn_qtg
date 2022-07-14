<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        foreach (config('permission.module') as $module) {
            foreach (config('permission.action') as $action) {
                Permission::create(['name' => $action . ' ' . $module]);
            }
        }
        
        foreach(config('permission.role') as $role) {
            Role::create(['name' => $role]);
        }
        //Super admin
        $userAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '0123456789',
            'gender' => 'nam',
            'image' => 'avatar-nam.jpg',
            'password' => Hash::make('password')
        ]);
        $roleAdmin = Role::create(['name' => 'super-admin']);
        $roleAdmin->givePermissionTo(Permission::all());
        $userAdmin->assignRole([$roleAdmin, 'admin']);
    }
}
