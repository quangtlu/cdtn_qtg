<?php

namespace App\Http\Controllers\admin;

use App\Services\ConversationService;
use Illuminate\Http\Request;
use function redirect;
use function view;

class ConversationController extends Controller
{
    private $conversationService;

    public function __construct(ConversationService $conversationService)
    {
        $this->conversationService = $conversationService;
    }

    public function index()
    {
        $conversations = $this->conversationService->getPaginate();
        return view('admin.conversations.index', compact('conversations'));
    }

    public function create()
    {
        return view('admin.conversations.create');
    }

    public function store(Request $request)
    {
        $this->conversationService->create($request);
        return Redirect(route('admin.conversations.index'));
    }

    // public function show(Conversation $conversation)
    // {

    // }

    public function edit($id)
    {
        $conversation = $this->conversationService->getById($id);
        return view('admin.conversations.edit', compact('conversation'));
    }

    public function update(Request $request, $id)
    {
        $this->conversationService->update($request, $id);
        return Redirect(route('admin.conversations.index'));
    }

    public function destroy($id)
    {
        $this->conversationService->delete($id);
        return Redirect(route('admin.conversations.index'));
    }
}
