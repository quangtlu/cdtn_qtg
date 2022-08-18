<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\DocumentLaw\StoreDocumentLawRequest;
use App\Http\Requests\Admin\DocumentLaw\UpdateDocumentLawRequest;
use App\Services\DocumentLawService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentLawController extends Controller
{
    private $documentLawService;

    public function __construct(DocumentLawService $documentLawService)
    {
        $this->documentLawService = $documentLawService;
    }

    public function index(Request $request)
    {
        $documentLaws = $this->documentLawService->getPaginate();
        if($request->keyword) {
            $documentLaws = $this->documentLawService->search($request);
        }
        if($request->keyword && ($request->title)) {
            $documentLaws = $this->documentLawService->searchAndFilter($request);
        }
        else if ($request->title) {
            $documentLaws = $this->documentLawService->filter($request);
        }
        else if ($request->keyword) {
            $documentLaws = $this->documentLawService->search($request);
        }
        $documentLawAll = $this->documentLawService->getAll();
        return view('admin.documentLaws.index', compact('documentLaws', 'documentLawAll'));
    }

    public function create()
    {
        return view('admin.documentLaws.create');
    }

    public function store(StoreDocumentLawRequest $request)
    {
        $this->documentLawService->create($request);
        return Redirect(route('admin.documentLaws.index'))->with('success', 'Thêm văn bản pháp luật thành công');
    }

    public function edit($id)
    {
        $documentLaw = $this->documentLawService->getById($id);
        $url = $documentLaw->url;
        $thumbnail = $documentLaw->thumbnail;
        return view('admin.documentLaws.edit', compact('documentLaw', 'url', 'thumbnail'));
    }

    public function update(UpdateDocumentLawRequest $request, $id)
    {
        $this->documentLawService->update($request, $id);
        return Redirect(route('admin.documentLaws.index'))->with('success', 'Cập nhật văn bản pháp luật thành công');
    }

    public function destroy($id)
    {
        $documentLaw = $this->documentLawService->delete($id);
        return response()->json(['documentLaw' => $documentLaw, 'message' => 'Xóa văn bản pháp luật thành công']);
    }
}
