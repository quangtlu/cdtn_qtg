<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostCategory;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([
            'name' => config('consts.category.type.post_reference.name'),
            'type' => config('consts.category.type.post_reference.value'),
        ]);
        Post::insert(config('consts.post_reference'));
        $postIds = [1, 2, 3];
        foreach($postIds as $postId) {
            PostCategory::insert([
                'category_id' => $category->id,
                'post_id' => $postId,
            ]);
        }
    }
}
