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
            if ($request->keyword) {
                if ($request->isAjax) {
                    $faqAjaxs = $this->faqService->search($request, $request->isAjax);
                    $html = "";
                    if ($faqAjaxs->count()) {
                        foreach ($faqAjaxs as $index => $faq) {
                            $urlShow = route('faq.show', ['id' => $faq->id]);
                            $html .= "
                                <li class='search-result-item'>
                                    <a href='$urlShow' class='limit-line-1 search-result-item__link' >
                                        $faq->question
                                    </a>
                                </li>
                            ";
                        }
                    }
                    return response()->json(['html' => $html]);
                } else {
                    $faqs = $this->faqService->search($request);
                }
            }
            return view('home.faq.index', compact('faqs'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.getData'));
        }
    }

    public function show($id)
    {
        $faq = $this->faqService->getById($id);
        return view('home.faq.show', compact('faq'));
    }
}
