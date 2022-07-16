<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use App\traits\HandleImage;
use Illuminate\Support\Facades\Auth;

class PostService
{
    use HandleImage;

    private $postModel;
    private $notificationService;

    public function __construct(Post $postModel, NotificationService $notificationService)
    {
        $this->postModel = $postModel;
        $this->notificationService = $notificationService;
    }

    public function getPaginate()
    {
        $posts = Post::accepted()->latest()->paginate(10);
        return $posts;
    }

    public function getAllPaginate()
    {
        $posts = Post::latest()->paginate(10);
        return $posts;
    }

    public function search($request)
    {
        $posts = Post::accepted()->search($request->keyword)->paginate(10);
        return $posts;
    }

    public function getById($id)
    {
        return $this->postModel->findOrFail($id);
    }

    public function getDetailPost($id)
    {
        return Post::where('id', $id)->accepted()->first();
    }

    public function getByCategory($categoryId)
    {
        return Post::hasCategory($categoryId)->accepted()->latest()->paginate(10);
    }

    public function getByTag($tagId)
    {
        return Post::hasCategory($tagId)->accepted()->latest()->paginate(10);
    }

    public function getByUser($userId)
    {
        return Post::accepted()->where('user_id', $userId)->latest()->paginate(10);
    }

    public function myPost()
    {
        return Post::where('user_id', Auth::user()->id)->latest()->paginate(10);
    }

    public function getAllCounselor($postId)
    {
        $post = $this->getById($postId);
        $userId = $post->user_id;
        $categories = $post->categories;
        $categoryIds = [];
        foreach ($categories as $category) {
            array_push($categoryIds, $category->id);
        }

        return User::whereHas('roles', function ($query) {
            $query->where('name', 'counselor');
        })
            ->whereHas('categories', function ($query) use ($categoryIds) {
                $query->orWhereIn('categories.id', $categoryIds);
            })
            ->where('id', '!=', $userId)
            ->get();
    }


    public function create($request)
    {
        $user = Auth()->user();
        $data = [
            "title" => $request->title,
            "content" => $request->content,
            "user_id" => $user->id,
            'status' => config('consts.post.status.request.value')
        ];
        if($user->hasAnyRole('mod', 'super-admin')) {
            $data['status'] = config('consts.post.status.unsolved.value');
        }
        if ($files = $request->file('image')) {
            $images = $this->uploadMutilpleImage($files);
            $data['image'] = implode("|", $images);
        } else {
            $data['image'] = null;
        }
        $post = $this->postModel->create($data);
        $post->tags()->attach($request->tag_id);
        $post->categories()->attach($request->category_id);

        return $post;
    }

    public function update($request, $id)
    {
        $post = $this->getById($id);
        $user_id = Auth()->user()->id;
        $data = [
            "title" => $request->title,
            "content" => $request->content,
            "user_id" => $user_id,
        ];

        if ($files = $request->file('image')) {
            $images = $this->uploadMutilpleImage($files);
            $data['image'] = implode("|", $images);
        }
        $post->update($data);
        $post->tags()->sync($request->tag_id);
        $post->categories()->sync($request->category_id);
    }

    public function toogleSovled($id)
    {
        $post = $this->getById($id);
        if ($post->status == config('consts.post.status.solved.value')) {
            $data = ['status' => config('consts.post.status.unsolved.value')];
        } else {
            $data = ['status' => config('consts.post.status.solved.value')];
        }
        $post->update($data);
    }

    public function handleRequestPost($id, $action)
    {
        $post = $this->getById($id);
        if ($post->status == config('consts.post.status.request.value')) {
            switch ($action) {
                case config('consts.post.action.accept'):
                    $data = ['status' => config('consts.post.status.unsolved.value')];
                    break;
                case config('consts.post.action.refuse'):
                    $data = ['status' => config('consts.post.status.refuse.value')];
                    break;
                default:
                    break;
            }
            $post->update($data);
        }
        return $post;
    }

    public function delete($id)
    {
        $post = $this->getById($id);
        $this->postModel->destroy($id);
        $post->categories()->detach();
        $post->tags()->detach();
    }

    public function filter($request)
    {
        if($request->status == config('consts.post.status.refuse.value') || $request->status == config('consts.post.status.request.value')) {
            $posts = Post::filterCategory($request)->filterTag($request)->filterStatus($request)->where('user_id', Auth::user()->id)->paginate(10);
        } else {
            $posts = Post::accepted()->filterCategory($request)->filterTag($request)->filterStatus($request)->paginate(10);
        }
        return $posts;
    }

    public function searchAndFilter($request)
    {
        $posts = Post::accepted()
                    ->filterCategory($request)
                    ->filterTag($request)
                    ->filterStatus($request)
                    ->search($request->keyword)
                    ->paginate(10);
        return $posts;
    }

    public function getReferencePosts()
    {
        return Post::accepted()->reference()->paginate(10);
    }

    public function getPostIdRelateByTable($postId, array $relateTables)
    {
        $postIds = [];

        foreach ($relateTables as $relateTable) {
            $tableCollections = $this->getById($postId)->$relateTable;
            if ($tableCollections->count() > 0) {
                foreach ($tableCollections as $item) {
                    foreach ($item->posts as $post) {
                        if ($post->id != $postId) {
                            array_push($postIds, $post->id);
                        }
                    }
                }
            }
        }
        return $postIds;
    }

    public function getPostRelate($id)
    {
        $postIds = $this->getPostIdRelateByTable($id, ['categories', 'tags']);
        return Post::accepted()->whereIn('id', $postIds)->paginate(5);
    }

    public function sortPost($sortBy)
    {
        if ($sortBy == 'sort-new-post') {
            $posts = Post::accepted()->latest()->paginate(10);
        } else if ($sortBy == 'sort-new-comment') {
            $posts = Post::accepted()->leftJoin('comments', 'comments.post_id', '=', 'posts.id')
                ->groupBy('posts.id')
                ->orderByRaw('COALESCE(GREATEST(posts.created_at, MAX(comments.created_at)), posts.created_at) DESC')
                ->select('posts.*')->paginate(10);
        } else {
            $posts = Post::accepted()->leftJoin('comments', 'comments.post_id', '=', 'posts.id')
                ->groupBy('posts.id')
                ->orderByRaw('COALESCE(GREATEST(posts.created_at, MAX(comments.created_at)), posts.created_at) ASC')
                ->select('posts.*')->paginate(10);
        }
        return $posts;
    }
}
