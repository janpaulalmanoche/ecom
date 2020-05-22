<?php

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;
use Illuminate\Support\Carbon;

namespace App\Traits;
trait UnionBankTrait
{
    public function __construct()
    {
        $this->client = new Client();
        $this->union_app_id = 'faa78f59-d055-4016-ab41-a3f812f78310';
        $this->union_app_secret = 'fQ3wA2kV1bH5lY2pS5iG7uT6vH0dS2jE8jG6kQ8nX1sE2pV0pH';
        $this->redirect_url = "https://daae922f.ngrok.io/oauth2/callback";
    }

    public function make_sanbox_account()
    {
     
        // $date = date_format(Carbon::now(),'Y-m-d\TH:i:s.u\Z');
        // dd($date);
      $response =   $this->client->request('POST',
       'https://api-uat.unionbankph.com/partners/sb/sandbox/v1/accounts', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'x-ibm-client-id' => $this->union_app_id,
                'x-ibm-client-secret' => $this->union_app_secret,
            ],
            'json' => [
                "username" => "22223",
                "password" => "password",
                "account_name" => "boxtypd account" 
            ]
        ]);
            
        $body = json_decode($response->getBody()->getContents(), true);
        // dd($body['data']['account']);
        dd($body);
    }

    public function inquire_sandbox_balance(){
        $url = sprintf('https://api-uat.unionbankph.com/partners/sb/accounts/v2/balances/%s',"107197043047");

        $response =   $this->client->request('GET',
                $url  , [
             'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'x-ibm-client-id' => $this->union_app_id,
                'x-ibm-client-secret' => $this->union_app_secret,
             ],
            
         ]);

         $body = json_decode($response->getBody()->getContents(), true);
         dd($body);   
            
    }
    



}
