<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Character;
use App\Models\Item;
use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        //Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 2. Players
        $players = User::factory(3)->create([
            'role' => 'player',
        ]);

        // 3. Characters (mínimo 6)
        $characters = collect();

        foreach ($players as $player) {
            $chars = Character::factory(2)->create([
                'user_id' => $player->id,
            ]);

            $characters = $characters->merge($chars);
        }

        // 4. Items (mínimo 18)
        $items = Item::factory(18)->create();

        //5. Inventories (mínimo 20)
        foreach ($characters as $character) {
            $randomeItems = $items->random(4); //asi aseguramos +20

            foreach ($randomeItems as $item) {
                Inventory::create([
                    'character_id' => $character->id,
                    'item_id' => $item->id,
                    'quantity' => rand(1, 3),
                    'equipped' => false,
                ]);
            }
        }
    }
}
