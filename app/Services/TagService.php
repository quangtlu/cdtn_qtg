<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{
    private $tagModel;

    public function __construct(Tag $tagModel)
    {
        $this->tagModel = $tagModel;
    }

    public function getPaginate(){
        $tags = $this->tagModel->latest()->paginate(10);
        return $tags;
    }

    public function getAll()
    {
        $tags = $this->tagModel->all();
        return $tags;
    }

    public function search($request)
    {
        $tags = Tag::search($request->keyword)->paginate(10);
        return $tags;
    }

    public function getById($id){
        $tag = $this->tagModel->findOrFail($id);   
        return $tag; 
    }

    public function create($request){
        $data = [
            "name" => $request->name,
        ];
        $this->tagModel->create($data);
    }

    public function update($request, $id){
        $tag = $this->getById($id);
        $data = [
            "name" => $request->name,
        ];
        $tag->update($data);
    }

    public function delete($id){
        $this->tagModel->destroy($id);
    }
}
