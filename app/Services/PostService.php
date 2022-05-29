<?php

namespace App\Services;

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
                $images=array();
                foreach($files as $file){
                    $name=$file->getClientOriginalName();
                    $file->move('image/posts',$name);
                    $images[]=$name;
                }
                $data['image'] = implode("|",$images);
                
        } else {
            $data['image'] = null;
        }
        $post = $this->postModel->create($data);
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
                $images=array();
                foreach($files as $file){
                    $name=$file->getClientOriginalName();
                    $file->move('image/post',$name);
                    $images[]=$name;
                }
                $data['image'] = implode("|",$images);
        }
        $post->update($data);
    }

    public function delete($id){
        $post = $this->getById($id);
        $this->postModel->destroy($id);
    }
}