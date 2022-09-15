<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Faq\StoreFaqRequest;
use App\Http\Requests\Admin\Faq\UpdateFaqRequest;
use App\Services\FaqService;
use Illuminate\Http\Request;
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
        try {
            $faqs = $this->faqService->getPaginate();
            if ($request->keyword) {
                $faqs = $this->faqService->search($request);
            }
            return view('admin.faqs.index', compact('faqs'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(StoreFaqRequest $request)
    {
        try {
            $this->faqService->create($request);
            return Redirect(route('admin.faqs.index'))->with(
                'success',
                config('consts.message.success.create')
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function edit($id)
    {
        try {
            $faq = $this->faqService->getById($id);
            return view('admin.faqs.edit', compact('faq'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function update(UpdateFaqRequest $request, $id)
    {
        try {
            $this->faqService->update($request, $id);
            return Redirect(route('admin.faqs.index'))->with(
                'success',
                config('consts.message.success.udpate')
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function destroy($id)
    {
        try {
            $faq = $this->faqService->delete($id);
            return response()->json([
                'faq' => $faq, 'message' => config('consts.message.success.delete')
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }
}
