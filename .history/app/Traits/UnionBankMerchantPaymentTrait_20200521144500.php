<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Session;
use Illuminate\Support\Carbon;


trait UnionBankMerchantPaymentTrait{
    public function __construct()
    {
        $this->client = new Client();
        $this->union_app_id = env('UNION_ID');
        $this->union_app_secret = env('UNION_SECRET');
        $this->redirect_url = env('REDIRECT_URL');
    }
    

}