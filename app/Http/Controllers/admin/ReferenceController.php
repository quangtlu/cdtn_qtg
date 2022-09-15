<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Reference\StoreReferenceRequest;
use App\Http\Requests\Admin\Reference\UpdateReferenceRequest;
use App\Services\ReferenceService;

class ReferenceController extends Controller
{
    private $referenceService;

    public function __construct(ReferenceService $referenceService)
    {
        $this->referenceService = $referenceService;
    }

    public function index(Request $request)
    {
        $references = $this->referenceService->getPaginate();
        if ($request->keyword) {
            $references = $this->referenceService->search($request);
        }
        return view('admin.references.index', compact('references'));
    }

    public function create()
    {
        return view('admin.references.create');
    }

    public function store(StoreReferenceRequest $request)
    {
        try {
            $this->referenceService->create($request);
            return Redirect(route('admin.references.index'))->with('success', config('consts.message.success.create'));
        } catch (\Throwable $th) {
           return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function edit($id)
    {
        $reference = $this->referenceService->getById($id);
        return view('admin.references.edit', compact('reference'));
    }

    public function update(UpdateReferenceRequest $request, $id)
    {
        $this->referenceService->update($request, $id);
        return Redirect(route('admin.references.index'))->with('success', config('consts.message.success.update'));
    }

    public function destroy($id)
    {
        $reference = $this->referenceService->delete($id);
        return response()->json(['reference' => $reference, 'message' => config('consts.message.success.delete')]);
    }
}
