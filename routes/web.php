<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);
//Admin
Route::middleware('auth')->group(function () {

    Route::get('admin/dashboard', 'admin\DashboardController@index')->name('admin.dashboard');

    Route::name('admin.users')->group(function () {
        Route::prefix('admin/users')->group(function () {
            Route::get('/', 'admin\UserController@index')->name('.index')->middleware('can:list user');
            Route::get('/create', 'admin\UserController@create')->name('.create')->middleware('can:add user');
            Route::post('/store', 'admin\UserController@store')->name('.store')->middleware('can:add user');
            Route::get('/edit/{id}', 'admin\UserController@edit')->name('.edit')->middleware('can:edit user');
            Route::post('/update/{id}', 'admin\UserController@update')->name('.update')->middleware('can:edit user');
            Route::get('/destroy/{id}', 'admin\UserController@destroy')->name('.destroy')->middleware('can:delete user');
        });
    });

    Route::name('admin.authors')->group(function () {
        Route::prefix('admin/authors')->group(function () {
            Route::get('/', 'admin\AuthorController@index')->name('.index')->middleware('can:list author');
            Route::get('/create', 'admin\AuthorController@create')->name('.create')->middleware('can:add author');
            Route::post('/store', 'admin\AuthorController@store')->name('.store')->middleware('can:add author');
            Route::get('/edit/{id}', 'admin\AuthorController@edit')->name('.edit')->middleware('can:edit author');
            Route::post('/update/{id}', 'admin\AuthorController@update')->name('.update')->middleware('can:edit author');
            Route::get('/destroy/{id}', 'admin\AuthorController@destroy')->name('.destroy')->middleware('can:delete author');
        });
    });

    Route::name('admin.products')->group(function () {
        Route::prefix('admin/products')->group(function () {
            Route::get('/', 'ProductController@index')->name('.index')->middleware('can:list product');
            Route::get('/create', 'ProductController@create')->name('.create')->middleware('can:add product');
            Route::post('/store', 'ProductController@store')->name('.store')->middleware('can:add product');
            Route::get('/edit/{id}', 'ProductController@edit')->name('.edit')->middleware('can:edit product');
            Route::post('/update/{id}', 'ProductController@update')->name('.update')->middleware('can:edit product');
            Route::get('/show/{id}', 'ProductController@edit')->name('.show')->middleware('can:show product');
            Route::get('/destroy/{id}', 'ProductController@destroy')->name('.destroy')->middleware('can:delete product');
        });
    });

    Route::name('admin.owners')->group(function () {
        Route::prefix('admin/owners')->group(function () {
            Route::get('/', 'admin\OwnerController@index')->name('.index')->middleware('can:list owner');
            Route::get('/create', 'admin\OwnerController@create')->name('.create')->middleware('can:add owner');
            Route::post('/store', 'admin\OwnerController@store')->name('.store')->middleware('can:add owner');
            Route::get('/edit/{id}', 'admin\OwnerController@edit')->name('.edit')->middleware('can:edit owner');
            Route::post('/update/{id}', 'admin\OwnerController@update')->name('.update')->middleware('can:edit owner');
            Route::get('/destroy/{id}', 'admin\OwnerController@destroy')->name('.destroy')->middleware('can:delete owner');
        });
    });

    Route::name('admin.posts')->group(function () {
        Route::prefix('admin/posts')->group(function () {
            Route::get('/', 'PostController@index')->name('.index');
            Route::get('/create', 'PostController@create')->name('.create');
            Route::post('/store', 'PostController@store')->name('.store');
            Route::get('/edit/{id}', 'PostController@edit')->name('.edit');
            Route::post('/update/{id}', 'PostController@update')->name('.update');
            Route::get('/show/{id}', 'PostController@show')->name('.show');
            Route::get('/destroy/{id}', 'PostController@destroy')->name('.destroy');
        });
    });

    Route::name('admin.roles')->group(function () {
        Route::prefix('admin/roles')->group(function () {
            Route::get('/', 'admin\RoleController@index')->name('.index')->middleware('can:list role');
            Route::get('/create', 'admin\RoleController@create')->name('.create')->middleware('can:add role');
            Route::post('/store', 'admin\RoleController@store')->name('.store')->middleware('can:add role');
            Route::get('/edit/{id}', 'admin\RoleController@edit')->name('.edit')->middleware('can:edit role');
            Route::post('/update/{id}', 'admin\RoleController@update')->name('.update')->middleware('can:edit role');
            Route::get('/destroy/{id}', 'admin\RoleController@destroy')->name('.destroy')->middleware('can:delete role');
        });
    });

    Route::name('admin.permissions')->group(function () {
        Route::prefix('admin/permissions')->group(function () {
            Route::get('/', 'admin\PermissionController@index')->name('.index')->middleware('can:list role');
            Route::post('/store', 'admin\PermissionController@store')->name('.store')->middleware('can:add role');
            Route::get('/destroy/{id}', 'admin\PermissionController@destroy')->name('.destroy')->middleware('can:delete role');
        });
    });

    Route::name('admin.conversations')->group(function () {
        Route::prefix('admin/conversations')->group(function () {
            Route::get('/', 'admin\ConversationController@index')->name('.index')->middleware('can:list role');
            Route::get('/create', 'admin\ConversationController@create')->name('.create')->middleware('can:add role');
            Route::post('/store', 'admin\ConversationController@store')->name('.store')->middleware('can:add role');
        });
    });

});

//Home
Route::get('/', 'home\HomeController@index')->name('home.index');




