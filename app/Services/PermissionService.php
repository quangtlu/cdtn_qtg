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

    public function getPaginate(){
        $permissions = $this->permissionModel->latest()->paginate(10);
        return $permissions;
    }

    public function getById($id){
        $permission = $this->permissionModel->findOrFail($id);   
        return $permission; 
    }

    public function create($request){
        $data = [
            "name" => $request->name,
            "description" => $request->description,
        ];
        $this->permissionModel->create($data);
    }

    public function update($request, $id){
        $permission = $this->getById($id);
        $data = [
            "name" => $request->name,
            "description" => $request->description,
        ];
        $permission->update($data);
    }

    public function delete($id){
        $this->permissionModel->destroy($id);
    }
}
