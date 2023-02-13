<?php

namespace App\Contracts\User;

interface RegisterContract
{
    public function login(array $data): ?string;

    public function register(array $data): bool;

    public function logout(): int;
}
