<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\Character;
use App\Policies\CharacterPolicy;
use App\Models\Item;
use App\Policies\ItemPolicy;
use App\Models\Inventory;
use App\Policies\InventoryPolicy;

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
        Gate::policy(Inventory::class, InventoryPolicy::class);
    }
}
