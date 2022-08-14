<?php

namespace App\Services;

use App\Models\DocumentLaw;
use App\traits\HandleImage;

class DocumentLawService
{
    private $documentLawModel;
    use HandleImage;

    public function __construct(DocumentLaw $documentLawModel)
    {
        $this->documentLawModel = $documentLawModel;
    }

    public function getPaginate()
    {
        $documentLaws = $this->documentLawModel->latest()->paginate(10);
        return $documentLaws;
    }

    public function search($request)
    {
        $documentLaws = DocumentLaw::search($request->keyword)->paginate(10);
        return $documentLaws;
    }

    public function getAll()
    {
        $documentLaws = $this->documentLawModel->all();
        return $documentLaws;
    }

    public function getById($id)
    {
        $documentLaws = $this->documentLawModel->findOrFail($id);
        return $documentLaws;
    }

    public function create($request)
    {
        $file = $request->file('url');
        $url = $file->getClientOriginalName();
        $file->move('document', $url);
        $data = [
            "title" => $request->title,
            "description" => $request->description,
            "url" => $url,
        ];
        if ($file = $request->file('thumbnail')) {
            $thumbnail = $file->getClientOriginalName();
            $file->move('image/documentLaws', $thumbnail);
            $data["thumbnail"] = $thumbnail;
        }

        $this->documentLawModel->create($data);
    }

    public function update($request, $id)
    {
        $documentLaw = $this->getById($id);
        $data = [
            "title" => $request->title,
            "description" => $request->description,
        ];

        if ($file = $request->file('thumbnail')) {
            $thumbnail = $file->getClientOriginalName();
            $file->move('image/documentLaws', $thumbnail);
            $data['thumbnail'] = $thumbnail;
        }

        if ($file = $request->file('url')) {
            $url = $file->getClientOriginalName();
            $file->move('document', $url);
            $data['url'] = $url;
        }
        $documentLaw->update($data);
    }

    public function delete($id)
    {
        return $this->documentLawModel->destroy($id);
    }

    public function filter($request)
    {
        $documentLaws = DocumentLaw::query()->filterTitle($request)->paginate(10);
        return $documentLaws;
    }

    public function searchAndFilter($request)
    {
        $documentLaws = DocumentLaw::query()->filterTitle($request)->search($request->keyword)->paginate(10);
        return $documentLaws;
    }
}
