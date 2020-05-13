<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::insert([
            ['type' => 'admin'],
            ['type' => 'customer'],
            ['type' => 'reseller'],
        ]);
    }
}
