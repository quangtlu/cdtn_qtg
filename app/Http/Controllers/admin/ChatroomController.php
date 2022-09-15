<?php

namespace App\Http\Controllers\Admin;

use App\Services\ChatroomService;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\Room\StoreChatroomRequest;
use App\Http\Requests\Admin\Room\UpdateChatroomRequest;
use App\Models\Post;

class chatroomController
{
    private $chatroomService;

    public function __construct(ChatroomService $chatroomService)
    {
        $this->chatroomService = $chatroomService;
        view()->share('users', User::all());
        view()->share('posts', Post::all());
    }

    public function index(Request $request)
    {
        try {
            $chatrooms = $this->chatroomService->getPaginate();
            if ($request->keyword) {
                $chatrooms = $this->chatroomService->search($request);
            }
            return view('admin.chatrooms.index', compact('chatrooms'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function create()
    {
        return view('admin.chatrooms.create');
    }

    public function store(StoreChatroomRequest $request)
    {
        try {
            $this->chatroomService->create($request);
            return Redirect(route('admin.chatrooms.index'))->with('success', 'Thêm phòng tư vấn thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function edit($id)
    {
        try {
            $chatroom = $this->chatroomService->getById($id);
            return view('admin.chatrooms.edit', compact('chatroom'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function update(UpdateChatroomRequest $request, $id)
    {
        try {
            $this->chatroomService->update($request, $id);
            return Redirect(route('admin.chatrooms.index'))->with('success', 'Cập nhật phòng tư vấn thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function destroy($id)
    {
        try {
            $chatroom = $this->chatroomService->delete($id);
            return response()->json(['chatroom' => $chatroom, 'message' => 'Xóa phòng tư vấn thành công']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }
}
