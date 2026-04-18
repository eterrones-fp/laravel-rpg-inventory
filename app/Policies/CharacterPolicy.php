<?php

namespace App\Policies;

use App\Models\Character;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CharacterPolicy
{
    // Ver lista
    public function viewAny(User $user): bool
    {
        return true;
    }

    // Ver un personaje concreto
    public function view(User $user, Character $character): bool
    {
        return $user->role === 'admin' || $character->user_id === $user->id;
    }

    // Crear personaje
    public function create(User $user):bool
    {
        return true;
    }

    //Actualizar personaje
    public function update(User $user, Character $character): bool
    {
        return $user->role === 'admin' || $character->user_id === $user->id;
    }

    // Borrar personaje
    public function delete(User $user, Character $character): bool
    {
        return $user->role === 'admin' || $character->user_id === $user->id;
    }
}
