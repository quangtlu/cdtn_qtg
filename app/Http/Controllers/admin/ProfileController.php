<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Services\InfoService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $userId = Auth::user()->id;
        $profile = $this->userService->getById($userId);
        $profileImg = $profile->image ? ($profile->image) : null;
        return view('admin.profile.index', compact('profile', 'profileImg'));
    }

    public function edit($id)
    {
        if ($this->checkPermission($id)) {
            $profile = $this->userService->getById($id);
            $profileImg = $profile->image;
            return view('admin.profile.edit', compact('profile', 'profileImg'));
        } else {
            return Redirect(route('admin.profile.index'))->with('error', 'Bạn không có quyền truy cập');
        }
    }

    public function update(Request $request, $id)
    {
        if ($this->checkPermission($id)) {
            $this->userService->update($request, $id);
            return Redirect(route('admin.profile.index'))->with('success', 'Cập nhật thành công');
        } else {
            return Redirect(route('admin.profile.index'))->with('error', 'Bạn không có quyền truy cập');
        }
    }

    public function checkPermission($id)
    {
        return $id == Auth::user()->id;
        
    }
}
