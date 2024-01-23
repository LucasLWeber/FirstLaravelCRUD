<?php

namespace Database\Factories;

use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'zipcode' => fake()->randomNumber(5) . "-" . fake()->randomNumber(3),
            'street' => fake()->unique()->streetName,
            'neighborhood' => fake()->unique()->lastName,
            'city' => fake()->city,
            'state' => 'RS'
        ];
    }
}
