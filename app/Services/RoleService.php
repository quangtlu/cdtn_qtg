<?php

namespace App\Services;
use Spatie\Permission\Models\Role;

class RoleService

{
    private $roleModel;

    public function __construct(Role $roleModel)
    {
        $this->roleModel = $roleModel;
    }

    public function getAll(){
        $roles = $this->roleModel->all();
        return $roles;
    }

    public function getPaginate(){
        $roles = $this->roleModel->latest()->paginate(10);
        return $roles;
    }

    public function getById($id){
        $role = $this->roleModel->findOrFail($id);   
        return $role; 
    }

    public function create($request){
        $role = $this->roleModel->create(['name' => $request->name]);
        $role->givePermissionTo($request->permissionNames);
    }

    public function update($request, $id){
        $role = $this->getById($id);
        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissionNames);
    }

    public function delete($id){
        $role = $this->getById($id);
        $this->roleModel->destroy($id);
        $role->permissions()->detach();
    }
}
