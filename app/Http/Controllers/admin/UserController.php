<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Services\RoleService;
use App\Services\UserService;
use function redirect;
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

        if($request->keyword && ($request->name || $request->gender || $request->email || $request->phone || $request->role_id)) {
            $users = $this->userService->searchAndFilter($request);
        }
        else if ($request->name || $request->gender || $request->email || $request->phone || $request->role_id) {
            $users = $this->userService->filter($request);
        }
        else if ($request->keyword) {
            $users = $this->userService->search($request);
        }
        $userAll = $this->userService->getAll();
        if ($users->count() > 0) {
            return view('admin.users.index', compact('users', 'userAll'));
        } else {
            return redirect()->back()->with('error', 'Không có người dùng nào phù hợp');
        }
        return view('admin.users.index', compact('usersAll'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $this->userService->create($request);
        return Redirect(route('admin.users.index'))->with('success', 'Thêm thành công');
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
        return Redirect(route('admin.users.index'))->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $this->userService->delete($id);
    }
}
