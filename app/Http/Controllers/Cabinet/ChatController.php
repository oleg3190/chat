<?php

namespace App\Http\Controllers\Cabinet;

use App\Contracts\ChatContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ChatController extends Controller
{
    public function __construct(private ChatContract $chatService)
    {
    }
    public function index()
    {
        $data = $this->chatService->getChatsForUser();

        if (count($data)) {
            return response()->json($data, Response::HTTP_OK);
        }

        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    public function getChatsId()
    {
        $data = $this->chatService->getChatsId();

        if ($data->count()) {
            return response()->json($data, Response::HTTP_OK);
        }

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
