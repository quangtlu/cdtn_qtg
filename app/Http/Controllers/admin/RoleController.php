<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Role\StoreRoleRequest;
use App\Http\Requests\Admin\Role\UpdateRoleRequest;
use App\Models\Permission;
use App\Services\PermissionService;
use App\Services\RoleService;
use function redirect;
use function view;
use App\Http\Controllers\Controller;


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

    public function index()
    {
        $roles = $this->roleService->getPaginate();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(StoreRoleRequest $request)
    {
        $this->roleService->create($request);
        return Redirect(route('admin.roles.index'))->with('success', 'Thêm vai trò thành công');
    }

    public function edit($id)
    {
        $role = $this->roleService->getById($id);
        $permissionsSelected = $role->getAllPermissions();
        return view('admin.roles.edit', compact('role', 'permissionsSelected'));
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        $this->roleService->update($request, $id);
        return Redirect(route('admin.roles.index'))->with('success', 'Cập nhật vai trò thành công');
    }

    public function destroy($id)
    {
        $this->roleService->delete($id);
    }
}
