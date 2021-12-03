<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'sku' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'price' => rand(100, 40000),
            'vendor_id' => User::inRandomOrder()->where('is_vendor', true)->first()->id,
            'instock' => rand(1,10),
            
        ];
    }
}
