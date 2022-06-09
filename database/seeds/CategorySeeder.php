<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'parent_id' => 0,
            'type_id' => 1,
            'name' => 'Tài liệu tham khảo'
        ]);
        factory(Category::class, 20)->create();
    }
}
