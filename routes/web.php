<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::name('admin.users')->group(function () {
    Route::prefix('admin/users')->group(function () {
        Route::get('/', 'UserController@index')->name('.index');
        Route::get('/create', 'UserController@create')->name('.create');
        Route::post('/store', 'UserController@store')->name('.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('.edit');
        Route::post('/update/{id}', 'UserController@update')->name('.update');
        Route::get('/destroy/{id}', 'UserController@destroy')->name('.destroy');
    });
});


Route::name('admin.authors')->group(function () {
    Route::prefix('admin/authors')->group(function () {
        Route::get('/', 'AuthorController@index')->name('.index');
        Route::get('/create', 'AuthorController@create')->name('.create');
        Route::post('/store', 'AuthorController@store')->name('.store');
        Route::get('/edit/{id}', 'AuthorController@edit')->name('.edit');
        Route::post('/update/{id}', 'AuthorController@update')->name('.update');
        Route::get('/destroy/{id}', 'AuthorController@destroy')->name('.destroy');
    });
});

Route::name('admin.products')->group(function () {
    Route::prefix('admin/products')->group(function () {
        Route::get('/', 'ProductController@index')->name('.index');
        Route::get('/create', 'ProductController@create')->name('.create');
        Route::post('/store', 'ProductController@store')->name('.store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('.edit');
        Route::post('/update/{id}', 'ProductController@update')->name('.update');
        Route::get('/destroy/{id}', 'ProductController@destroy')->name('.destroy');
    });
});

Route::name('admin.owners')->group(function () {
    Route::prefix('admin/owners')->group(function () {
        Route::get('/', 'OwnerController@index')->name('.index');
        Route::get('/create', 'OwnerController@create')->name('.create');
        Route::post('/store', 'OwnerController@store')->name('.store');
        Route::get('/edit/{id}', 'OwnerController@edit')->name('.edit');
        Route::post('/update/{id}', 'OwnerController@update')->name('.update');
        Route::get('/destroy/{id}', 'OwnerController@destroy')->name('.destroy');
    });
});

Route::name('admin.roles')->group(function () {
    Route::prefix('admin/roles')->group(function () {
        Route::get('/', 'RoleController@index')->name('.index');
        Route::get('/create', 'RoleController@create')->name('.create');
        Route::post('/store', 'RoleController@store')->name('.store');
        Route::get('/edit/{id}', 'RoleController@edit')->name('.edit');
        Route::post('/update/{id}', 'RoleController@update')->name('.update');
        Route::get('/destroy/{id}', 'RoleController@destroy')->name('.destroy');
    });
});

Route::name('admin.permissions')->group(function () {
    Route::prefix('admin/permissions')->group(function () {
        Route::get('/', 'PermissionController@index')->name('.index');
        Route::get('/create', 'PermissionController@create')->name('.create');
        Route::post('/store', 'PermissionController@store')->name('.store');
        Route::get('/edit/{id}', 'PermissionController@edit')->name('.edit');
        Route::post('/update/{id}', 'PermissionController@update')->name('.update');
        Route::get('/destroy/{id}', 'PermissionController@destroy')->name('.destroy');
    });
});
