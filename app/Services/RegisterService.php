<?php

namespace App\Services;

use App\Contracts\User\RegisterContract;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterService implements RegisterContract
{
    private $dispatcher;

    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function login(array $data): ?string
    {
        if (Auth::attempt($data)) {
            $token = request()->user()->createToken('auth');

            return $token->plainTextToken;
        }

        return null;
    }

    public function register(array $data): bool
    {
        $user = User::create([
            'firstname' => $data['firstname']?? null,
            'lastname' => $data['lastname']?? null,
            'phone' => $data['phone'] ?? null,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'verify_token' => Str::uuid(),
            'role' => User::ROLE_USER,
            'status' => User::STATUS_ACTIVE,
            'data' => []
        ]);

        if (!$user) {
            return false;
        }

        $this->dispatcher->dispatch(new Registered($user));

        return true;
    }

    public function logout(): int
    {
        $user = request()->user();

        if ($user) {
            if ($user->tokens) {
                $user->tokens()->delete();
            }
        }

        return request()->session()->invalidate();
    }
}
