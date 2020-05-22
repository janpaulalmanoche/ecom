<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

use function GuzzleHttp\Psr7\build_query;

class PaymentController extends Controller
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
     
        // $date = date('datetime:Y-m-d\TH:i:s',strtotime(Carbon::now()));
        $date = date_format(Carbon::now(),'date_format:Y-m-d\TH:i:s.u\Z');
        dd($date);
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








    public function generate_code(){
        $url = sprintf('https://api-uat.unionbankph.com/partners/sb/customers/v1/oauth2/authorize?response_type=code&client_id=%s&redirect_uri=%s&scope=%s&type=%s',
                    $this->union_app_id,$this->redirect_url,"payments","single" );
     
        return redirect($url);
    }

    public function call_back_function(Request $request){
            // dd($request->code);
            $url = sprintf('/request-online-access-token/%s',$request->code);
            return redirect($url);
    }

    public function customer_request_online_access_token($code){
        $response =   $this->client->request('POST',
        'https://api-uat.unionbankph.com/partners/sb/customers/v1/oauth2/token', [
             'headers' => [
                 'Content-Type' => 'application/x-www-form-urlencoded',
             ],
              
             'form_params' => [
                "grant_type" => "authorization_code",
                 "client_id" => $this->union_app_id,
                 "code" => $code,
                 "redirect_uri" => $this->redirect_url
            ]
         ]);


         $body = json_decode($response->getBody()->getContents(), true);
        // dd($body['data']['account']);
        // dd($body['access_token']);
        Session::put('access_token_union',$body['access_token']);

        return redirect('/order-review');

    }
}
