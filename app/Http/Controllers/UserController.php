<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Support\Facades\Log;
use function redirect;
use function response;
use function view;

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

    public function store(StoreUserRequest $request)
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

    public function update(UpdateUserRequest $request, $id)
    {
        $this->userService->update($request, $id);
        return Redirect(route('admin.users.index'));
    }

    public function destroy($id)
    {
        try {
            $this->userService->delete($id);
            return response()->json([
                'status' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'status' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
}
