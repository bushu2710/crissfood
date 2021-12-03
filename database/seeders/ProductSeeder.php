<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::factory()->count(50)->create();

// Product::insert([
//     [
//         'name'=>'Iphone',
//         'description' => 'Iphone 13 pro max with great feaures bla bla bla',
//         'sku' => 'L2OGjy8YnFvLl36qznNd',
//         'price' => '31674.00',
//         'instock' => '10',
//         'vendor_id' => '30'
//     ]
// ])
    }
}
