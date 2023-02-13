<?php

namespace App\Models;

use App\Models\Chat\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'email',
        'password',
        'role',
        'status',
        'data',
        'verify_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'verify_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'data' => 'json',
    ];

    public const GENDER_FEMALE = 'female';

    public const GENDER_MALE = 'male';

    public const GENDER_ALL = 'all';

    public const GENDERS = [
        self::GENDER_FEMALE,
        self::GENDER_MALE,
        self::GENDER_ALL
    ];
    public const STATUS_ACTIVE = 'active';

    public const ROLE_USER = 'user';

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    public function chatGroups()
    {
        return $this->hasMany(ChatGroup::class);
    }
}
