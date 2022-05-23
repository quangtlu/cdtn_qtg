<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];


    public function boot()
    {
        $this->registerPolicies();
        $this->GateUser();
        $this->GateAuthor();
        $this->GateProduct();
        $this->GateOwner();
        $this->GateRole();
        $this->GatePermission();
        $this->GateConservation();
        $this->GateComment();
        $this->GateMessage();
    }

    public function GateUser() 
    {
        Gate::define('list-user', 'App\Policies\UserPolicy@view');
        Gate::define('add-user', 'App\Policies\UserPolicy@create');
        Gate::define('edit-user', 'App\Policies\UserPolicy@update');
        Gate::define('delete-user', 'App\Policies\UserPolicy@delete');
    }

    public function GateAuthor() 
    {
        Gate::define('list-author', 'App\Policies\AuthorPolicy@view');
        Gate::define('add-author', 'App\Policies\AuthorPolicy@create');
        Gate::define('edit-author', 'App\Policies\AuthorPolicy@update');
        Gate::define('delete-author', 'App\Policies\AuthorPolicy@delete');
    }

    public function GateProduct() 
    {
        Gate::define('list-product', 'App\Policies\ProductPolicy@view');
        Gate::define('add-product', 'App\Policies\ProductPolicy@create');
        Gate::define('edit-product', 'App\Policies\ProductPolicy@update');
        Gate::define('delete-product', 'App\Policies\ProductPolicy@delete');
    }

    public function GateOwner() 
    {
        Gate::define('list-owner', 'App\Policies\OwnerPolicy@view');
        Gate::define('add-owner', 'App\Policies\OwnerPolicy@create');
        Gate::define('edit-owner', 'App\Policies\OwnerPolicy@update');
        Gate::define('delete-owner', 'App\Policies\OwnerPolicy@delete');
    }

    public function GateRole() 
    {
        Gate::define('list-role', 'App\Policies\RolePolicy@view');
        Gate::define('add-role', 'App\Policies\RolePolicy@create');
        Gate::define('edit-role', 'App\Policies\RolePolicy@update');
        Gate::define('delete-role', 'App\Policies\RolePolicy@delete');
    }

    public function GatePermission() 
    {
        Gate::define('list-permission', 'App\Policies\PermissionPolicy@view');
        Gate::define('add-permission', 'App\Policies\PermissionPolicy@create');
        Gate::define('delete-permission', 'App\Policies\PermissionPolicy@delete');
    }

    public function GatePost() 
    {
        Gate::define('list-post', 'App\Policies\PostPolicy@view');
        Gate::define('add-post', 'App\Policies\PostPolicy@create');
        Gate::define('edit-post', 'App\Policies\PostPolicy@update');
        Gate::define('delete-post', 'App\Policies\PostPolicy@delete');
    }

    public function GateConservation() 
    {
        Gate::define('list-conservation', 'App\Policies\ConservationPolicy@view');
        Gate::define('add-conservation', 'App\Policies\ConservationPolicy@add');
    }

    public function GateComment() 
    {
        Gate::define('list-comment', 'App\Policies\CommentPolicy@view');
        Gate::define('add-comment', 'App\Policies\CommentPolicy@create');
        Gate::define('edit-comment', 'App\Policies\CommentPolicy@update');
        Gate::define('delete-comment', 'App\Policies\CommentPolicy@delete');
    }

    public function GateMessage() 
    {
        Gate::define('list-message', 'App\Policies\MessagePolicy@view');
        Gate::define('add-message', 'App\Policies\MessagePolicy@view');
        Gate::define('delete-message', 'App\Policies\MessagePolicy@view');
    }

}
