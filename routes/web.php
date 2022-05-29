<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => true]);
//Admin
Route::middleware('auth')->group(function () {
    Route::name('admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('.dashboard');

        Route::name('.users')->group(function () {
            Route::prefix('/users')->group(function () {
                Route::get('/', 'Admin\UserController@index')->name('.index')->middleware('can:list user');
                Route::get('/create', 'Admin\UserController@create')->name('.create')->middleware('can:add user');
                Route::post('/store', 'Admin\UserController@store')->name('.store')->middleware('can:add user');
                Route::get('/edit/{id}', 'Admin\UserController@edit')->name('.edit')->middleware('can:edit user');
                Route::post('/update/{id}', 'Admin\UserController@update')->name('.update')->middleware('can:edit user');
                Route::get('/destroy/{id}', 'Admin\UserController@destroy')->name('.destroy')->middleware('can:delete user');
            });
        });

        Route::name('.authors')->group(function () {
            Route::prefix('/authors')->group(function () {
                Route::get('/', 'Admin\AuthorController@index')->name('.index')->middleware('can:list author');
                Route::get('/create', 'Admin\AuthorController@create')->name('.create')->middleware('can:add author');
                Route::post('/store', 'Admin\AuthorController@store')->name('.store')->middleware('can:add author');
                Route::get('/edit/{id}', 'Admin\AuthorController@edit')->name('.edit')->middleware('can:edit author');
                Route::post('/update/{id}', 'Admin\AuthorController@update')->name('.update')->middleware('can:edit author');
                Route::get('/destroy/{id}', 'Admin\AuthorController@destroy')->name('.destroy')->middleware('can:delete author');
            });
        });

        Route::name('.products')->group(function () {
            Route::prefix('/products')->group(function () {
                Route::get('/', 'Admin\ProductController@index')->name('.index')->middleware('can:list product');
                Route::get('/create', 'Admin\ProductController@create')->name('.create')->middleware('can:add product');
                Route::post('/store', 'Admin\ProductController@store')->name('.store')->middleware('can:add product');
                Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('.edit')->middleware('can:edit product');
                Route::post('/update/{id}', 'Admin\ProductController@update')->name('.update')->middleware('can:edit product');
                Route::get('/destroy/{id}', 'Admin\ProductController@destroy')->name('.destroy')->middleware('can:delete product');
            });
        });

        Route::name('.owners')->group(function () {
            Route::prefix('/owners')->group(function () {
                Route::get('/', 'Admin\OwnerController@index')->name('.index')->middleware('can:list owner');
                Route::get('/create', 'Admin\OwnerController@create')->name('.create')->middleware('can:add owner');
                Route::post('/store', 'Admin\OwnerController@store')->name('.store')->middleware('can:add owner');
                Route::get('/edit/{id}', 'Admin\OwnerController@edit')->name('.edit')->middleware('can:edit owner');
                Route::post('/update/{id}', 'Admin\OwnerController@update')->name('.update')->middleware('can:edit owner');
                Route::get('/destroy/{id}', 'Admin\OwnerController@destroy')->name('.destroy')->middleware('can:delete owner');
            });
        });

        Route::name('.roles')->group(function () {
            Route::prefix('/roles')->group(function () {
                Route::get('/', 'Admin\RoleController@index')->name('.index')->middleware('can:list role');
                Route::get('/create', 'Admin\RoleController@create')->name('.create')->middleware('can:add role');
                Route::post('/store', 'Admin\RoleController@store')->name('.store')->middleware('can:add role');
                Route::get('/edit/{id}', 'Admin\RoleController@edit')->name('.edit')->middleware('can:edit role');
                Route::post('/update/{id}', 'Admin\RoleController@update')->name('.update')->middleware('can:edit role');
                Route::get('/destroy/{id}', 'Admin\RoleController@destroy')->name('.destroy')->middleware('can:delete role');
            });
        });

        Route::name('.permissions')->group(function () {
            Route::prefix('/permissions')->group(function () {
                Route::get('/', 'Admin\PermissionController@index')->name('.index')->middleware('can:list role');
                Route::post('/store', 'Admin\PermissionController@store')->name('.store')->middleware('can:add role');
                Route::get('/destroy/{id}', 'Admin\PermissionController@destroy')->name('.destroy')->middleware('can:delete role');
            });
        });
        
        Route::name('.conversations')->group(function () {
            Route::prefix('/conversations')->group(function () {
                Route::get('/', 'Admin\ConversationController@index')->name('.index')->middleware('can:list role');
                Route::get('/create', 'Admin\ConversationController@create')->name('.create')->middleware('can:add role');
                Route::post('/store', 'Admin\ConversationController@store')->name('.store')->middleware('can:add role');
            });
        });
        
        Route::name('.posts')->group(function () {
            Route::prefix('/posts')->group(function () {
                Route::get('/', 'Admin\PostController@index')->name('.index');
                Route::get('/create', 'Admin\PostController@create')->name('.create');
                Route::post('/store', 'Admin\PostController@store')->name('.store');
                Route::get('/edit/{id}', 'Admin\PostController@edit')->name('.edit');
                Route::post('/update/{id}', 'Admin\PostController@update')->name('.update');
                Route::get('/show/{id}', 'Admin\PostController@show')->name('.show');
                Route::get('/destroy/{id}', 'Admin\PostController@destroy')->name('.destroy');
            });
        });
    });

    
});

//Home
Route::get('/', 'home\HomeController@index')->name('home.index');

Route::name('home')->prefix('home')->group(function () {
    
});





