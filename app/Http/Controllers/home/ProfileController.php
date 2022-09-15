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
        try {
            $userId = Auth::user()->id;
            $profile = $this->userService->getById($userId);
            return view('home.profile.index', compact('profile'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }

    }

    public function edit($id)
    {
        try {
            if (Auth::user()->id == $id) {
                $profile = $this->userService->getById($id);
                $categories = $this->categoryService->getParentBytype([config('consts.category.type.post.value'), config('consts.category.type.post_reference.value')]);
                return view('home.profile.edit', compact('profile', 'categories'));
            } else {
                abort(403);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function update(UpdateUserRequest $request, $id)
    {
        try {
            if (Auth::user()->id == $id) {
                $this->userService->update($request, $id);
                return Redirect(route('profile.index'))->with('success', 'Cập nhật thành công');
            } else {
                abort(403);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }
}
