<?php

namespace App\Contracts\User;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

interface UserContract
{
    public function getUsers(Request $request): LengthAwarePaginator;

    public function update(array $data);
}
