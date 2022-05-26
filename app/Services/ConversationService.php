<?php

namespace App\Services;

use App\Models\Conversation;

class ConversationService

{
    private $conversationModel;

    public function __construct(Conversation $conversationModel)
    {
        $this->conversationModel = $conversationModel;
    }

    public function getPaginate(){
        $conversations = $this->conversationModel->latest()->paginate(10);
        return $conversations;
    }

    public function getById($id){
        $conversation = $this->conversationModel->findOrFail($id);   
        return $conversation; 
    }

    public function create($request){
        $data = [
        ];
        $this->conversationModel->create($data);
    }

    public function update($request, $id){
        $conversation = $this->getById($id);
        $data = [
        ];
        $conversation->update($data);
    }

    public function delete($id){
        $this->conversationModel->destroy($id);
    }
}
