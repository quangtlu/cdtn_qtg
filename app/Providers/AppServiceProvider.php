<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;

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
            $newestPosts = Post::select('id','title', 'created_at')->orderBy('created_at', 'desc')->limit(3)->get();
            $categories = Category::select('id','name')->where('parent_id', 0)->orderBy('created_at', 'desc')->get();
            $tags = Tag::select('id','name')->orderBy('created_at', 'desc')->get();
            $categoryReference = Category::where('name', config('consts.category_reference.name'))->first();

            if($categoryReference) {
                $postReferences = $categoryReference->posts;
            }
            if($newestPosts) {
                view()->share('newestPosts', $newestPosts);
            }
            if($categories) {
                view()->share('categories', $categories);
            }
            if($tags) {
                view()->share('tags', $tags);
            }
            if($postReferences) {
                view()->share('postReferences', $postReferences);
            }
    }
}
