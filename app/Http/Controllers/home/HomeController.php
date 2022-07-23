<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\TagService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $postService;
    private $tagService;
    private $categoryService;

    /**
     * @param $postService
     */
    public function __construct(
        PostService $postService,
        TagService $tagService,
        CategoryService $categoryService
    ) {
        $this->postService = $postService;
        $this->tagService = $tagService;
        $this->categoryService = $categoryService;

        $tags = $this->tagService->getAll();
        $categories = $this->categoryService->getBytype([config('consts.category.type.post.value'), config('consts.category.type.post_reference.value')]);
        view()->share(['tags' => $tags, 'categories' => $categories]);
    }

    public function index(Request $request)
    {
        try {
            $posts = $this->postService->getReferencePosts();
            if ($request->keyword) {
                $posts = $this->postService->search($request);
                if (!$posts->count()) {
                    return redirect()->back()->with('error', 'Không có bài viết nào phù hợp');
                }
            }
            return view('home.index', compact('posts'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra trong quá trình lấy dữ liệu');
        }
        
    }
}
