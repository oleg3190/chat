<?php

namespace App\Http\Controllers\Cabinet;

use App\Contracts\User\UserContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\SearchUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct(private UserContract $userService)
    {
    }

    public function index(SearchUserRequest $request)
    {
        $data = $this->userService->getUsers($request);

        return response()->json($data, Response::HTTP_OK);
    }

    public function update(UpdateUserRequest $request)
    {
        $user = $this->userService->update($request->validated());

        return response()->json($user, Response::HTTP_OK);
    }

    public function show(Request $request)
    {
        return response()->json($request->user(), Response::HTTP_OK);
    }
}
