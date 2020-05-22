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

        ]);
    }
}
