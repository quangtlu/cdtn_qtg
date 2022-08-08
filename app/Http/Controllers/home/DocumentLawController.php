<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\DocumentLawService;
use Illuminate\Http\Request;

use function view;

class DocumentLawController extends Controller
{
    private $documentLawService;

    public function __construct(DocumentLawService $documentLawService)
    {
        $this->documentLawService = $documentLawService;
    }

    public function index(Request $request)
    {
        try {
            $documentLaws = $this->documentLawService->getPaginate();
            if($request->keyword) {
                $documentLaws = $this->documentLawService->search($request);
                if (!$documentLaws->count()) {
                    return redirect()->back()->with('error', 'Không có văn bản pháp luật nào được tìm thấy');
                }
            }
            return view('home.documentLaws.index', compact('documentLaws'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.getData'));
        }
        
    }

}