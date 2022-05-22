<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['key_code' =>'manage_user' ,'name' => 'Quản lý người dùng', 'display_name' => 'Quản lý người dùng', 'parent_id' => 0],
            ['key_code' =>'manage_author' ,'name' => 'Quản lý tác giả', 'display_name' => 'Quản lý tác giả', 'parent_id' => 0],
            ['key_code' =>'manage_product' ,'name' => 'Quản lý tác phẩm', 'display_name' => 'Quản lý tác phẩm', 'parent_id' => 0],
            ['key_code' =>'manage_owner' ,'name' => 'Quản lý chủ sở hữu', 'display_name' => 'Quản lý chủ sở hữu', 'parent_id' => 0],
            ['key_code' =>'manage_role' ,'name' => 'Quản lý vai trò', 'display_name' => 'Quản lý vai trò', 'parent_id' => 0],
            ['key_code' =>'manage_permission' ,'name' => 'Quản lý quyền', 'display_name' => 'Quản lý quyền', 'parent_id' => 0],

            ['key_code' =>'list_user' , 'name' => 'Xem danh sách người dùng', 'display_name' => 'Xem danh sách người dùng', 'parent_id' => 1],
            ['key_code' =>'list_author' , 'name' => 'Xem danh sách tác giả', 'display_name' => 'Xem danh sách tác giả', 'parent_id' => 2],
            ['key_code' =>'list_product' , 'name' => 'Xem danh sách tác phẩm', 'display_name' => 'Xem danh sách tác phẩm', 'parent_id' => 3],
            ['key_code' =>'list_owner' , 'name' => 'Xem danh sách chủ sở hữu', 'display_name' => 'Xem danh sách chủ sở hữu', 'parent_id' => 4],
            ['key_code' =>'list_role' , 'name' => 'Xem danh sách vai trò', 'display_name' => 'Xem danh sách vai trò', 'parent_id' => 5],
            ['key_code' =>'list_permission' , 'name' => 'Xem danh sách quyền', 'display_name' => 'Xem danh sách quyền', 'parent_id' => 6],

            ['key_code' =>'add_user' , 'name' => 'Thêm mới người dùng', 'display_name' => 'Thêm mới người dùng', 'parent_id' => 1],
            ['key_code' =>'add_author' , 'name' => 'Thêm mới tác giả', 'display_name' => 'Thêm mới tác giả', 'parent_id' => 2],
            ['key_code' =>'add_product' , 'name' => 'Thêm mới tác phẩm', 'display_name' => 'Thêm mới tác phẩm', 'parent_id' => 3],
            ['key_code' =>'add_owner' , 'name' => 'Thêm mới chủ sở hữu', 'display_name' => 'Thêm mới chủ sở hữu', 'parent_id' => 4],
            ['key_code' =>'add_role' , 'name' => 'Thêm mới vai trò', 'display_name' => 'Thêm mới vai trò', 'parent_id' => 5],
            ['key_code' =>'add_permission' , 'name' => 'Thêm mới quyền', 'display_name' => 'Thêm mới quyền', 'parent_id' => 6],

            ['key_code' =>'edit_user' , 'name' => 'Chỉnh sửa người dùng', 'display_name' => 'Chỉnh sửa người dùng', 'parent_id' => 1],
            ['key_code' =>'edit_author' , 'name' => 'Chỉnh sửa tác giả', 'display_name' => 'Chỉnh sửa tác giả', 'parent_id' => 2],
            ['key_code' =>'edit_product' , 'name' => 'Chỉnh sửa tác phẩm', 'display_name' => 'Chỉnh sửa tác phẩm', 'parent_id' => 3],
            ['key_code' =>'edit_owner' , 'name' => 'Chỉnh sửa chủ sở hữu', 'display_name' => 'Chỉnh sửa chủ sở hữu', 'parent_id' => 4],
            ['key_code' =>'edit_role' , 'name' => 'Chỉnh sửa vai trò', 'display_name' => 'Chỉnh sửa vai trò', 'parent_id' => 5],
            ['key_code' =>'edit_permission' , 'name' => 'Chỉnh sửa quyền', 'display_name' => 'Chỉnh sửa quyền', 'parent_id' => 6],

            ['key_code' =>'delete_user' , 'name' => 'Xóa người dùng', 'display_name' => 'Xóa người dùng', 'parent_id' => 1],
            ['key_code' =>'delete_author' , 'name' => 'Xóa tác giả', 'display_name' => 'Xóa tác giả', 'parent_id' => 2],
            ['key_code' =>'delete_product' , 'name' => 'Xóa tác phẩm', 'display_name' => 'Xóa tác phẩm', 'parent_id' => 3],
            ['key_code' =>'delete_owner' , 'name' => 'Xóa chủ sở hữu', 'display_name' => 'Xóa chủ sở hữu', 'parent_id' => 4],
            ['key_code' =>'delete_role' , 'name' => 'Xóa vai trò', 'display_name' => 'Xóa vai trò', 'parent_id' => 5],
            ['key_code' =>'delete_permission' , 'name' => 'Xóa quyền', 'display_name' => 'Xóa quyền', 'parent_id' => 6],

        ];

        Permission::insert($roles);
    }
}
