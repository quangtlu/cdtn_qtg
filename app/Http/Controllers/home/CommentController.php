<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\Comment\CommentRequest;
use App\Services\CommentService;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store(CommentRequest $request)
    {
        $this->commentService->create($request);
        return redirect()->back();
    }

    public function update(CommentRequest $request, $id)
    {
        $this->commentService->update($request, $id);
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $comment = $this->commentService->getById($id);
        if (Auth::user()->id != $comment->user->id ) {
            return redirect()->back()->with('error', 'Bạn không có quyền truy cập');
        }
        else {
            $this->commentService->delete($id);
        }
    }

}
