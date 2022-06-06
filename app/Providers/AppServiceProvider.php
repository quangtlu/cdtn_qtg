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
            $newestPosts = Post::select('title', 'created_at')->orderBy('created_at', 'desc')->limit(3)->get();
            $categories = Category::select('name')->where('parent_id', 0)->orderBy('created_at', 'desc')->get();
            $tags = Tag::select('name')->orderBy('created_at', 'desc')->get();
    
            view()->share('newestPosts', $newestPosts);
            view()->share('categories', $categories);
            view()->share('tags', $tags);
    }
}
