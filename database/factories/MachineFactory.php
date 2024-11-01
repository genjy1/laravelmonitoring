<?php

namespace Database\Factories;

use App\Http\Controllers\UserController;
use App\Models\Machine;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Machine>
 */
class MachineFactory extends Factory
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
            'status'=>fake()->randomElement(['Online','Offline']),
            'number'=>fake()->numerify('#####'),
            'imei'=>fake()->imei(),
            'name'=>fake()->word(),
            'address'=>fake()->address(),
            'balance'=>fake()->randomDigitNotZero(),
            'condition'=>fake()->word(),
            'errors'=>fake()->word(),
            'subscription_until'=>fake()->dateTime(),
            'software_version'=>fake()->semver(),
            'controller_id'=>fake()->uuid(),
            'user_id'=>fake()->randomElement(range(1,10))
        ];
    }
}
