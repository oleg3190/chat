<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'chat_id',
        'user_id',
        'text'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i'
    ];

    public function author()
    {
        return $this->hasOne(User::class);
    }
}
