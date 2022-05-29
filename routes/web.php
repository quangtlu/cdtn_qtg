<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {

    Route::get('home', 'HomeController@index')->name('admin.index');

    Route::name('admin.users')->group(function () {
        Route::prefix('admin/users')->group(function () {
            Route::get('/', 'UserController@index')->name('.index')->middleware('can:list user');
            Route::get('/create', 'UserController@create')->name('.create')->middleware('can:add user');
            Route::post('/store', 'UserController@store')->name('.store')->middleware('can:add user');
            Route::get('/edit/{id}', 'UserController@edit')->name('.edit')->middleware('can:edit user');
            Route::post('/update/{id}', 'UserController@update')->name('.update')->middleware('can:edit user');
            Route::get('/destroy/{id}', 'UserController@destroy')->name('.destroy')->middleware('can:delete user');
        });
    });

    Route::name('admin.authors')->group(function () {
        Route::prefix('admin/authors')->group(function () {
            Route::get('/', 'AuthorController@index')->name('.index')->middleware('can:list author');
            Route::get('/create', 'AuthorController@create')->name('.create')->middleware('can:add author');
            Route::post('/store', 'AuthorController@store')->name('.store')->middleware('can:add author');
            Route::get('/edit/{id}', 'AuthorController@edit')->name('.edit')->middleware('can:edit author');
            Route::post('/update/{id}', 'AuthorController@update')->name('.update')->middleware('can:edit author');
            Route::get('/destroy/{id}', 'AuthorController@destroy')->name('.destroy')->middleware('can:delete author');
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
            Route::get('/', 'OwnerController@index')->name('.index')->middleware('can:list owner');
            Route::get('/create', 'OwnerController@create')->name('.create')->middleware('can:add owner');
            Route::post('/store', 'OwnerController@store')->name('.store')->middleware('can:add owner');
            Route::get('/edit/{id}', 'OwnerController@edit')->name('.edit')->middleware('can:edit owner');
            Route::post('/update/{id}', 'OwnerController@update')->name('.update')->middleware('can:edit owner');
            Route::get('/destroy/{id}', 'OwnerController@destroy')->name('.destroy')->middleware('can:delete owner');
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
            Route::get('/', 'RoleController@index')->name('.index')->middleware('can:list role');
            Route::get('/create', 'RoleController@create')->name('.create')->middleware('can:add role');
            Route::post('/store', 'RoleController@store')->name('.store')->middleware('can:add role');
            Route::get('/edit/{id}', 'RoleController@edit')->name('.edit')->middleware('can:edit role');
            Route::post('/update/{id}', 'RoleController@update')->name('.update')->middleware('can:edit role');
            Route::get('/destroy/{id}', 'RoleController@destroy')->name('.destroy')->middleware('can:delete role');
        });
    });

    Route::name('admin.permissions')->group(function () {
        Route::prefix('admin/permissions')->group(function () {
            Route::get('/', 'PermissionController@index')->name('.index')->middleware('can:list role');
            Route::post('/store', 'PermissionController@store')->name('.store')->middleware('can:add role');
            Route::get('/destroy/{id}', 'PermissionController@destroy')->name('.destroy')->middleware('can:delete role');
        });
    });

    Route::name('admin.conversations')->group(function () {
        Route::prefix('admin/conversations')->group(function () {
            Route::get('/', 'ConversationController@index')->name('.index')->middleware('can:list role');
            Route::post('/store', 'ConversationController@store')->name('.store')->middleware('can:add role');
        });
    });

});





