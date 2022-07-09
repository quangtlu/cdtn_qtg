<?php

namespace App\Services;

use App\Models\Chatroom;

class ChatroomService

{
    private $chatroomModel;

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

    public function create($request){
        $data = [
            "name" => $request->name,
            "description" => $request->description,
        ];
        $chatroom = $this->chatroomModel->create($data);
        $chatroom->users()->attach($request->user_id);
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
    }
}
