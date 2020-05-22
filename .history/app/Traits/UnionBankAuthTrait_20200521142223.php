<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UnionBankAuthTrait{

    public function __construct()
    {
        $this->client = new Client();
        $this->union_app_id = env('UNION_ID');
        $this->union_app_secret = env('UNION_SECRET');
        $this->redirect_url = env('REDIRECT_URL');
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