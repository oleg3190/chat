<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageStatus extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'message_id',
        'user_id',
        'status'
    ];
}
