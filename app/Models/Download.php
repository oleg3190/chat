<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rorecek\Ulid\HasUlid;

class Download extends Model
{
    use HasUlid;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = [
        'id',
        'title',
        'path',
        'mime',
        'size',
        'owner'
    ];
}
