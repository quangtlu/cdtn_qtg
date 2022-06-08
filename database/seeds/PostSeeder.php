<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 100)->create();
        factory(PostCategory::class, 100)->create();
        factory(PostTag::class, 100)->create();
        factory(Comment::class, 200)->create();
    }
}
