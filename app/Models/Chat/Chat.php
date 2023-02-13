<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Chat extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'user_id',
        'title'
    ];

    public function scopeAccessUser($query, int $chatId)
    {
        $query->where([
            'id' => $chatId,
            'user_id' => Auth::user()->id,
        ]);
    }
}
