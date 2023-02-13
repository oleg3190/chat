<?php

namespace App\Http\Controllers\Cabinet;

use App\Contracts\ChatContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\CreateMessageRequest;
use Illuminate\Http\Response;

class MessageController extends Controller
{
    public function __construct(private ChatContract $chatService)
    {
    }

    public function index(int $chatId)
    {
        $data = $this->chatService->getMessages($chatId);

        if ($data->count()) {
            return response()->json($data, Response::HTTP_OK);
        }

        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    public function store(CreateMessageRequest $request)
    {
        $data = $this->chatService->sendMessage($request->validated());

        if ($data) {
            return response()->json([], Response::HTTP_OK);
        }

        return response()->json([], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
