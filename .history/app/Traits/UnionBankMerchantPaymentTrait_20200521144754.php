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

    public function payment_merchant(){
      
        $response =   $this->client->request('POST',
        'https://api-uat.unionbankph.com/partners/sb/sandbox/v1/accounts', [
             'headers' => [
                 'Accept' => 'application/json',
                 'Content-Type' => 'application/json',
                 'x-ibm-client-id' => $this->union_app_id,
                 'x-ibm-client-secret' => $this->union_app_secret,
                 'Authorization' => sprintf("Bearer %s", Session::get('access_token_union'))
             ],
             'json' => [
                 "username" => "22223",
                 "password" => "password",
                 "account_name" => "boxtypd account" 
             ]
         ]);
            
         
    }

}