<?php

namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface ChatContract
{
    public function getMessages(int $chatId): LengthAwarePaginator;

    public function getChatsForUser(): array;

    public function getChatsId(): LengthAwarePaginator;

    public function sendMessage(array $data): bool;
}
