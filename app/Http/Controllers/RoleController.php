<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Services\RoleService;
use App\Services\PermissionService;
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
    
    public function index()
    {
        $roles = $this->roleService->getPaginate();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $this->roleService->create($request);
        return Redirect(route('admin.roles.index'));
    }

    public function edit($id)
    {
        $role = $this->roleService->getById($id);
        $permissionsSelected = $role->getAllPermissions();
        return view('admin.roles.edit', compact('role', 'permissionsSelected'));
    }

    public function update(Request $request, $id)
    {
        $this->roleService->update($request, $id);
        return Redirect(route('admin.roles.index'));
    }

    public function destroy($id)
    {
        $this->roleService->delete($id);
        return Redirect(route('admin.roles.index'));
    }
}
