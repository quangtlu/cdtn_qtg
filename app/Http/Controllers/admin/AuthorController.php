<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Author\StoreAuthorRequest;
use App\Http\Requests\Admin\Author\UpdateAuthorRequest;
use App\Services\AuthorService;
use Illuminate\Http\Request;
use function redirect;
use function view;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    private $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index(Request $request)
    {
        $authors = $this->authorService->getPaginate();
        if($request->keyword) {
            $authors = $this->authorService->search($request);
        }
        if($request->keyword && ($request->name || $request->gender || $request->email || $request->phone)) {
            $authors = $this->authorService->searchAndFilter($request);
        }
        else if ($request->name || $request->gender || $request->email || $request->phone) {
            $authors = $this->authorService->filter($request);
        }
        else if ($request->keyword) {
            $authors = $this->authorService->search($request);
        }
        $authorAll = $this->authorService->getAll();
        if ($authors->count() > 0) {
            return view('admin.authors.index', compact('authors', 'authorAll'));
        } else {
            return redirect()->back()->with('error', 'Không có tác giả nào phù hợp');
        }
        return view('admin.authors.index', compact('authorAll'));
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(StoreAuthorRequest $request)
    {
        $this->authorService->create($request);
        return Redirect(route('admin.authors.index'))->with('success', 'Thêm tác giả thành công');
    }

    public function edit($id)
    {
        $author = $this->authorService->getById($id);
        return view('admin.authors.edit', compact('author'));
    }

    public function update(UpdateAuthorRequest $request, $id)
    {
        $this->authorService->update($request, $id);
        return Redirect(route('admin.authors.index'))->with('success', 'Cập nhật tác giả thành công');
    }

    public function destroy($id)
    {
        $author = $this->authorService->delete($id);
        return response()->json(['author' => $author, 'message' => 'Xóa tác giả thành công']);
    }
}
