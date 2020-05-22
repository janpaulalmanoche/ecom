<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\URL;

use function GuzzleHttp\Psr7\build_query;

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
        $url = sprintf('https://api-uat.unionbankph.com/partners/sb/customers/v1/oauth2/authorize?response_type=code&client_id=%s&redirect_uri=%s&scope=%s&type=%s',
                    $this->union_app_id,"https://daae922f.ngrok.io/oauth2/callback","payments","single" );
     
        return redirect($url);
    }

    public function call_back_function(Request $request){
            // dd($request->code);

            return redirect('request-online-access-token/'.$request->code);
    }

    public function customer_request_online_access_token($code){
        $response =   $this->client->request('GET',
        'https://api-uat.unionbankph.com/partners/sb/customers/v1/oauth2/token', [
             'headers' => [
                 'Accept' => 'application/json',
                 'Content-Type' => 'application/x-www-form-urlencoded',
             ],
             'json' => [
                 "grant_type" => "authorization_code",
                 "client_id" => $this->union_app_id,
                 "code" => $code,
                 "redirect_uri" => "https://daae922f.ngrok.io/oauth2/callback"
             ]
         ]);


         $body = json_decode($response->getBody()->getContents(), true);
        // dd($body['data']['account']);
        dd($body);
    }
}
