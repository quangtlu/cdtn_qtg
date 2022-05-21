<?php

namespace App\Services;

use App\Models\Author;

class AuthorService

{
    private $authorModel;

    public function __construct(Author $authorModel)
    {
        $this->authorModel = $authorModel;
    }

    public function getPaginate(){
        $authors = $this->authorModel->latest()->paginate(10);
        return $authors;
    }

    public function getById($id){
        $author = $this->authorModel->findOrFail($id);   
        return $author; 
    }

    public function create($request){
        $data = [
            "name" => $request->name,
            "dob" => $request->dob,
        ];
        $this->authorModel->create($data);
    }

    public function update($request, $id){
        $author = $this->getById($id);
        $data = [
            "name" => $request->name,
            "dob" => $request->dob,
        ];
        $author->update($data);
    }

    public function delete($id){
        $this->authorModel->destroy($id);
    }
}
