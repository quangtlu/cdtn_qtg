<?php

namespace App\Services;

use App\Models\Type;

class TypeService

{
    private $typeModel;

    public function __construct(Type $typeModel)
    {
        $this->typeModel = $typeModel;
    }

    public function getPaginate(){
        $types = $this->typeModel->latest()->paginate(10);
        return $types;
    }

    public function getAll()
    {
        $types = $this->typeModel->all();
        return $types;
    }

    public function getById($id){
        $type = $this->typeModel->findOrFail($id);
        return $type;
    }

    public function create($request){
        $data = [
            "name" => $request->name,
        ];
        $this->typeModel->create($data);
    }

    public function update($request, $id){
        $faq = $this->getById($id);
        $data = [
            "name" => $request->name,
        ];
        $faq->update($data);
    }

    public function delete($id){
        $this->typeModel->destroy($id);
    }
}
