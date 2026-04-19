<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Inventory;

class InventoryPolicy
{
    public function view(User $user, Inventory $inventory): bool
    {
        return $user->role === 'admin' || $inventory->character->user_id === $user->id;
    }

    public function update(User $user, Inventory $inventory): bool
    {
        return $user->role === 'admin' || $inventory->character->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return true;
    }
}
