<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => true]);
//Admin
Route::middleware('auth')->group(function () {
    Route::name('admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('.dashboard');

        Route::name('.users')->group(function () {
            Route::prefix('/users')->group(function () {
                Route::get('/', 'Admin\UserController@index')->name('.index')->middleware('can:admin list user');
                Route::get('/create', 'Admin\UserController@create')->name('.create')->middleware('can:admin add user');
                Route::post('/store', 'Admin\UserController@store')->name('.store')->middleware('can:admin add user');
                Route::get('/edit/{id}', 'Admin\UserController@edit')->name('.edit')->middleware('can:admin edit user');
                Route::post('/update/{id}', 'Admin\UserController@update')->name('.update')->middleware('can:admin edit user');
                Route::get('/destroy/{id}', 'Admin\UserController@destroy')->name('.destroy')->middleware('can:admin delete user');
            });
        });

        Route::name('.authors')->group(function () {
            Route::prefix('/authors')->group(function () {
                Route::get('/', 'Admin\AuthorController@index')->name('.index')->middleware('can:admin list author');
                Route::get('/create', 'Admin\AuthorController@create')->name('.create')->middleware('can:admin add author');
                Route::post('/store', 'Admin\AuthorController@store')->name('.store')->middleware('can:admin add author');
                Route::get('/edit/{id}', 'Admin\AuthorController@edit')->name('.edit')->middleware('can:admin edit author');
                Route::post('/update/{id}', 'Admin\AuthorController@update')->name('.update')->middleware('can:admin edit author');
                Route::get('/destroy/{id}', 'Admin\AuthorController@destroy')->name('.destroy')->middleware('can:admin delete author');
            });
        });

        Route::name('.products')->group(function () {
            Route::prefix('/products')->group(function () {
                Route::get('/', 'Admin\ProductController@index')->name('.index')->middleware('can:admin list product');
                Route::get('/create', 'Admin\ProductController@create')->name('.create')->middleware('can:admin add product');
                Route::post('/store', 'Admin\ProductController@store')->name('.store')->middleware('can:admin add product');
                Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('.edit')->middleware('can:admin edit product');
                Route::post('/update/{id}', 'Admin\ProductController@update')->name('.update')->middleware('can:admin edit product');
                Route::get('/show/{id}', 'Admin\ProductController@show')->name('.show')->middleware('can:admin show product');
                Route::get('/destroy/{id}', 'Admin\ProductController@destroy')->name('.destroy')->middleware('can:admin delete product');
            });
        });

        Route::name('.owners')->group(function () {
            Route::prefix('/owners')->group(function () {
                Route::get('/', 'Admin\OwnerController@index')->name('.index')->middleware('can:admin list owner');
                Route::get('/create', 'Admin\OwnerController@create')->name('.create')->middleware('can:admin add owner');
                Route::post('/store', 'Admin\OwnerController@store')->name('.store')->middleware('can:admin add owner');
                Route::get('/edit/{id}', 'Admin\OwnerController@edit')->name('.edit')->middleware('can:admin edit owner');
                Route::post('/update/{id}', 'Admin\OwnerController@update')->name('.update')->middleware('can:admin edit owner');
                Route::get('/destroy/{id}', 'Admin\OwnerController@destroy')->name('.destroy')->middleware('can:admin delete owner');
            });
        });

        Route::name('.roles')->group(function () {
            Route::prefix('/roles')->group(function () {
                Route::get('/', 'Admin\RoleController@index')->name('.index')->middleware('can:admin list role');
                Route::get('/create', 'Admin\RoleController@create')->name('.create')->middleware('can:admin add role');
                Route::post('/store', 'Admin\RoleController@store')->name('.store')->middleware('can:admin add role');
                Route::get('/edit/{id}', 'Admin\RoleController@edit')->name('.edit')->middleware('can:admin edit role');
                Route::post('/update/{id}', 'Admin\RoleController@update')->name('.update')->middleware('can:admin edit role');
                Route::get('/destroy/{id}', 'Admin\RoleController@destroy')->name('.destroy')->middleware('can:admin delete role');
            });
        });

        Route::name('.permissions')->group(function () {
            Route::prefix('/permissions')->group(function () {
                Route::get('/', 'Admin\PermissionController@index')->name('.index')->middleware('can:admin list role');
                Route::post('/store', 'Admin\PermissionController@store')->name('.store')->middleware('can:admin add role');
                Route::get('/destroy/{id}', 'Admin\PermissionController@destroy')->name('.destroy')->middleware('can:admin delete role');
            });
        });

        Route::name('.conversations')->group(function () {
            Route::prefix('/conversations')->group(function () {
                Route::get('/', 'Admin\ConversationController@index')->name('.index')->middleware('can:admin list role');
                Route::get('/create', 'Admin\ConversationController@create')->name('.create')->middleware('can:admin add role');
                Route::post('/store', 'Admin\ConversationController@store')->name('.store')->middleware('can:admin add role');
            });
        });

        Route::name('.posts')->group(function () {
            Route::prefix('/posts')->group(function () {
                Route::get('/', 'Admin\PostController@index')->name('.index')->middleware('can:admin list post');
                Route::get('/create', 'Admin\PostController@create')->name('.create')->middleware('can:admin add post');
                Route::post('/store', 'Admin\PostController@store')->name('.store')->middleware('can:admin add post');
                Route::get('/edit/{id}', 'Admin\PostController@edit')->name('.edit')->middleware('can:admin edit post');
                Route::post('/update/{id}', 'Admin\PostController@update')->name('.update')->middleware('can:admin edit post');
                Route::get('/show/{id}', 'Admin\PostController@show')->name('.show')->middleware('can:admin delete post');
                Route::get('/destroy/{id}', 'Admin\PostController@destroy')->name('.destroy')->middleware('can:admin delete post');
            });
        });

        Route::name('.faqs')->group(function () {
            Route::prefix('/faqs')->group(function () {
                Route::get('/', 'Admin\FaqController@index')->name('.index')->middleware('can:admin list faq');
                Route::get('/create', 'Admin\FaqController@create')->name('.create')->middleware('can:admin add faq');
                Route::post('/store', 'Admin\FaqController@store')->name('.store')->middleware('can:admin add faq');
                Route::get('/edit/{id}', 'Admin\FaqController@edit')->name('.edit')->middleware('can:admin edit faq');
                Route::post('/update/{id}', 'Admin\FaqController@update')->name('.update')->middleware('can:admin edit faq');
                Route::get('/destroy/{id}', 'Admin\FaqController@destroy')->name('.destroy')->middleware('can:admin delete faq');
            });
        });

        Route::name('.profile')->group(function(){
            Route::prefix('/profile-user')->group(function() {
                Route::get('/', 'Admin\ProfileController@index')->name('.index')->middleware('can:admin show profile');
                Route::get('/edit/{id}', 'Admin\ProfileController@edit')->name('.edit')->middleware('can:admin edit profile');
                Route::post('/update{id}', 'Admin\ProfileController@update')->name('.update')->middleware('can:admin edit profile');
            });
        });

        Route::name('.tags')->group(function () {
            Route::prefix('/tags')->group(function () {
                Route::get('/', 'Admin\TagController@index')->name('.index')->middleware('can:list faq');
                Route::get('/create', 'Admin\TagController@create')->name('.create')->middleware('can:add faq');
                Route::post('/store', 'Admin\TagController@store')->name('.store')->middleware('can:add faq');
                Route::get('/edit/{id}', 'Admin\TagController@edit')->name('.edit')->middleware('can:edit faq');
                Route::post('/update/{id}', 'Admin\TagController@update')->name('.update')->middleware('can:edit faq');
                Route::get('/destroy/{id}', 'Admin\TagController@destroy')->name('.destroy')->middleware('can:delete faq');
            });
        });
    });


});

//Home
Route::get('/', 'home\HomeController@index')->name('home.index');
Route::get('/faq', 'home\FaqController@index')->name('faq.index');
Route::name('posts')->prefix('posts')->group(function () {
    Route::get('/', 'home\PostController@index')->name('.index');
    Route::get('/{id}', 'home\PostController@show')->name('.show');
});

Route::middleware('auth')->group(function () {
    Route::name('posts')->prefix('posts')->group(function () {
        Route::post('/store', 'home\PostController@store')->name('.store')->middleware('can:user add post');
        Route::post('/update/{id}', 'home\PostController@update')->name('.update')->middleware('can:user edit post');
        Route::get('/destroy/{id}', 'home\PostController@destroy')->name('.destroy')->middleware('can:user delete post');
    });
});






