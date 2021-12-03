<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = ['billing', 'shipping'];

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'address_line_1' => $this->faker->sentence,
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'pincode' => rand(400000,500000),
            'type' => $types[array_rand($types)],
        ];
    }
}
