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
        try {
            $refrenceCategories = Category::where('parent_id', 0)->type([config('consts.category.type.post_reference.value')])->get();
            $refrenceChildCategories = Category::where('parent_id', '!=', 0)->type([config('consts.category.type.post_reference.value')])->get();
            $counselors = User::role('counselor')->get();
            if ($counselors) {
                view()->share('counselors', $counselors);
            }
            if ($refrenceCategories) {
                view()->share('refrenceCategories', $refrenceCategories);
            }
            if ($refrenceChildCategories) {
                view()->share('refrenceChildCategories', $refrenceChildCategories);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }
}
