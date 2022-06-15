<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\FaqService;
use Illuminate\Http\Request;

use function view;

class FaqController extends Controller
{
    private $faqService;

    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    public function index(Request $request)
    {
        $faqs = $this->faqService->getPaginate();
        return view('home.faq.index', compact('faqs'));

        if($request) {
            $faqs = $this->faqService->search($request);
        }
    }

}
