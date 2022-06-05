<?php

namespace App\Http\Controllers\Home;

use App\Services\FaqService;
use function view;
use App\Models\Post;
use Illuminate\Support\Facades\Session;
class FaqController
{
    private $faqService;

    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    public function index()
    {
        $faqs = $this->faqService->getPaginate();
        return view('home.faq.index', compact('faqs'));
    }

}
