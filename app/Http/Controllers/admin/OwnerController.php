<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Owner\StoreOwnerRequest;
use App\Http\Requests\Admin\Owner\UpdateOwnerRequest;
use App\Services\OwnerService;
use Illuminate\Http\Request;
use function redirect;
use function view;
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
        $owners = $this->ownerService->getPaginate();
        if($request->keyword && ($request->name || $request->email || $request->phone)) {
            $owners = $this->ownerService->searchAndFilter($request);
        }
        else if ($request->name || $request->email || $request->phone) {
            $owners = $this->ownerService->filter($request);
        }
        else if ($request->keyword) {
            $owners = $this->ownerService->search($request);
        }
        $ownerAll = $this->ownerService->getAll();
        if ($owners->count() > 0) {
            return view('admin.owners.index', compact('owners', 'ownerAll'));
        } else {
            return redirect()->back()->with('error', 'Không có tác giả nào phù hợp');
        }
        return view('admin.owners.index', compact('ownerAll'));
    }

    public function create()
    {
        return view('admin.owners.create');
    }

    public function store(StoreOwnerRequest $request)
    {
        $this->ownerService->create($request);
        return Redirect(route('admin.owners.index'))->with('success', 'Thêm chủ sở hữu thành công');
    }

    public function edit($id)
    {
        $owner = $this->ownerService->getById($id);
        return view('admin.owners.edit', compact('owner'));
    }

    public function update(UpdateOwnerRequest $request, $id)
    {
        $this->ownerService->update($request, $id);
        return Redirect(route('admin.owners.index'))->with('success', 'Câp nhật chủ sở hữu thành công');
    }

    public function destroy($id)
    {
        $this->ownerService->delete($id);
    }
}
