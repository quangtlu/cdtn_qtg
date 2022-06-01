<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Tag\StoreTagRequest;
use App\Http\Requests\Admin\Tag\UpdateTagRequest;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }
    
    public function index()
    {
        $tags = $this->tagService->getPaginate();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(StoreTagRequest $request)
    {
        $this->tagService->create($request);
        return Redirect(route('admin.tags.index'))->with('success', 'Thêm tag thành công');
    }

    public function edit($id)
    {
        $tag = $this->tagService->getById($id);
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(UpdateTagRequest $request, $id)
    {
        $this->tagService->update($request, $id);
        return Redirect(route('admin.tags.index'))->with('success', 'Câp nhật tag thành công');
    }

    public function destroy($id)
    {
        $this->tagService->delete($id);
        return Redirect(route('admin.tags.index'));
    }
}
