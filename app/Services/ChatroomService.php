<?php

namespace App\Services;

use App\Models\Chatroom;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatroomService

{
    private $chatroomModel;
    private $userModel;

    public function __construct(Chatroom $chatroomModel)
    {
        $this->chatroomModel = $chatroomModel;
    }

    public function getPaginate(){
        $chatrooms = $this->chatroomModel->latest()->paginate(10);
        return $chatrooms;
    }

    public function search($request)
    {
        $chatrooms = Chatroom::search($request->keyword)->paginate(10);
        return $chatrooms;
    }

    public function getAll()
    {
        $chatrooms = $this->chatroomModel->all();
        return $chatrooms;
    }

    public function getById($id){
        $chatroom = $this->chatroomModel->findOrFail($id);
        return $chatroom;
    }

    public function create($request, $postId = null){
        // create from User page
        if($postId) {
            $indexChatroom = Chatroom::count();
            $counselor = User::findOrFail($request->counselor_id);
            $post = Post::findOrFail($postId);
            $user = $post->user;
            $data = [
                "name" => 'Phòng '.$indexChatroom,
                "description" => $post->title,
                "post_id" => $post->id,
                "connector_id" => Auth::user()->id,
            ];
            $userIds[] = $counselor->id;
            $userIds[] = $user->id;
        } 
        // create from Admin page
        else {
            $data = [
                "name" => $request->name,
                "description" => $request->description,
                "post_id" => $request->post_id,
                "connector_id" => $request->post_id,
            ];
            $userIds = $request->user_id;
        }
        $chatroom = $this->chatroomModel->create($data);
        $chatroom->users()->attach($userIds);
        return $chatroom;
    }

    public function update($request, $id){
        $chatroom = $this->getById($id);
        $data = [
            "name" => $request->name,
            "description" => $request->description,
        ];
        $chatroom->update($data);
        $chatroom->users()->sync($request->user_id);
    }

    public function delete($id){
        $chatroom = $this->getById($id);
        $this->chatroomModel->destroy($id);
        $chatroom->users()->detach();
        return $chatroom;
    }
}
