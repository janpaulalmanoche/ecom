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
            ]
        ]);
    }
}
