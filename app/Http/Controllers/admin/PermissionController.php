<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Permission\StorePermissionRequest;
use App\Services\PermissionService;
use function redirect;
use function view;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    private $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function index(Request $request)
    {
        $permissions = $this->permissionService->getPaginate();
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
       $permission = $this->permissionService->delete($id);
       return response()->json(['permission' => $permission, 'message' => 'Xóa quyền thành công']);
    }
}
