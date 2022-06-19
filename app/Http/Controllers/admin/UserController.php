<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Support\Facades\Log;
use function redirect;
use function response;
use function view;
use App\Http\Controllers\Controller;
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

    public function index(Request $request)
    {
        $users = $this->userService->getPaginate();
        if($request->keyword) {
            $users = $this->userService->search($request);
        }
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $this->userService->create($request);
        return Redirect(route('admin.users.index'))->with('success', 'Thêm người dùng thành công');
    }

    public function edit($id)
    {
        $user = $this->userService->getById($id);
        $roleOfUsers = $user->roles;
        $userImg = $user->image;
        return view('admin.users.edit', compact('user', 'roleOfUsers', 'userImg'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $this->userService->update($request, $id);
        return Redirect(route('admin.users.index'))->with('success', 'Cập nhật người dùng thành công');
    }

    public function destroy($id)
    {
        $this->userService->delete($id);
    }
}
