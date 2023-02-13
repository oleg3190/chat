<?php

use App\Models\Chat\Chat;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('room.{chat_id}', function ($user, $chat_id) {
    $chat = Chat::accessUser($chat_id)->first();
    return $chat !== null;
});
