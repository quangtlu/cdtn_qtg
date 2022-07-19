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

    public function search($request)
    {
        $authors = Author::search($request->keyword)->paginate(10);
        return $authors;
    }

    public function getAll()
    {
        $authors = $this->authorModel->all();
        return $authors;
    }

    public function getById($id){
        $author = $this->authorModel->findOrFail($id);   
        return $author; 
    }

    public function create($request){
        $date = str_replace('/', '-', $request->dob);
        $dob = date('Y-m-d', strtotime($date));
        $data = [
            "name" => $request->name,
            "phone" => $request->phone,
            "gender" => $request->gender,
            "dob" => $dob,
            "email" => $request->email,
        ];
        $this->authorModel->create($data);
    }

    public function update($request, $id){
        $author = $this->getById($id);
        $date = str_replace('/', '-', $request->dob);
        $dob = date('Y-m-d', strtotime($date));
        $data = [
            "name" => $request->name,
            "phone" => $request->phone,
            "gender" => $request->gender,
            "dob" => $dob,
            "email" => $request->email,
        ];
        $author->update($data);
    }

    public function delete($id){
        return $this->authorModel->destroy($id);
    }

    public function filter($request)
    {
        $authors = Author::query()->filterName($request)->filterGender($request)->filterEmail($request)->filterPhone($request)->paginate(10);
        return $authors;
    }

    public function searchAndFilter($request)
    {
        $authors = Author::query()->filterName($request)->filterGender($request)->filterEmail($request)->filterPhone($request)->search($request->keyword)->paginate(10);
        return $authors;
    }
}
