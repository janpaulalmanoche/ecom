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
                'image' => 'milk1.png',
                'stock' => '15',
            ],
            [
                'category_id' => 2,
                'product_name' => 'Almond milk',
                'product_code' => 'JNFJ29',
                'brand' => 'GMO compny',
                'price' => 160,
                'image' => 'milk2.png',
                'size' => '150 grams',
                'stock' => '20',
            ],
            // [
            //     'category_id' => 4,
            //     'product_name' => 'magnolia chicken',
            //     'product_code' => 'JN2329',
            //     'brand' => 'magnolia corp',
            //     'price' => 160,
            //     'image' => 'magnolia.png',
            //     'size' => '1.5 kg',
            //     'stock' => '200',
            // ],
            // [
            //     'category_id' => 5,
            //     'product_name' => 'cricle cut fries',
            //     'product_code' => 'ilpz2329',
            //     'brand' => 'betty house pantry',
            //     'price' => 160,
            //     'image' => 'crinkle.jpg',
            //     'size' => '500 g',
            //     'stock' => '250',
            // ],
            // [
            //     'category_id' => 5,
            //     'product_name' => 'shoe string fries',
            //     'product_code' => 'ujof122',
            //     'brand' => 'golden house',
            //     'price' => 300,
            //     'image' => 'shoestring.jpg',
            //     'size' => '1 kg',
            //     'stock' => '250',
            // ],
            // [
            //     'category_id' => 7,
            //     'product_name' => 'red horse',
            //     'product_code' => 'refs282',
            //     'brand' => 'san miguel corporation',
            //     'price' => 100,
            //     'image' => 'redhorse.png',
            //     'size' => '250 ml',
            //     'stock' => '500',
            // ],
            // [
            //     'category_id' => 7,
            //     'product_name' => 'carlo rossi',
            //     'product_code' => 'aju280f',
            //     'brand' => 'wine corp',
            //     'price' => 350,
            //     'image' => 'carlo.jpg',
            //     'size' => '550 ml',
            //     'stock' => '500',
            // ],
            // [
            //     'category_id' => 7,
            //     'product_name' => 'trevor wine',
            //     'product_code' => 'aju233s',
            //     'brand' => 'wine corp',
            //     'price' => 350,
            //     'image' => 'wine2.jpg',
            //     'size' => '550 ml',
            //     'stock' => '500',
            // ],
            // [
            //     'category_id' => 8,
            //     'product_name' => 'coke',
            //     'product_code' => 'pyth247',
            //     'brand' => 'coca cola company',
            //     'price' => 80,
            //     'image' => 'coke.png',
            //     'size' => '1.5 liter',
            //     'stock' => '500',
            // ],
            // [
            //     'category_id' => 8,
            //     'product_name' => 'coke zero',
            //     'product_code' => '23gf34f',
            //     'brand' => 'coca cola company',
            //     'price' => 40,
            //     'image' => 'cokezero.jpg',
            //     'size' => '30 oz',
            //     'stock' => '500',
            // ],
            // [
            //     'category_id' => 9,
            //     'product_name' => 'gatorade blue',
            //     'product_code' => 'gt2tdw2',
            //     'brand' => 'pepsi co',
            //     'price' => 45,
            //     'image' => 'gatorade.jpg',
            //     'size' => '30 oz',
            //     'stock' => '500',
            // ],
            // [
            //     'category_id' => 11,
            //     'product_name' => 'piatos bbq',
            //     'product_code' => 'o2jf23f',
            //     'brand' => 'jack n jill',
            //     'price' => 50,
            //     'image' => 'piatos.jpg',
            //     'size' => '50g',
            //     'stock' => '500',
            // ],
            // [
            //     'category_id' => 11,
            //     'product_name' => 'chippy blue',
            //     'product_code' => 'gdf3ngy',
            //     'brand' => 'jack n jill',
            //     'price' => 50,
            //     'image' => 'chippy.jpg',
            //     'size' => '50g',
            //     'stock' => '500',
            // ],

        ]);
    }
}
