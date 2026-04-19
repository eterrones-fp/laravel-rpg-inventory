<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\Character;
use App\Policies\CharacterPolicy;
use App\Models\Item;
use App\Policies\ItemPolicy;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::policy(Character::class, CharacterPolicy::class);
        Gate::policy(Item::class, ItemPolicy::class);
    }
}
