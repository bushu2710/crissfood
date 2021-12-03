<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'image' => 'https://source.unsplash.com/random',
            'size' => ''.rand(1, 300).'X'.rand(1, 300),
            'weight' => rand(100, 10000),       // in gms
            'warranty' => rand(1, 4),
        ];
    }
}
