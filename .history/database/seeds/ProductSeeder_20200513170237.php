<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'category_id' => 2,
                'product_name' => 'low carb milk',
                'product_code' => 'SFF920',
                'brand' => 'silk brands',
                'price' => 150,
                'size' => '150 grams',
                'image' => 'public/images/backend_images/products/small/milk1.png',
                'stock' => '15',
            ],
            [
                'category_id' => 2,
                'product_name' => 'Almond milk',
                'product_code' => 'JNFJ29',
                'brand' => 'GMO compny',
                'price' => 160,
                'image' => 'public/images/backend_images/products/small/milk2.png',
                'size' => '150 grams',
                'stock' => '20',
            ]
        ]);
    }
}
