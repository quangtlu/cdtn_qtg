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

        $postPermissionsUser = [
            Permission::create(['name' => 'user add post']),
            Permission::create(['name' => 'user edit post']),
            Permission::create(['name' => 'user delete post']),
        ];

        $postPermissionsAdmin = [
            Permission::create(['name' => 'admin list post']),
            Permission::create(['name' => 'admin add post']),
            Permission::create(['name' => 'admin edit post']),
            Permission::create(['name' => 'admin delete post']),
        ];

        $userPermissions = [
            Permission::create(['name' => 'admin list user']),
            Permission::create(['name' => 'admin add user']),
            Permission::create(['name' => 'admin edit user']),
            Permission::create(['name' => 'admin delete user']),
        ];

        $productPermissions = [
            Permission::create(['name' => 'admin list product']),
            Permission::create(['name' => 'admin add product']),
            Permission::create(['name' => 'admin edit product']),
            Permission::create(['name' => 'admin delete product']),
            Permission::create(['name' => 'admin show product']),
        ];
        $authorPermissions = [
            Permission::create(['name' => 'admin list author']),
            Permission::create(['name' => 'admin add author']),
            Permission::create(['name' => 'admin edit author']),
            Permission::create(['name' => 'admin delete author']),
        ];
        $ownerPermissions = [
            Permission::create(['name' => 'admin list owner']),
            Permission::create(['name' => 'admin add owner']),
            Permission::create(['name' => 'admin edit owner']),
            Permission::create(['name' => 'admin delete owner']),
        ];
        $rolePermissions = [
            Permission::create(['name' => 'admin list role']),
            Permission::create(['name' => 'admin add role']),
            Permission::create(['name' => 'admin edit role']),
            Permission::create(['name' => 'admin delete role']),
        ];
        $permissionPermissions = [
            Permission::create(['name' => 'admin list permission']),
            Permission::create(['name' => 'admin add permission']),
            Permission::create(['name' => 'admin edit permission']),
            Permission::create(['name' => 'admin delete permission']),
        ];
        $conservationPermissions = [
            Permission::create(['name' => 'admin list conservation']),
            Permission::create(['name' => 'admin add conservation']),
            Permission::create(['name' => 'admin edit conservation']),
            Permission::create(['name' => 'admin delete conservation']),
        ];

        $faqPermissions = [
            Permission::create(['name' => 'list faq']),
            Permission::create(['name' => 'admin add faq']),
            Permission::create(['name' => 'admin edit faq']),
            Permission::create(['name' => 'admin delete faq']),
        ];

        $profilePermissions = [
            Permission::create(['name' => 'show profile']),
            Permission::create(['name' => 'edit profile']),
        ];
        $categoryPermissions = [
            Permission::create(['name' => 'admin list category']),
            Permission::create(['name' => 'admin add category']),
            Permission::create(['name' => 'admin edit category']),
            Permission::create(['name' => 'admin delete category']),
        ];


        $userAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '0123456789',
            'gender' => 'nam',
            'image' => 'avatar-nam.jpg',
            'password' => Hash::make('password')
        ]);
        $editorRole = Role::create(['name' => 'editor']);
        $userRole = Role::create(['name' => 'user']);
        $counselorRole = Role::create(['name' => 'counselor']);

        $this->setPermissionToTole($postPermissionsAdmin, $editorRole);
        $this->setPermissionToTole($faqPermissions, $editorRole);
        $this->setPermissionToTole($postPermissionsUser, $userRole);

        $counselorRole->givePermissionTo(['admin list product', 'admin list owner', 'admin list author', 'admin show product', 'admin list faq']);

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
