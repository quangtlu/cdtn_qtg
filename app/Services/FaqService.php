<?php

namespace App\Services;

use App\Models\Faq;

class FaqService

{
    private $faqModel;

    public function __construct(Faq $faqModel)
    {
        $this->faqModel = $faqModel;
    }

    public function getPaginate(){
        $owners = $this->faqModel->latest()->paginate(10);
        return $owners;
    }

    public function getAll()
    {
        $owners = $this->faqModel->all();
        return $owners;
    }

    public function getById($id){
        $owner = $this->faqModel->findOrFail($id);
        return $owner;
    }

    public function create($request){
        $data = [
            "question" => $request->question,
            "answer" => $request->answer,
        ];
        $this->faqModel->create($data);
    }

    public function update($request, $id){
        $faq = $this->getById($id);
        $data = [
            "question" => $request->question,
            "answer" => $request->answer,
        ];
        $faq->update($data);
    }

    public function delete($id){
        $this->faqModel->destroy($id);
    }
}
