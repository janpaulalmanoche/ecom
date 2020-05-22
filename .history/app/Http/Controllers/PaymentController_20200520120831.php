<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
    public function __construct()
    {
        $this->client = new GuzzleHttp\Client();
    }

    public function make_sanbox_account(){
        
    }

}
