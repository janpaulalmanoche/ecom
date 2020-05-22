<?php

namespace App\Traits;
use GuzzleHttp\Client;
use Session;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

trait UnionBankAuthTrait
{
    use UnionBankMerchantPaymentTrait;

    public function __construct()
    {
        $this->client = new Client();
        $this->union_app_id = env('UNION_ID');
        $this->union_app_secret = env('UNION_SECRET');
        $this->redirect_url = env('REDIRECT_URL');
    }
   
    //generate a code that will be later used to request an access token
    public function generate_code()
    {
        $url = sprintf('https://api-uat.unionbankph.com/partners/sb/customers/v1/oauth2/authorize?response_type=code&client_id=%s&redirect_uri=%s&scope=%s&type=%s',
            $this->union_app_id,
            $this->redirect_url,
            "payments",
            "single"
        );

        return redirect($url);
    }

    //if generate code success this function 
    public function call_back_function(Request $request)
    {
        // dd($request->code);
        $url = sprintf('/request-online-access-token/%s', $request->code);
        return redirect($url);
    }


    //then this will receive the code from the call back function and 
    //goes back to union layer and request an online token
    public function customer_request_online_access_token($code)
    {
        $response =   $this->client->request(
            'POST',
            'https://api-uat.unionbankph.com/partners/sb/customers/v1/oauth2/token',
            [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],

                'form_params' => [
                    "grant_type" => "authorization_code",
                    "client_id" => $this->union_app_id,
                    "code" => $code,
                    "redirect_uri" => $this->redirect_url
                ]
            ]
        );


        $body = json_decode($response->getBody()->getContents(), true);
        // dd($body['data']['account']);
        // dd($body['access_token']);
        Session::put('access_token_union', $body['access_token']);

        return redirect('/order-review');
    }
}
