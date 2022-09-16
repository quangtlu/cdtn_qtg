<?php

namespace App\Http\Controllers\Admin;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class ProfileController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        try {
            $userId = Auth::user()->id;
            $profile = $this->userService->getById($userId);
            return view('admin.profile.index', compact('profile'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }

    }

    public function edit($id)
    {
        try {
            if ($id == Auth::user()->id) {
                $profile = $this->userService->getById($id);
                $profileImg = $profile->image;
                return view('admin.profile.edit', compact('profile', 'profileImg'));
            } else {
                abort(403);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }

    }

    public function update(Request $request, $id)
    {
        try {
            if ($id == Auth::user()->id) {
                $this->userService->update($request, $id);
                return Redirect(route('admin.profile.index'))->with('success', config('consts.message.success.update')
            );
            } else {
                abort(403);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }

    }
}
