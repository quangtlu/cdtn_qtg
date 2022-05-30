<?php

namespace App\Http\Controllers\Admin;

use App\Services\OwnerService;
use Illuminate\Http\Request;
use function redirect;
use function view;

class OwnerController extends Controller
{
    private $ownerService;

    public function __construct(OwnerService $ownerService)
    {
        $this->ownerService = $ownerService;
    }

    public function index()
    {
        $owners = $this->ownerService->getPaginate();
        return view('faq.owners.index', compact('owners'));
    }

    public function create()
    {
        return view('admin.owners.create');
    }

    public function store(Request $request)
    {
        $this->ownerService->create($request);
        return Redirect(route('admin.owners.index'));
    }

    public function edit($id)
    {
        $owner = $this->ownerService->getById($id);
        return view('admin.owners.edit', compact('owner'));
    }

    public function update(Request $request, $id)
    {
        $this->ownerService->update($request, $id);
        return Redirect(route('admin.owners.index'));
    }

    public function destroy($id)
    {
        $this->ownerService->delete($id);
        return Redirect(route('admin.owners.index'));
    }
}
