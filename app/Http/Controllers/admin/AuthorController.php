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

    public function index()
    {
        $authors = $this->authorService->getPaginate();
        return view('admin.authors.index', compact('authors'));
    }

    public function search(Request $request)
    {
        $authors = $this->authorService->search($request);
        return view('admin.authors.index', compact('authors'));
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
        $this->authorService->delete($id);
    }
}
