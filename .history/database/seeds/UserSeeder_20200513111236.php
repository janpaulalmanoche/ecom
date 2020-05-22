<?php

use Illuminate\Database\Seeder;

use App\Admin;
use App\Type;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        // $new = new Admin;
        // $new->username = 'admin';
        // $new->password = '827ccb0eea8a706c4c34a16891f84e7b';
        // $new->status = '1';
        // $new->save();

        $type = Type::where('type','admin')->first();

        User::insert([
            [
             'f_name' => 'jan',
             'm_name' => 'paul',   
             'l_name' => 'almanoche',   
             'email' =>  'admin@gmail.com',   
             'password' =>  Hash::make('12345'),   
             'type_id' =>  $type->id,   
            ]
        ]);
    }
}
