<?php

namespace App\Services;

use App\Models\Owner;

class OwnerService

{
    private $ownerModel;

    public function __construct(Owner $ownerModel)
    {
        $this->ownerModel = $ownerModel;
    }

    public function getPaginate(){
        $owners = $this->ownerModel->latest()->paginate(10);
        return $owners;
    }

    public function getAll()
    {
        $owners = $this->ownerModel->all();
        return $owners;
    }

    public function getById($id){
        $owner = $this->ownerModel->findOrFail($id);   
        return $owner; 
    }

    public function create($request){
        $data = [
            "name" => $request->name,
            "phone" => $request->phone,
            "email" => $request->email,
        ];
        $this->ownerModel->create($data);
    }

    public function update($request, $id){
        $owner = $this->getById($id);
        $data = [
            "name" => $request->name,
            "phone" => $request->phone,
            "email" => $request->email,
        ];
        $owner->update($data);
    }

    public function delete($id){
        $this->ownerModel->destroy($id);
    }
}
