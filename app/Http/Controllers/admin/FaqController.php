<?php

namespace App\Http\Controllers\Admin;

use App\Services\FaqService;
use Illuminate\Http\Request;
use function redirect;
use function view;

class FaqController extends Controller
{
    private $faqService;

    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    public function index()
    {
        $faqs = $this->faqService->getPaginate();
        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $this->faqService->create($request);
        return Redirect(route('admin.faqs.index'));
    }

    public function edit($id)
    {
        $faq = $this->faqService->getById($id);
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $this->faqService->update($request, $id);
        return Redirect(route('admin.faqs.index'));
    }

    public function destroy($id)
    {
        $this->faqService->delete($id);
        return Redirect(route('admin.faqs.index'));
    }
}
