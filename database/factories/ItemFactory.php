<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['weapon', 'armor', 'consumable'];

        $type = $this->faker->randomElement($types);

        $slot = null;

        if ($type === 'weapon') {
            $slot = 'weapon';
        } elseif ($type === 'armor') {
            $slot = $this->faker->randomElement(['head', 'body']);
        }

        return [
            'name' => $this->faker->word(),
            'type' => $type,
            'slot' => $slot,
            'power' => $this->faker->numberBetween(1, 100),
        ];
    }
}
