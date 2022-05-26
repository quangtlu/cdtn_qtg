<?php

namespace App\Http\Controllers;

use App\Services\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }
    
    public function index()
    {
        $permissions = $this->permissionService->getPaginate();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->permissionService->create($request);
        return Redirect(route('admin.permissions.index'));
    }

    public function edit($id)
    {
        $permission = $this->permissionService->getById($id);
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $this->permissionService->update($request, $id);
        return Redirect(route('admin.permissions.index'));
    }

    public function destroy($id)
    {
        $this->permissionService->delete($id);
        return Redirect(route('admin.permissions.index'));
    }
}
