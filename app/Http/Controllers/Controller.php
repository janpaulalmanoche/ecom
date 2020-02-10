<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public static function mainCategories(){// we are just getting the main categories,not the subcatt, and beacause of our template it didnt have tthe hover for sub in top
        $maintCategories = Category::where(['parent_id'=>0])->get();
        return $maintCategories;
    }

}


