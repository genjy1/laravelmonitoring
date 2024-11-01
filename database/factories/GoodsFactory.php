<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Goods>
 */
class GoodsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'code'=>fake()->uuid(),
            'name'=>fake()->name(),
            'remains'=>fake()->randomElement(range(1,10)),
            'machine_id'=>fake()->randomElement(range(1,10))
        ];
    }
}
