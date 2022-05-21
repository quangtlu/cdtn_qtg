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

Route::name('admin.users')->group(function () {
    Route::prefix('admin/users')->group(function () {
        Route::get('/', 'UserController@index')->name('.index');
        Route::get('/create', 'UserController@create')->name('.create');
        Route::post('/store', 'UserController@store')->name('.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('.edit');
        Route::put('/update/{id}', 'UserController@update')->name('.update');
        Route::get('/destroy/{id}', 'UserController@destroy')->name('.destroy');
    });
});

Route::name('admin.authors')->group(function () {
    Route::prefix('admin/authors')->group(function () {
        Route::get('/', 'AuthorController@index')->name('.index');
        Route::get('/create', 'AuthorController@create')->name('.create');
        Route::post('/store', 'AuthorController@store')->name('.store');
        Route::get('/edit/{id}', 'AuthorController@edit')->name('.edit');
        Route::put('/update/{id}', 'AuthorController@update')->name('.update');
        Route::get('/destroy/{id}', 'AuthorController@destroy')->name('.destroy');
    });
});