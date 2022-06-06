<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use function view;

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
        return view('home.profile.index', compact('profile'));
    }

    public function edit($id)
    {
        if ($this->checkPermission($id)) {
            $profile = $this->userService->getById($id);
            $profileImg = $profile->image;
            return view('home.profile.edit', compact('profile', 'profileImg'));
        } else {
            return Redirect(route('home.profile.index'))->with('error', 'Bạn không có quyền truy cập');
        }
    }

    public function update(UpdateUserRequest $request, $id)
    {
        if ($this->checkPermission($id)) {
            $this->userService->update($request, $id);
            return Redirect(route('home.profile.index'))->with('success', 'Cập nhật thành công');
        } else {
            return Redirect(route('home.profile.index'))->with('error', 'Bạn không có quyền truy cập');
        }
    }

    public function checkPermission($id)
    {
        return $id == Auth::user()->id;
    }
}