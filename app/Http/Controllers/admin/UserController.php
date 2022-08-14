<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Services\RoleService;
use App\Services\UserService;
use function redirect;
use function view;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;
    private $roleSercice;
    private $categoryService;

    public function __construct(UserService $userService, RoleService $roleSercice, CategoryService $categoryService)
    {
        $this->userService = $userService;
        $this->roleSercice = $roleSercice;
        $this->categoryService = $categoryService;
        $roles = $this->roleSercice->getAll();
        $categories = $this->categoryService->getParentBytype([config('consts.category.type.post.value'), config('consts.category.type.post_reference.value')]);
        view()->share(['roles' => $roles, 'categories' => $categories]);
    }

    public function index(Request $request)
    {
        $users = $this->userService->getPaginate();

        if ($request->keyword) {
            $users = $this->userService->search($request);
        }

        if ($request->keyword && ($request->name || $request->gender || $request->email || $request->phone || $request->role_id)) {
            $users = $this->userService->searchAndFilter($request);
        } else if ($request->name || $request->gender || $request->email || $request->phone || $request->role_id) {
            $users = $this->userService->filter($request);
        } else if ($request->keyword) {
            $users = $this->userService->search($request);
        }

        $userAll = $this->userService->getAll();

        return view('admin.users.index', compact('users', 'userAll'));
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
        $user = $this->userService->delete($id);
        return response()->json(['user' => $user, 'message' => 'Xóa người dùng thành công']);
    }
}
