<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Post;

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
            $newestPosts = Post::select('title', 'created_at')->orderBy('created_at', 'desc')->limit(3)->get();
            view()->share('newestPosts', $newestPosts);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
}
