<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ActionLog extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'logs';

    protected $fillable = [
        'action',
        'user_id',
        'character_id',
        'item_id',
        'metadata',
        'created_at',
    ];

    protected $casts = [
        'metadata' => 'array',
        'created_at' => 'datetime',
    ];
}
