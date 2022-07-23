<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => true]);
Route::middleware('auth')->group(function () {
    //Role: admin
    Route::name('admin.')->prefix('admin')->group(function () {        
        Route::name('users.')->prefix('/users')->group(function () {
            Route::get('/', 'Admin\UserController@index')->name('index')->middleware('can:list-user');
            Route::get('/create', 'Admin\UserController@create')->name('create')->middleware('can:add-user');
            Route::post('/store', 'Admin\UserController@store')->name('store')->middleware('can:add-user');
            Route::get('/edit/{id}', 'Admin\UserController@edit')->name('edit')->middleware('can:edit-user');
            Route::post('/update/{id}', 'Admin\UserController@update')->name('update')->middleware('can:edit-user');
            Route::get('/destroy/{id}', 'Admin\UserController@destroy')->name('destroy')->middleware('can:delete-user');
        });

        Route::name('roles.')->prefix('/roles')->group(function () {
            Route::get('/', 'Admin\RoleController@index')->name('index')->middleware('can:list-role');
            Route::get('/create', 'Admin\RoleController@create')->name('create')->middleware('can:add-role');
            Route::post('/store', 'Admin\RoleController@store')->name('store')->middleware('can:add-role');
            Route::get('/edit/{id}', 'Admin\RoleController@edit')->name('edit')->middleware('can:edit-role');
            Route::post('/update/{id}', 'Admin\RoleController@update')->name('update')->middleware('can:edit-role');
            Route::get('/destroy/{id}', 'Admin\RoleController@destroy')->name('destroy')->middleware('can:delete-role');
        });

        Route::name('permissions.')->prefix('/permissions')->group(function () {
            Route::get('/', 'Admin\PermissionController@index')->name('index')->middleware('can:list-permission');
            Route::post('/store', 'Admin\PermissionController@store')->name('store')->middleware('can:add-permission');
            Route::get('/destroy/{id}', 'Admin\PermissionController@destroy')->name('destroy')->middleware('can:delete-permission');
        });

        Route::name('chatrooms.')->prefix('/chatrooms')->group(function () {
            Route::get('/', 'Admin\ChatroomController@index')->name('index')->middleware('can:list-chatroom');
            Route::get('/create', 'Admin\ChatroomController@create')->name('create')->middleware('can:add-chatroom');
            Route::post('/store', 'Admin\ChatroomController@store')->name('store')->middleware('can:add-chatroom');
            Route::get('/edit/{id}', 'Admin\ChatroomController@edit')->name('edit')->middleware('can:edit-chatroom');
            Route::post('/update/{id}', 'Admin\ChatroomController@update')->name('update')->middleware('can:edit-chatroom');
            Route::get('/destroy/{id}', 'Admin\ChatroomController@destroy')->name('destroy')->middleware('can:delete-chatroom');
        });
        // Role:editor or admin
        Route::name('authors.')->prefix('/authors')->group(function () {
            Route::get('/', 'Admin\AuthorController@index')->name('index')->middleware('can:list-author');
            Route::get('/create', 'Admin\AuthorController@create')->name('create')->middleware('can:add-author');
            Route::post('/store', 'Admin\AuthorController@store')->name('store')->middleware('can:add-author');
            Route::get('/edit/{id}', 'Admin\AuthorController@edit')->name('edit')->middleware('can:edit-author');
            Route::post('/update/{id}', 'Admin\AuthorController@update')->name('update')->middleware('can:edit-author');
            Route::get('/destroy/{id}', 'Admin\AuthorController@destroy')->name('destroy')->middleware('can:delete-author');
        });

        Route::name('products.')->prefix('/products')->group(function () {
            Route::get('/', 'Admin\ProductController@index')->name('index')->middleware('can:list-product');
            Route::get('/create', 'Admin\ProductController@create')->name('create')->middleware('can:add-product');
            Route::post('/store', 'Admin\ProductController@store')->name('store')->middleware('can:add-product');
            Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('edit')->middleware('can:edit-product');
            Route::post('/update/{id}', 'Admin\ProductController@update')->name('update')->middleware('can:edit-product');
            Route::get('/show/{id}', 'Admin\ProductController@show')->name('show')->middleware('can:show-product');
            Route::get('/destroy/{id}', 'Admin\ProductController@destroy')->name('destroy')->middleware('can:delete-product');
        });

        Route::name('owners.')->prefix('/owners')->group(function () {
            Route::get('/', 'Admin\OwnerController@index')->name('index')->middleware('can:list-owner');
            Route::get('/create', 'Admin\OwnerController@create')->name('create')->middleware('can:add-owner');
            Route::post('/store', 'Admin\OwnerController@store')->name('store')->middleware('can:add-owner');
            Route::get('/edit/{id}', 'Admin\OwnerController@edit')->name('edit')->middleware('can:edit-owner');
            Route::post('/update/{id}', 'Admin\OwnerController@update')->name('update')->middleware('can:edit-owner');
            Route::get('/destroy/{id}', 'Admin\OwnerController@destroy')->name('destroy')->middleware('can:delete-owner');
        });

        Route::name('posts.')->prefix('/posts')->group(function () {
            Route::get('/', 'Admin\PostController@index')->name('index')->middleware('can:list-post');
            Route::get('/create', 'Admin\PostController@create')->name('create')->middleware('can:add-post');
            Route::post('/store', 'Admin\PostController@store')->name('store')->middleware('can:add-post');
            Route::get('/edit/{id}', 'Admin\PostController@edit')->name('edit')->middleware('can:edit-post');
            Route::post('/update/{id}', 'Admin\PostController@update')->name('update')->middleware('can:edit-post');
            Route::get('/show/{id}', 'Admin\PostController@show')->name('show')->middleware('can:show-post');
            Route::get('/destroy/{id}', 'Admin\PostController@destroy')->name('destroy')->middleware('can:delete-post');
        });

        Route::name('faqs.')->prefix('/faqs')->group(function () {
            Route::get('/', 'Admin\FaqController@index')->name('index')->middleware('can:list-faq');
            Route::get('/create', 'Admin\FaqController@create')->name('create')->middleware('can:add-faq');
            Route::post('/store', 'Admin\FaqController@store')->name('store')->middleware('can:add-faq');
            Route::get('/edit/{id}', 'Admin\FaqController@edit')->name('edit')->middleware('can:edit-faq');
            Route::post('/update/{id}', 'Admin\FaqController@update')->name('update')->middleware('can:edit-faq');
            Route::get('/destroy/{id}', 'Admin\FaqController@destroy')->name('destroy')->middleware('can:delete-faq');
        });

        Route::name('tags.')->prefix('/tags')->group(function () {
            Route::get('/', 'Admin\TagController@index')->name('index')->middleware('can:list-tag');
            Route::get('/create', 'Admin\TagController@create')->name('create')->middleware('can:add-tag');
            Route::post('/store', 'Admin\TagController@store')->name('store')->middleware('can:add-tag');
            Route::get('/edit/{id}', 'Admin\TagController@edit')->name('edit')->middleware('can:edit-tag');
            Route::post('/update/{id}', 'Admin\TagController@update')->name('update')->middleware('can:edit-tag');
            Route::get('/destroy/{id}', 'Admin\TagController@destroy')->name('destroy')->middleware('can:delete-tag');
        });

        Route::name('categories.')->prefix('/categories')->group(function () {
            Route::get('/', 'Admin\CategoryController@index')->name('index')->middleware('can:list-category');
            Route::get('/get-type', 'Admin\CategoryController@getType')->name('getType')->middleware('can:list-category');
            Route::get('/create', 'Admin\CategoryController@create')->name('create')->middleware('can:add-category');
            Route::post('/store', 'Admin\CategoryController@store')->name('store')->middleware('can:add-category');
            Route::get('/edit/{id}', 'Admin\CategoryController@edit')->name('edit')->middleware('can:edit-category');
            Route::post('/update/{id}', 'Admin\CategoryController@update')->name('update')->middleware('can:edit-category');
            Route::get('/destroy/{id}', 'Admin\CategoryController@destroy')->name('destroy')->middleware('can:delete-category');
        });

        Route::name('profile.')->prefix('/profile-user')->middleware('role:admin|editor')->group(function () {
            Route::get('/', 'Admin\ProfileController@index')->name('index');
            Route::get('/edit/{id}', 'Admin\ProfileController@edit')->name('edit');
            Route::post('/update{id}', 'Admin\ProfileController@update')->name('update');
        });

    });
    // User
    Route::name('posts.')->prefix('posts')->group(function () {
        Route::get('/my-post', 'home\PostController@getMyPost')->name('myPost');
        Route::post('/store', 'home\PostController@store')->name('store');
        Route::post('/update/{id}', 'home\PostController@update')->name('update');
        Route::get('/update/status/{id}', 'home\PostController@toogleStatus')->name('toogleStatus');
        Route::get('/destroy/{id}', 'home\PostController@destroy')->name('destroy');
        Route::get('/post-request', 'home\PostController@getPotRequest')->name('getPotRequest');
        Route::post('/handle-request-post/{id}', 'home\PostController@handleRequest')->name('handleRequest')->middleware('can:approve-post');
        Route::post('/connect-to-counselor/{id}', 'home\PostController@connectToCounselor')->name('connectToCounselor')->middleware('can:connect-counselor');
    });

    Route::name('comments.')->prefix('comments')->group(function () {
        Route::post('/', 'home\CommentController@store')->name('store');
        Route::post('/update/{id}', 'home\CommentController@update')->name('update');
        Route::get('/update/status/{id}', 'home\CommentController@toogleStatus')->name('toogleStatus');
        Route::get('/destroy/{id}', 'home\CommentController@destroy')->name('destroy');
    });

    Route::get('/messenger', 'home\MessengerController@index')->name('messenger.index');
    Route::get('/messenger/{id}', 'home\MessengerController@index')->name('messenger.show');
    Route::get('/messages/chatroom/{chatroom_id}', 'home\MessageController@index');
    Route::post('/messages', 'home\MessageController@store');
    Route::post('/feedback', 'home\FeedbackController@update');
    Route::get('/feedback/latest/{chatroom_id}', 'home\FeedbackController@latest');
    
    Route::name('profile.')->prefix('/profile-user')->group(function () {
        Route::get('/', 'home\ProfileController@index')->name('index');
        Route::get('/edit/{id}', 'home\ProfileController@edit')->name('edit');
        Route::post('/update/{id}', 'home\ProfileController@update')->name('update');
    });

    Route::get('/notifications/show-post/{id}', 'home\NotificationController@showPost')->name('notifications.showPost');
    Route::get('/notifications/mark-as-read-all', 'home\NotificationController@markAsReadAll')->name('notifications.markAsReadAll');
    Route::get('/notifications/delete-all', 'home\NotificationController@deleteAll')->name('notifications.deleteAll');
});

//No auth
Route::get('/', 'home\HomeController@index')->name('home.index');
Route::get('/faq', 'home\FaqController@index')->name('faq.index');
Route::name('posts')->prefix('posts')->group(function () {
    Route::get('/', 'home\PostController@index')->name('.index');
    Route::get('/{id}', 'home\PostController@show')->name('.show');
    Route::get('/category/{id}', 'home\PostController@getPostByCategory')->name('.getPostByCategory');
    Route::get('/user/{id}', 'home\PostController@getPostByUser')->name('.getPostByUser');
    Route::get('/tag/{id}', 'home\PostController@getPostByTag')->name('.getPostByTag');
});

Route::name('products')->prefix('products')->group(function () {
    Route::get('/', 'home\ProductController@index')->name('.index');
    Route::get('/{id}', 'home\ProductController@show')->name('.show');
    Route::get('/category/{id}', 'home\ProductController@getProductByCategory')->name('.getProductByCategory');
    Route::get('/author/{id}', 'home\ProductController@getProductByAuthor')->name('.getProductByAuthor');
    Route::get('/owner/{id}', 'home\ProductController@getProductByOwner')->name('.getProductByOwner');
});
