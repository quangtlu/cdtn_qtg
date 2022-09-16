<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Role\StoreRoleRequest;
use App\Http\Requests\Admin\Role\UpdateRoleRequest;
use App\Services\PermissionService;
use App\Services\RoleService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $roleService;
    private $permissionService;

    public function __construct(RoleService $roleSerive, PermissionService $permissionService)
    {
        $this->roleService = $roleSerive;
        $this->permissionService = $permissionService;
        $permissions = $this->permissionService->getAll();
        view()->share('permissions', $permissions);
    }

    public function index(Request $request)
    {
        try {
            $roles = $this->roleService->getPaginate();
            $roles = $this->roleService->search($request);
            return view('admin.roles.index', compact('roles'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }

    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(StoreRoleRequest $request)
    {
        try {
            $this->roleService->create($request);
            return Redirect(route('admin.roles.index'))->with('success', config('consts.message.success.create')
        );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }

    }

    public function edit($id)
    {
        try {
            $role = $this->roleService->getById($id);
            $permissionsSelected = $role->getAllPermissions();
            return view('admin.roles.edit', compact('role', 'permissionsSelected'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }

    }

    public function update(UpdateRoleRequest $request, $id)
    {
        try {
            $this->roleService->update($request, $id);
            return Redirect(route('admin.roles.index'))->with('success', config('consts.message.success.update')
        );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }

    }

    public function destroy($id)
    {
        try {
            $role = $this->roleService->delete($id);
            return response()->json(['role' => $role, 'message' => config('consts.message.success.delete')
        ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }

    }
}
