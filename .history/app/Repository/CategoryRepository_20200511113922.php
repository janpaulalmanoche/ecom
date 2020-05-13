<?php
namespace App\Repository;

use App\Category;

class CategoryRepository{

    public function __construct(Category $cat)
    {
        $this->model = $cat;   
    }

    
}