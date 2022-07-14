<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $newestPosts = Post::accepted()->select('id', 'title', 'created_at')->orderBy('created_at', 'desc')->limit(5)->get();
        $categories = Category::where('parent_id', 0)->latest()->get();
        $tags = Tag::latest()->get();
        $postReferences = Post::accepted()->reference()->latest()->limit(6)->get();

        if ($newestPosts) {
            view()->share('newestPosts', $newestPosts);
        }
        if ($categories) {
            view()->share('categories', $categories);
        }
        if ($tags) {
            view()->share('tags', $tags);
        }
        if ($postReferences) {
            view()->share('postReferences', $postReferences);
        }
    }
}
