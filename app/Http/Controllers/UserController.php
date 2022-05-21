<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;
    private $roleSercice;

    public function __construct(UserService $userService, RoleService $roleSercice)
    {
        $this->userService = $userService;
        $this->roleSercice = $roleSercice;
        $roles = $this->roleSercice->getAll();
        view()->share('roles', $roles);
    }

    public function index()
    {
        $users = $this->userService->getPaginate();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->userService->create($request);
        return Redirect(route('admin.users.index'));
    }

    public function edit($id)
    {
        $user = $this->userService->getById($id);
        $roleOfUsers = $user->roles;
        return view('admin.users.edit', compact('user', 'roleOfUsers'));
    }

    public function update(Request $request, $id)
    {
        $this->userService->update($request, $id);
        return Redirect(route('admin.users.index'));
    }

    public function destroy($id)
    {
        $this->userService->delete($id);
        return Redirect(route('admin.users.index'));
    }
}
