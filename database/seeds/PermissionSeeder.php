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
    public function assignPermission($modules, $roleName = null)
    {
        if($roleName) {
            $role = Role::create(['name' => $roleName]);
        }

        foreach ($modules as $module) {
            foreach (config('permission.action') as $action) {
                $permission = Permission::create(['name' => $action . '-' . $module]);
                if($roleName) {
                    $role->givePermissionTo($permission);
                }
            }
        }
        if($roleName) {
            return $role;
        }
    }

    public function createUser($roleName, $phone) {
        return User::create([
            'name' => $roleName,
            'email' => $roleName.'@gmail.com',
            'phone' => $phone,
            'gender' => config('consts.user.gender.male.value'),
            'image' => config('consts.user.gender.male.image'),
            'password' => Hash::make('password')
        ]);
    }

    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // permission
        $this->assignPermission(config('permission.module-admin'));
        $approvePost = Permission::create(['name' => 'approve-post']);
        $connectSounselor = Permission::create(['name' => 'connect-counselor']);

        // role 
        $roleEditor = $this->assignPermission(config('permission.module-editor'), 'editor');
        $roleMod = Role::create(['name' => 'mod']);
        $roleMod->givePermissionTo($approvePost);
        $roleMod->givePermissionTo($connectSounselor);
        Role::create(['name' => 'guest']);
        $userRole = Role::create(['name' => 'user']);
        $counselorRole = Role::create(['name' => 'counselor']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo(Permission::all());

        //create user
        $admin = $this->createUser('admin', '0900000001');
        $editor = $this->createUser('editor', '0900000002');
        $mod = $this->createUser('mod', '0900000003');
        $counselor = $this->createUser('counselor', '0900000004');

        // assignRole to user
        $admin->assignRole([$roleAdmin]);
        $editor->assignRole([$roleEditor, $userRole]);
        $mod->assignRole([$roleMod, $userRole]);
        $counselor->assignRole([$counselorRole, $userRole]);
    }
}
