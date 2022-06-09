<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ChatroomSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(OwnerSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(FaqSeeder::class);
    }
}
