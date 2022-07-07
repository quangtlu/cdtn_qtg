<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostCategory;
use App\Models\Tag;
use App\traits\HandleImage;

class PostService
{
    use HandleImage;

    private $postModel;

    public function __construct(Post $postModel)
    {
        $this->postModel = $postModel;
    }

    public function getPaginate()
    {
        $posts = Post::latest()->paginate(10);
        return $posts;
    }

    public function search($request)
    {
        $posts = Post::search($request->keyword)->paginate(10);
        return $posts;
    }

    public function getById($id)
    {
        $post = $this->postModel->findOrFail($id);
        return $post;
    }

    public function create($request)
    {
        $user = Auth()->user();
        $data = [
            "title" => $request->title,
            "content" => $request->content,
            "user_id" => $user->id,
        ];
        if ($files = $request->file('image')) {
            $images = $this->uploadMutilpleImage($files);
            $data['image'] = implode("|", $images);
        } else {
            $data['image'] = null;
        }
        $post = $this->postModel->create($data);
        $post->tags()->attach($request->tag_id);
        $post->categories()->attach($request->category_id);
        if ($post) {
            $user->givePermissionTo(['edit post', 'delete post']);
        }
    }

    public function update($request, $id)
    {
        $post = $this->getById($id);
        $nameUser = Auth()->user()->id;
        $data = [
            "title" => $request->title,
            "status" => $request->status,
            "content" => $request->content,
            "user_id" => $nameUser,
        ];

        if ($files = $request->file('image')) {
            $images = $this->uploadMutilpleImage($files);
            $data['image'] = implode("|", $images);
        }
        $post->update($data);
        $post->tags()->sync($request->tag_id);
        $post->categories()->sync($request->category_id);
    }

    public function toogleStatus($id)
    {
        $post = $this->getById($id);
        $data = ['status' => !$post->status];
        $post->update($data);
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
        $posts = Post::query()->filterCategory($request)->filterTag($request)->filterStatus($request)->paginate(10);
        return $posts;
    }

    public function searchAndFilter($request)
    {
        $posts = Post::query()->filterCategory($request)->filterTag($request)->filterStatus($request)->search($request->keyword)->paginate(10);
        return $posts;
    }

    public function getPostHome()
    {
        $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();
        return $posts;
    }

    public function getPostIdRelateByTable($postId, array $relateTables)
    {
        $postIds = [];

        foreach ($relateTables as $relateTable) {
            $tableCollections = $this->getById($postId)->$relateTable;
            if ($tableCollections->count() > 0) {
                foreach ($tableCollections as $item) {
                    foreach ($item->posts as $post) {
                        if($post->id != $postId) {
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
        return Post::whereIn('id', $postIds)->paginate(5);
    }

    public function sortPost($sortBy)
    {
        if ($sortBy == 'sort-new-post') {
            $posts = Post::latest()->paginate(10);
        } else if ($sortBy == 'sort-new-post') {
            $posts = Post::leftJoin('comments', 'comments.post_id', '=', 'posts.id')
            ->groupBy('posts.id')
            ->orderByRaw('COALESCE(GREATEST(posts.created_at, MAX(comments.created_at)), posts.created_at) DESC')
            ->select('posts.*')->paginate(10);
        } else {
            $posts = Post::leftJoin('comments', 'comments.post_id', '=', 'posts.id')
            ->groupBy('posts.id')
            ->orderByRaw('COALESCE(GREATEST(posts.created_at, MAX(comments.created_at)), posts.created_at) ASC')
            ->select('posts.*')->paginate(10);
        }
        return $posts;
    }
}
