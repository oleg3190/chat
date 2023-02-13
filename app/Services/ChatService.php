<?php

namespace App\Services;

use App\Contracts\ChatContract;
use App\Events\PrivateMessage;
use App\Models\Chat\{
    Chat,
    ChatGroup,
    Message
};
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\{
    Auth,
    DB,
    Log
};

class ChatService implements ChatContract
{
    public function getMessages(int $chatId): LengthAwarePaginator
    {
        return Message::whereChatId($chatId)->latest()->orderBy('created_at', 'asc')->paginate(5);
    }

    public function getChatsForUser(): array
    {
        $chats = Chat::select(
            'chats.id',
        )
            ->join((new ChatGroup())->getTable() . ' as chat_groups', function ($query) {
                return $query->on('chat_groups.chat_id', '=', 'chats.id')
                    ->where('chat_groups.user_id', Auth::user()->id);
            })
            ->paginate(20);

        $chatIds = $chats->pluck('id');

        $chatGrouped = null;

        if (!count($chatIds)) {
            return [];
        }

        $chatGrouped = ChatGroup::select(
            'chat_groups.*',
            'chats.type',
            'chats.title',
            'users.email',
            'users.firstname',
            'users.lastname',
        )
            ->join((new Chat())->getTable() . ' as chats', 'chats.id', '=', 'chat_groups.chat_id')
            ->whereIn('chat_groups.chat_id', $chatIds)
            ->join((new User())->getTable() . ' as users', 'users.id', '=', 'chat_groups.user_id')
            ->where('users.id', '!=', Auth::user()->id)
            ->get()
            ->groupBy('chat_id');

        return [
            'chats' => $chats,
            'chatGrouped' => $chatGrouped
        ];
    }

    public function getChatsId(): LengthAwarePaginator
    {
        return Chat::select(
            'chats.id',
        )->whereUserId(Auth::user()->id)->paginate(100);
    }

    public function sendMessage(array $data): bool
    {
        $chatId = $data['chat_id'] ?? null;
        $user = Auth::user();

        try {
            DB::beginTransaction();

            if (!$chatId) {
                $chat = $this->getPrivateChat($data['user_id']);

                if ($chat === null) {
                    $chat = $user->chats->create();

                    Chat::create([
                        'user_id' => $data['user_id']
                    ]);
                }
                $chatId = $chat->id;
            }

            $ownChatGroup = ChatGroup::whereChatId($chatId)->whereUserId($user->id)->first();

            if (!$ownChatGroup) {
                $user->chatGroups()->create([
                    'chat_id' => $chatId
                ]);
            }

            $message = $user->messages()->create([
                'chat_id' => $chatId,
                'text' => $data['text']
            ]);

            PrivateMessage::dispatch([
                'body' => [
                    'id' => $message->id,
                    'text' => $message->text,
                    'user_id' => $user->id,
                    'chat_id' => $chatId,
                    'created_at' => Carbon::createFromTimestamp($message->created_at)->format('Y-m-d H:i'),
                ],
                'action' => 'create',
            ]);

            DB::commit();
        } catch (\Exception $e) {
            Log::error(
                sprintf(
                    'UserId: %u, - %s',
                    $user->id,
                    $e->getMessage()
                )
            );
            DB::rollBack();
            return false;
        }

        return true;
    }
    private function getPrivateChat(int $userId): Chat
    {
        $chatGroup = (new ChatGroup())->getTable();

        return Chat::select('chats.*')
            ->join($chatGroup . ' as members', function ($query) use ($userId) {
                return $query->on('members.chat_id', '=', 'chats.id')
                    ->where('members.user_id', $userId);
            })->join($chatGroup . ' as own_group', function ($query) {
                return $query->on('own_group.chat_id', '=', 'chats.id')
                    ->where('own_group.user_id', Auth::user()->id);
            })->where([
                'chats.type' => 'private',
                'members.chat_id' => DB::raw('own_group.chat_id'),
            ])->first();
    }
}
