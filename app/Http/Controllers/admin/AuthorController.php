<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Author\StoreAuthorRequest;
use App\Http\Requests\Admin\Author\UpdateAuthorRequest;
use App\Services\AuthorService;
use Illuminate\Http\Request;
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
        try {
            $authors = $this->authorService->getPaginate();
            if ($request->keyword) {
                $authors = $this->authorService->search($request);
            }
            if ($request->keyword && ($request->name || $request->gender || $request->email || $request->phone)) {
                $authors = $this->authorService->searchAndFilter($request);
            } else if ($request->name || $request->gender || $request->email || $request->phone) {
                $authors = $this->authorService->filter($request);
            } else if ($request->keyword) {
                $authors = $this->authorService->search($request);
            }
            $authorAll = $this->authorService->getAll();
            return view('admin.authors.index', compact('authors', 'authorAll'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(StoreAuthorRequest $request)
    {
        try {
            $this->authorService->create($request);
            return Redirect(route('admin.authors.index'))->with(
                'success',
                config('consts.message.success.create')
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function edit($id)
    {
        try {
            $author = $this->authorService->getById($id);
            return view('admin.authors.edit', compact('author'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function update(UpdateAuthorRequest $request, $id)
    {
        try {
            $this->authorService->update($request, $id);
            return Redirect(route('admin.authors.index'))->with('success', config('consts.message.success.update'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function destroy($id)
    {
        try {
            $author = $this->authorService->delete($id);
            return response()->json(['author' => $author, 'message' => config('consts.message.success.delete')]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }
}
