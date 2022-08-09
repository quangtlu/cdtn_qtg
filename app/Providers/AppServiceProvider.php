<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Post;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;

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
        $refrenceCategories = Category::where('parent_id', 0)->type([config('consts.category.type.post_reference.value')])->get();
        $productCategories = Category::where('parent_id', 0)->type([config('consts.category.type.product.value')])->get();
        $tags = Tag::latest()->get();
        $postReferences = Post::accepted()->reference()->latest()->limit(6)->get();
        $counselors = User::role('counselor')->get();
        if ($newestPosts) {
            view()->share('newestPosts', $newestPosts);
        }
        if ($counselors) {
            view()->share('counselors', $counselors);
        }
        if ($newestProducts) {
            view()->share('newestProducts', $newestProducts);
        }
        if ($refrenceCategories) {
            view()->share('refrenceCategories', $refrenceCategories);
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
