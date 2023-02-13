<?php

namespace App\Http\Controllers\Cabinet;

use App\Contracts\User\RegisterContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function __construct(private RegisterContract $registerService)
    {
    }

    public function getMe()
    {
        if (request()->user()) {
            return response()->json([
                'user' => request()->user()
            ]);
        }

        return response()->json([], Response::HTTP_UNAUTHORIZED);
    }

    public function register(RegisterRequest $request)
    {
        $data = $this->registerService->register($request->validated());

        if ($data) {
            return response()->json([], Response::HTTP_OK);
        }

        return response()->json([], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function login(LoginRequest $request)
    {
        $token = $this->registerService->login($request->validated());

        if ($token) {
            return response()->json([
                'token' => $token
            ]);
        }

        return response()->json([], Response::HTTP_UNAUTHORIZED);
    }

    public function logout()
    {
        return $this->registerService->logout();
    }
}
