<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    private $roleService;

    public function __construct(RoleService $roleSerive)
    {
        $this->roleService = $roleSerive;
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

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $role = $this->roleService->getById($id);
        return view('admin.roles.edit', compact('role'));
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
