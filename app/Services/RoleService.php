<?php

namespace App\Services;
use App\Models\Role;

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
        $data = [
            "name" => $request->name,
            "display_name" => $request->display_name,
        ];
        $role = $this->roleModel->create($data);
        $role->permissions()->attach($request->permission_id);
    }

    public function update($request, $id){
        $role = $this->getById($id);
        $data = [
            "name" => $request->name,
            "display_name" => $request->display_name,
        ];
        $role->update($data);
        $role->permissions()->sync($request->permission_id);
    }

    public function delete($id){
        $role = $this->getById($id);
        $this->roleModel->destroy($id);
        $role->permissions()->detach();

    }
}
