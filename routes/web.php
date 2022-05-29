<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);
//Admin
Route::middleware('auth')->group(function () {
    Route::name('admin')->group(function () {
        Route::prefix('/admin')->group(function () {
            Route::get('/dashboard', 'admin\DashboardController@index')->name('.dashboard');

            Route::name('.users')->group(function () {
                Route::prefix('/users')->group(function () {
                    Route::get('/', 'admin\UserController@index')->name('.index')->middleware('can:list user');
                    Route::get('/create', 'admin\UserController@create')->name('.create')->middleware('can:add user');
                    Route::post('/store', 'admin\UserController@store')->name('.store')->middleware('can:add user');
                    Route::get('/edit/{id}', 'admin\UserController@edit')->name('.edit')->middleware('can:edit user');
                    Route::post('/update/{id}', 'admin\UserController@update')->name('.update')->middleware('can:edit user');
                    Route::get('/destroy/{id}', 'admin\UserController@destroy')->name('.destroy')->middleware('can:delete user');
                });
            });

            Route::name('.authors')->group(function () {
                Route::prefix('/authors')->group(function () {
                    Route::get('/', 'admin\AuthorController@index')->name('.index')->middleware('can:list author');
                    Route::get('/create', 'admin\AuthorController@create')->name('.create')->middleware('can:add author');
                    Route::post('/store', 'admin\AuthorController@store')->name('.store')->middleware('can:add author');
                    Route::get('/edit/{id}', 'admin\AuthorController@edit')->name('.edit')->middleware('can:edit author');
                    Route::post('/update/{id}', 'admin\AuthorController@update')->name('.update')->middleware('can:edit author');
                    Route::get('/destroy/{id}', 'admin\AuthorController@destroy')->name('.destroy')->middleware('can:delete author');
                });
            });

            Route::name('.products')->group(function () {
                Route::prefix('/products')->group(function () {
                    Route::get('/', 'admin\ProductController@index')->name('.index')->middleware('can:list product');
                    Route::get('/create', 'admin\ProductController@create')->name('.create')->middleware('can:add product');
                    Route::post('/store', 'admin\ProductController@store')->name('.store')->middleware('can:add product');
                    Route::get('/edit/{id}', 'admin\ProductController@edit')->name('.edit')->middleware('can:edit product');
                    Route::post('/update/{id}', 'admin\ProductController@update')->name('.update')->middleware('can:edit product');
                    Route::get('/destroy/{id}', 'admin\ProductController@destroy')->name('.destroy')->middleware('can:delete product');
                });
            });

            Route::name('.owners')->group(function () {
                Route::prefix('/owners')->group(function () {
                    Route::get('/', 'admin\OwnerController@index')->name('.index')->middleware('can:list owner');
                    Route::get('/create', 'admin\OwnerController@create')->name('.create')->middleware('can:add owner');
                    Route::post('/store', 'admin\OwnerController@store')->name('.store')->middleware('can:add owner');
                    Route::get('/edit/{id}', 'admin\OwnerController@edit')->name('.edit')->middleware('can:edit owner');
                    Route::post('/update/{id}', 'admin\OwnerController@update')->name('.update')->middleware('can:edit owner');
                    Route::get('/destroy/{id}', 'admin\OwnerController@destroy')->name('.destroy')->middleware('can:delete owner');
                });
            });

            Route::name('.roles')->group(function () {
                Route::prefix('/roles')->group(function () {
                    Route::get('/', 'admin\RoleController@index')->name('.index')->middleware('can:list role');
                    Route::get('/create', 'admin\RoleController@create')->name('.create')->middleware('can:add role');
                    Route::post('/store', 'admin\RoleController@store')->name('.store')->middleware('can:add role');
                    Route::get('/edit/{id}', 'admin\RoleController@edit')->name('.edit')->middleware('can:edit role');
                    Route::post('/update/{id}', 'admin\RoleController@update')->name('.update')->middleware('can:edit role');
                    Route::get('/destroy/{id}', 'admin\RoleController@destroy')->name('.destroy')->middleware('can:delete role');
                });
            });

            Route::name('.permissions')->group(function () {
                Route::prefix('/permissions')->group(function () {
                    Route::get('/', 'admin\PermissionController@index')->name('.index')->middleware('can:list role');
                    Route::post('/store', 'admin\PermissionController@store')->name('.store')->middleware('can:add role');
                    Route::get('/destroy/{id}', 'admin\PermissionController@destroy')->name('.destroy')->middleware('can:delete role');
                });
            });

            Route::name('.conversations')->group(function () {
                Route::prefix('/conversations')->group(function () {
                    Route::get('/', 'admin\ConversationController@index')->name('.index')->middleware('can:list role');
                    Route::get('/create', 'admin\ConversationController@create')->name('.create')->middleware('can:add role');
                    Route::post('/store', 'admin\ConversationController@store')->name('.store')->middleware('can:add role');
                });
            });
        });
    });


});

//Home
Route::get('/', 'home\HomeController@index')->name('home.index');




