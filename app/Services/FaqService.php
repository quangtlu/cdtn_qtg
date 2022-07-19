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
        $faqs = $this->faqModel->latest()->paginate(10);
        return $faqs;
    }

    public function search($request)
    {
        $faqs = Faq::search($request->keyword)->latest()->paginate(10);
        return $faqs;
    }

    public function getAll()
    {
        $faqs = $this->faqModel->all();
        return $faqs;
    }

    public function getById($id){
        $faq = $this->faqModel->findOrFail($id);
        return $faq;
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
