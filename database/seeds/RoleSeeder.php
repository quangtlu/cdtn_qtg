<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'admin', 'display_name' => 'Quản trị hệ thống'],
            ['name' => 'counselors', 'display_name' => 'Tư vấn viên'],
            ['name' => 'editor', 'display_name' => 'Biên tập viên'],
            ['name' => 'user', 'display_name' => 'Người dùng'],
            ['name' => 'guest', 'display_name' => 'Khách'],
        ];

        Role::insert($roles);   
    }
}
