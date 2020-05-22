<?php
namespace App\Repositories;

use App\Category;

class CategoryRepository{

    public function index(){
       return  Category::with('categories')->orderBy('name','ASC')->where(['parent_id'=>0])->get();
    }


}