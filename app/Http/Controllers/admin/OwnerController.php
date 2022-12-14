<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Owner\StoreOwnerRequest;
use App\Http\Requests\Admin\Owner\UpdateOwnerRequest;
use App\Services\OwnerService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OwnerController extends Controller
{
    private $ownerService;

    public function __construct(OwnerService $ownerService)
    {
        $this->ownerService = $ownerService;
    }

    public function index(Request $request)
    {
        try {
            $owners = $this->ownerService->getPaginate();
            if ($request->keyword && ($request->name || $request->email || $request->phone)) {
                $owners = $this->ownerService->searchAndFilter($request);
            } else if ($request->name || $request->email || $request->phone) {
                $owners = $this->ownerService->filter($request);
            } else if ($request->keyword) {
                $owners = $this->ownerService->search($request);
            }
            $ownerAll = $this->ownerService->getAll();
            if (!$owners->count() && $request->keyword) {
                return redirect()->back()->with('error', 'Không có chủ sở hữu nào phù hợp');
            }
            return view('admin.owners.index', compact('ownerAll', 'owners'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function create()
    {
        return view('admin.owners.create');
    }

    public function store(StoreOwnerRequest $request)
    {
        try {
            $this->ownerService->create($request);
            return Redirect(route('admin.owners.index'))->with('success', 'Thêm chủ sở hữu thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function edit($id)
    {
        try {
            $owner = $this->ownerService->getById($id);
            return view('admin.owners.edit', compact('owner'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function update(UpdateOwnerRequest $request, $id)
    {
        try {
            $this->ownerService->update($request, $id);
            return Redirect(route('admin.owners.index'))->with('success', config('consts.message.success.update'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function destroy($id)
    {
        try {
            $owner = $this->ownerService->delete($id);
            return response()->json(['owner' => $owner, 'message' => config('consts.message.error.common')]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }
}
