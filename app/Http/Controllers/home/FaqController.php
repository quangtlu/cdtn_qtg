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
        try {
            $faqs = $this->faqService->getPaginate();
            if($request->keword) {
                $faqs = $this->faqService->search($request);
            }
            if($faqs->count() < 1) {
                return redirect()->back()->with('error', 'Không FAQ nào phù hợp');
            }
            return view('home.faq.index', compact('faqs'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.getData'));
        }
        
    }

}
