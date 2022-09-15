<?php

namespace App\Services;

use App\Models\Reference;

class ReferenceService

{
    private $referenceModel;

    public function __construct(Reference $referenceModel)
    {
        $this->referenceModel = $referenceModel;
    }

    public function getPaginate()
    {
        $references = $this->referenceModel->latest()->paginate(10);
        return $references;
    }

    public function search($request)
    {
        $references = Reference::search($request->keyword)->paginate(10);
        return $references;
    }

    public function getAll()
    {
        $references = $this->referenceModel->all();
        return $references;
    }

    public function getById($id)
    {
        $reference = $this->referenceModel->findOrFail($id);
        return $reference;
    }

    public function create($request)
    {
        $data = [
            "title" => $request->title,
            "description" => $request->description,
            "url" => $request->url,
        ];
        $this->referenceModel->create($data);
    }

    public function update($request, $id)
    {
        $reference = $this->getById($id);
        $data = [
            "title" => $request->title,
            "description" => $request->description,
            "url" => $request->url,
        ];
        $reference->update($data);
    }

    public function delete($id)
    {
        return $this->referenceModel->destroy($id);
    }

}
