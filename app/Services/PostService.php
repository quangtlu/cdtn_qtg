<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Post;
use App\traits\HandleImage;
use Illuminate\Support\Facades\Auth;

class PostService
{
    use HandleImage;

    private $postModel;

    public function __construct(Post $postModel)
    {
        $this->postModel = $postModel;
    }

    public function getPaginate(){
        $posts = Post::latest()->paginate(10);
        return $posts;
    }

    public function getById($id){
        $post = $this->postModel->findOrFail($id);
        return $post;
    }

    public function create($request){
        $user = Auth()->user();
        $data = [
            "title" => $request->title,
            "content" => $request->content,
            "user_id" => $user->id,
        ];
        if($files=$request->file('image')){
            $images = $this->uploadMutilpleImage($files);
            $data['image'] = implode("|",$images);

        } else {
            $data['image'] = null;
        }
        $post = $this->postModel->create($data);
        $post->tag()->attach($request->tag_id);
        $post->category()->attach($request->category_id);
        if ($post) {
            $user->givePermissionTo(['user edit post', 'user delete post']);
        }
    }

    public function update($request, $id){
        $post = $this->getById($id);
        $nameUser = Auth()->user()->id;
        $data = [
            "title" => $request->title,
            "content" => $request->content,
            "user_id" => $nameUser,
        ];

        if($files=$request->file('image')){
            $images = $this->uploadMutilpleImage($files);
            $data['image'] = implode("|",$images);
        }
        $post->update($data);
        $post->tag()->sync($request->tag_id);
        $post->category()->sync($request->category_id);
    }

    public function delete($id){
        $this->postModel->destroy($id);
    }
}
