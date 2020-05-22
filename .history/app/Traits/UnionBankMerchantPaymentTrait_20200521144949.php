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
        $this->paymaya_id = "01bbb51e-1e6c-4bd4-af9c-450957522aac";
    }

    public function payment_merchant(){
      
        $response =   $this->client->request('POST',
        'https://api-uat.unionbankph.com/partners/sb/merchants/v4/payments/single', [
             'headers' => [
                 'Accept' => 'application/json',
                 'Content-Type' => 'application/json',
                 'x-ibm-client-id' => $this->union_app_id,
                 'x-ibm-client-secret' => $this->union_app_secret,
                 'Authorization' => sprintf("Bearer %s", Session::get('access_token_union')),
                 'x-partner-id' => $this->paymaya_id
             ],
             'json' => [
                 "username" => "22223",
                 "password" => "password",
                 "account_name" => "boxtypd account" 
             ]
         ]);
            
         
    }

}