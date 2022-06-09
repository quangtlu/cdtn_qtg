<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Faq\StoreFaqRequest;
use App\Http\Requests\Admin\Faq\UpdateFaqRequest;
use App\Services\FaqService;
use Illuminate\Http\Request;
use function redirect;
use function view;
use App\Http\Controllers\Controller;


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

    public function search(Request $request)
    {
        $faqs = $this->faqService->search($request);
        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(StoreFaqRequest $request)
    {
        $this->faqService->create($request);
        return Redirect(route('admin.faqs.index'))->with('success', 'Thêm FAQ thành công');
    }

    public function edit($id)
    {
        $faq = $this->faqService->getById($id);
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(UpdateFaqRequest $request, $id)
    {
        $this->faqService->update($request, $id);
        return Redirect(route('admin.faqs.index'))->with('success', 'Cập nhật FAQ thành công');
    }

    public function destroy($id)
    {
        $this->faqService->delete($id);
    }
}
