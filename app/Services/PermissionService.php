<?php

namespace App\Services;

use App\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Permission;

class PermissionService

{
    private $permissionModel;

    public function __construct(Permission $permissionModel)
    {
        $this->permissionModel = $permissionModel;
    }

    public function getAll()
    {
        $permissions = $this->permissionModel->all();
        return $permissions;
    }


    public function getPaginate()
    {
        $permissions = $this->permissionModel->latest()->paginate(10);
        return $permissions;
    }

    public function getParentById($id)
    {
        $parents = $this->permissionModel->where('parent_id', $id)->get();
        return $parents;
    }

    public function getById($id)
    {
        $permission = $this->permissionModel->findOrFail($id);   
        return $permission; 
    }

    public function create($request)
    {
        foreach ($request->module_children as $value) {
            $this->permissionModel->create(['name' => $value.' '.$request->module_parents]);
        }
    }

    public function delete($id)
    {
        $this->permissionModel->destroy($id);
    }
}
