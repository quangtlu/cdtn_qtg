<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use Illuminate\Http\Request;

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

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(Request $request)
    {
        $this->authorService->create($request);
        return Redirect(route('admin.authors.index'));
    }

    public function edit($id)
    {
        $author = $this->authorService->getById($id);
        return view('admin.authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $this->authorService->update($request, $id);
        return Redirect(route('admin.authors.index'));
    }

    public function destroy($id)
    {
        $this->authorService->delete($id);
        return Redirect(route('admin.authors.index'));
    }
}
