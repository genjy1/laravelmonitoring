<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sales>
 */
class SalesFactory extends Factory
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
            'dateTime'=>$this->faker->dateTime,
            'type'=>$this->faker->randomElement(['cash','cashless']),
            'test'=>$this->faker->randomElement([0,1]),
            'balance'=>$this->faker->randomDigitNotNull,
            'machine_id'=>$this->faker->randomElement(range(1,10))
        ];
    }
}
