<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Services\CategoryService;

use function view;

class ProfileController extends Controller
{
    private $userService;
    private $categoryService;

    public function __construct(UserService $userService, CategoryService $categoryService)
    {
        $this->userService = $userService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $userId = Auth::user()->id;
        $profile = $this->userService->getById($userId);
        return view('home.profile.index', compact('profile'));
    }

    public function edit($id)
    {
        if ( Auth::user()->id == $id) {
            $profile = $this->userService->getById($id);
            $categories = $this->categoryService->getBytype([config('consts.category.type.post.value'), config('consts.category.type.post_reference.value')]);
            return view('home.profile.edit', compact('profile', 'categories'));
        } else {
            return Redirect(route('home.profile.index'))->with('error', 'Bạn không có quyền truy cập');
        }
    }

    public function update(UpdateUserRequest $request, $id)
    {
        if ( Auth::user()->id == $id) {
            $this->userService->update($request, $id);
            return Redirect(route('profile.index'))->with('success', 'Cập nhật thành công');
        } else {
            return Redirect(route('profile.index'))->with('error', 'Bạn không có quyền truy cập');
        }
    }

}