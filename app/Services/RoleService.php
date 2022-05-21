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
            "description" => $request->description,
        ];
        $this->roleModel->create($data);
    }

    public function update($request, $id){
        $role = $this->getById($id);
        $data = [
            "name" => $request->name,
            "description" => $request->description,
        ];
        $role->update($data);
    }

    public function delete($id){
        $this->roleModel->destroy($id);
    }
}
