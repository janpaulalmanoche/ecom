<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->client = new Client();
        $this->union_app_id = 'faa78f59-d055-4016-ab41-a3f812f78310';
        $this->union_app_secret = 'fQ3wA2kV1bH5lY2pS5iG7uT6vH0dS2jE8jG6kQ8nX1sE2pV0pH';
    }

    public function make_sanbox_account()
    {
     
      $response =   $this->client->request('POST',
       'https://api-uat.unionbankph.com/partners/sb/sandbox/v1/accounts', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'x-ibm-client-id' => $this->union_app_id,
                'x-ibm-client-secret' => $this->union_app_secret,
            ],
            'json' => [
                "username" => "eccomercwe",
                "password" => "password",
                "account_name" => "boxtypd account" 
            ]
        ]);
            
        $body = json_decode($response->getBody()->getContents(), true);
        // dd($body['data']['account']);
        dd($body);
    }

    public function generate_code(){
        // https://api-uat.unionbankph.com/partners/sb/customers/v1/oauth2/authorize

        $paymaya_partner_id = "01bbb51e-1e6c-4bd4-af9c-450957522aac";
        $url = sprintf('https://api-uat.unionbankph.com/partners/sb/customers/v1/oauth2/authorize?client_id=%s&response_type=%s&scope=%s&redirect_uri=%s&state=%s&type=%s&partnerId=%s',
        $this->union_app_id,"code","payments","http://127.0.0.1:8000/callback","state","single",$paymaya_partner_id);

        dd($url);
        $response =   $this->client->request('GET',$url,[
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'x-ibm-client-id' => $this->union_app_id,
                'x-ibm-client-secret' => $this->union_app_secret,
            ],
        ]);
        // dd($response);

        // dd($response);
        // $body = json_decode($response->getBody()->getContents(), true);
        // dd($body['data']['account']);
        // dd($body);

    }

    public function customer_request_online_access_token(){
        $response =   $this->client->request('GET',
        'https://api-uat.unionbankph.com/partners/sb/customers/v1/oauth2/token', [
             'headers' => [
                 'Accept' => 'application/json',
                 'Content-Type' => 'application/x-www-form-urlencoded',
             ],
             'json' => [
                 "grant_type" => "authorization_code",
                 "client_id" => $this->union_app_id,
                 "code" => "boxtypd account" 
             ]
         ]);
    }
}
