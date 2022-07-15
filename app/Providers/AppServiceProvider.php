<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Post;
use App\Models\Category;
use App\Models\Product;
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
        $newestPosts = Post::accepted()->latest()->limit(5)->get();
        $newestProducts = Product::limit(5)->orderBy('pub_date', 'desc')->get();
        $postCategories = Category::where('parent_id', 0)->where('type', 'post')->get();
        $productCategories = Category::where('parent_id', 0)->where('type', 'product')->get();
        $tags = Tag::latest()->get();
        $postReferences = Post::accepted()->reference()->latest()->limit(6)->get();

        if ($newestPosts) {
            view()->share('newestPosts', $newestPosts);
        }
        if ($newestProducts) {
            view()->share('newestProducts', $newestProducts);
        }
        if ($postCategories) {
            view()->share('postCategories', $postCategories);
        }
        if ($productCategories) {
            view()->share('productCategories', $productCategories);
        }
        if ($tags) {
            view()->share('tags', $tags);
        }
        if ($postReferences) {
            view()->share('postReferences', $postReferences);
        }
    }
}
