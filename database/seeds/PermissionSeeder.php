<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $postPermissions = [
            Permission::create(['name' => 'list post']),
            Permission::create(['name' => 'add post']),
            Permission::create(['name' => 'edit post']),
            Permission::create(['name' => 'delete post']),
        ];
        $userPermissions = [
            Permission::create(['name' => 'list user']),
            Permission::create(['name' => 'add user']),
            Permission::create(['name' => 'edit user']),
            Permission::create(['name' => 'delete user']),
        ];
        $productPermissions = [
            Permission::create(['name' => 'list product']),
            Permission::create(['name' => 'add product']),
            Permission::create(['name' => 'edit product']),
            Permission::create(['name' => 'delete product']),
            Permission::create(['name' => 'show product']),
        ];
        $authorPermissions = [
            Permission::create(['name' => 'list author']),
            Permission::create(['name' => 'add author']),
            Permission::create(['name' => 'edit author']),
            Permission::create(['name' => 'delete author']),
        ];
        $ownerPermissions = [
            Permission::create(['name' => 'list owner']),
            Permission::create(['name' => 'add owner']),
            Permission::create(['name' => 'edit owner']),
            Permission::create(['name' => 'delete owner']),
        ];
        $rolePermissions = [
            Permission::create(['name' => 'list role']),
            Permission::create(['name' => 'add role']),
            Permission::create(['name' => 'edit role']),
            Permission::create(['name' => 'delete role']),
        ];
        $permissionPermissions = [
            Permission::create(['name' => 'list permission']),
            Permission::create(['name' => 'add permission']),
            Permission::create(['name' => 'edit permission']),
            Permission::create(['name' => 'delete permission']),
        ];
        $conservationPermissions = [
            Permission::create(['name' => 'list conservation']),
            Permission::create(['name' => 'add conservation']),
            Permission::create(['name' => 'edit conservation']),
            Permission::create(['name' => 'delete conservation']),
        ];

        $userAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '0123456789',
            'password' => Hash::make('password')
        ]);
        $editorRole = Role::create(['name' => 'editor']);
        $userRole = Role::create(['name' => 'user']);
        $guestRole = Role::create(['name' => 'guest']);
        $counselorRole = Role::create(['name' => 'counselor']);

        $this->setPermissionToTole($postPermissions, $editorRole);
        $this->setPermissionToTole($postPermissions, $userRole);
        $this->setPermissionToTole($postPermissions, $guestRole);
        $this->setPermissionToTole($postPermissions, $counselorRole);

        //Super admin
        $roleAdmin = Role::create(['name' => 'super-admin']);
        $roleAdmin->givePermissionTo(Permission::all());
        $userAdmin->assignRole($roleAdmin);
    }

    public function setPermissionToTole(array $permissions, $role)
    {
        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }
    }
}
