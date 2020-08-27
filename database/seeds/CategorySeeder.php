<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'parent_id' => 0,
                'name' => 'dairy',
            ],
            [
                'parent_id' => 1,
                'name' => 'milk',
            ],
            // 3
            [
                'parent_id' => 0,
                'name' => 'frozen',  
            ],
            // 4
            [
                'parent_id' => 4,
                'name' => 'chicken'
            ],
            // 5
            [
                'parent_id' => 3,
                'name' => 'fries'
            ],
            // 6
            [
                'parent_id' => 0,
                'name' => 'drinks'
            ],
            // 7
            [
                'parent_id' => 6,
                'name' => 'alcohol'
            ],
            // 8
            [
                'parent_id' => 6,
                'name' => 'soda'
            ],
            // 9
            [
                'parent_id' => 6,
                'name' => 'energy drink'
            ],
            // 10
            [
                'parent_id' => 0,
                'name' => 'snack'
            ],
            // 11
            [
                'parent_id' => 10,
                'name' => 'chips'
            ],
            // 12
            [
                'parent_id' => 10,
                'name' => 'cookies'
            ]


        ]);
    }
}
