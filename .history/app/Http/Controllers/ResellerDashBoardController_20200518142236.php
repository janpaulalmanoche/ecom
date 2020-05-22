<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResellerDashBoardController extends Controller
{
    public function index(){
       
        return view('reseller.dashboard');  
      }

      public function new_orders(){
          
      }
}
