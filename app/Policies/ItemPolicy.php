<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Item;

class ItemPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Item $item): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function update(User $user, Item $item): bool
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, Item $item): bool
    {
        return $user->role === 'admin';
    }
}
