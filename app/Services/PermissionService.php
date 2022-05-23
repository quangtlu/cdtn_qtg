<?php

namespace App\Services;
use App\Models\Permission;

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
        $data1 = [
            "name" => $request->module_parents,
            "display_name" => $request->module_parents,
            "parent_id" => 0,
        ];
        $permission = $this->permissionModel->create($data1);

        foreach ($request->module_children as $value) {
            $data2 = [
                "name" => $value,
                "display_name" => $value.' '.$request->module_parents,
                "parent_id" => $permission->id,
                "key_code" => $value.'-'.$request->module_parents,
            ];
            $this->permissionModel->create($data2);
        }
        
    }

    public function update($request, $id)
    {
        $permission = $this->getById($id);
        $data = [
            "name" => $request->name,
            "display_name" => $request->display_name,
        ];
        $permission->update($data);
    }

    public function delete($id)
    {
        $this->permissionModel->destroy($id);
    }
}
