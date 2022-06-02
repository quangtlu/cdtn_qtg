<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostService
{
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
            $time = Carbon::now('Asia/Ho_Chi_Minh')->format("Y.m.d H.i.s");
                $images=array();
                foreach($files as $file){
                    $name=$time.'.'.$file->getClientOriginalName();
                    $file->move('image/posts',$name);
                    $images[]=$name;
                }
                $data['image'] = implode("|",$images);

        } else {
            $data['image'] = null;
        }
        $post = $this->postModel->create($data);
        $post->tag()->attach($request->tag_id);
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
            $time = Carbon::now('Asia/Ho_Chi_Minh')->format("Y.m.d H.i.s");
                $images=array();
                foreach($files as $file){
                    $name=$time.'.'.$file->getClientOriginalName();
                    $file->move('image/posts',$name);
                    $images[]=$name;
                }
                $data['image'] = implode("|",$images);
        }
        $post->update($data);
        $post->tag()->sync($request->tag_id);
    }

    public function delete($id){
        $post = $this->getById($id);
        $this->postModel->destroy($id);
        $post->tag()->detach();
    }
}
