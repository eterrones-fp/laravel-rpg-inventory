<?php

namespace Database\Factories;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'caracter_id' => \App\Models\Character::factory(),
            'item_id' => \App\Models\Item::factory(),
            'quantity' => $this->faker->numberBetween(1, 5),
            'equipped' => $this->faker->boolean(30),
        ];
    }
}
