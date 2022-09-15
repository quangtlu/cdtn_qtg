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
        try {
            $documentLaws = $this->documentLawService->getPaginate();
            if ($request->keyword) {
                $documentLaws = $this->documentLawService->search($request);
            }
            if ($request->keyword && ($request->title)) {
                $documentLaws = $this->documentLawService->searchAndFilter($request);
            } else if ($request->title) {
                $documentLaws = $this->documentLawService->filter($request);
            } else if ($request->keyword) {
                $documentLaws = $this->documentLawService->search($request);
            }
            $documentLawAll = $this->documentLawService->getAll();
            return view('admin.documentLaws.index', compact('documentLaws', 'documentLawAll'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function create()
    {
        return view('admin.documentLaws.create');
    }

    public function store(StoreDocumentLawRequest $request)
    {
        try {
            $this->documentLawService->create($request);
            return Redirect(route('admin.documentLaws.index'))->with(
                'success',
                config('consts.message.success.create')
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function edit($id)
    {
        try {
            $documentLaw = $this->documentLawService->getById($id);
            $url = $documentLaw->url;
            $thumbnail = $documentLaw->thumbnail;
            return view('admin.documentLaws.edit', compact('documentLaw', 'url', 'thumbnail'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function update(UpdateDocumentLawRequest $request, $id)
    {
        try {
            $this->documentLawService->update($request, $id);
            return Redirect(route('admin.documentLaws.index'))->with(
                'success',
                config('consts.message.success.udpate')
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function destroy($id)
    {
        try {
            $documentLaw = $this->documentLawService->delete($id);
            return response()->json([
                'documentLaw' => $documentLaw, 'message' => config('consts.message.success.delete')
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }
}
