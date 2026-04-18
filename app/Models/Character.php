<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'name',
        'level',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inventories()
        {
            return $this->hasMany(Inventory::class);
        }
}
