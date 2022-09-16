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
        try {
            $references = $this->referenceService->getPaginate();
            if ($request->keyword) {
                $references = $this->referenceService->search($request);
            }
            return view('admin.references.index', compact('references'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }

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
        try {
            $reference = $this->referenceService->getById($id);
            return view('admin.references.edit', compact('reference'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }

    }

    public function update(UpdateReferenceRequest $request, $id)
    {
        try {
            $this->referenceService->update($request, $id);
            return Redirect(route('admin.references.index'))->with('success', config('consts.message.success.update'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }

    }

    public function destroy($id)
    {
        try {
            $reference = $this->referenceService->delete($id);
            return response()->json(['reference' => $reference, 'message' => config('consts.message.success.delete')]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }

    }
}
