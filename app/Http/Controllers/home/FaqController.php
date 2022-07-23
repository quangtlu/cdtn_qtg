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
            if($request->keyword) {
                $faqs = $this->faqService->search($request);
                if (!$faqs->count()) {
                    return redirect()->back()->with('error', 'Không có FAQ nào được tìm thấy');
                }
            }
            return view('home.faq.index', compact('faqs'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.getData'));
        }
        
    }

}
