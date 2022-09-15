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
                if($request->isAjax) {
                    $documentsAjax = $this->documentLawService->search($request, $request->isAjax);
                    $html = "";
                    if($documentsAjax->count()) {
                        foreach ($documentsAjax as $document) {
                            $url = route('documentLaws.show', ['id' => $document->id]);
                            $html .= "
                                <li class='search-result-item'>
                                    <a href='$url' class='limit-line-1 search-result-item__link' >
                                        $document->title
                                    </a>
                                </li>
                            ";
                        }
                    }
                    return response()->json(['html' => $html]);
                 } else {
                    $documentLaws = $this->documentLawService->search($request);
                 }
            }
            return view('home.documentLaws.index', compact('documentLaws'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.getData'));
        }

    }

    public function show($id)
    {
        try {
            $documentLaw = $this->documentLawService->getById($id);
            return view('home.documentLaws.show', compact('documentLaw'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }

    }

}
