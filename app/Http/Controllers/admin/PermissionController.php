<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Permission\StorePermissionRequest;
use App\Services\PermissionService;
use function redirect;
use function view;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function index()
    {
        $permissions = $this->permissionService->getPaginate();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function search(Request $request)
    {
        $permissions = $this->permissionService->search($request);
        return view('admin.permissions.index', compact('permissions'));
    }

    public function store(StorePermissionRequest $request)
    {
        try {
            $this->permissionService->create($request);
            return Redirect(route('admin.permissions.index'))->with('success', 'Thêm quyền thành công');
        }
        catch (\Exception $exception){
            return Redirect(route('admin.permissions.index'))->with('error', 'Thêm quyền thất bại');
        }
    }

    public function destroy($id)
    {
        $this->permissionService->delete($id);
    }
}
