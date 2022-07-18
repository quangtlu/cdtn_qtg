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

    public function index(Request $request)
    {
        $faqs = $this->faqService->getPaginate();
        if($request->keyword) {
            $faqs = $this->faqService->search($request);
        }
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(StoreFaqRequest $request)
    {
        $this->faqService->create($request);
        return Redirect(route('admin.faqs.index'))->with('success', 'Thêm FAQ thành công');
    }

    public function edit($id)
    {
        $faq = $this->faqService->getById($id);
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(UpdateFaqRequest $request, $id)
    {
        $this->faqService->update($request, $id);
        return Redirect(route('admin.faqs.index'))->with('success', 'Cập nhật FAQ thành công');
    }

    public function destroy($id)
    {
        $faq = $this->faqService->delete($id);
        return response()->json(['faq' => $faq, 'message' => 'Xóa FAQ thành công']);
    }
}
