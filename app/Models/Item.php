<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'type',
        'slot',
        'power',
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
