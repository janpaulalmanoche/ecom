<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
class PaymongoController extends Controller
{
    //
    public function __construct()
    {
        $this->public_key_test = 'sk_test_MLtcfd1HuXsbKCYrgvzDvNgB';
        $this->client = new  Client();
        $this->authorization = sprintf('Basic %s',base64_encode($this->public_key_test));
    }
    public function index(){
      
        $id = Str::uuid();
        $authorization = $this->authorization;
        $res = $this->client->request('POST', 'https://api.paymongo.com/v1/payment_intents', [
            'headers' => [
                'authorization' => $authorization,
                'content-type' => 'application/json'
            ],
        
              'json' => [
                    'data' => [
                        'id' => $id,
                        'type' => 'payment_intent',
                        'attributes' => [
                            'amount' => 10000,
                            'currency' => 'PHP',
                            'description' => 'description',
                            'statement_descriptor' => 'The Barkery Shop',
                            'status' => 'awaiting_payment_method',
                            "livemode" =>  false,
                            'client_key' => $this->public_key_test,
                            'created_at' => '1586179682',
                            'updated_at' => '1586179682',
                            'last_payment_error' => null,   
                            'payment_method_allowed' => [
                                'card'
                            ],
                            'payment_method_options' => [
                                'card' =>[
                                    'request_three_d_secure' => 'any',
                                ]
                            ],
                            'metadata' =>[
                                'yet_another_metadata' => 'good metadata',
                                'reference_number' => 'X1999'
                            ]  
                        ]    
                     ]
              ]
        ]);

        dd($res,$res->getBody(),$id);
    }

    public function show($id){
        // dd($this->authorization);
        $res = $this->client->request('GET', 'https://api.paymongo.com/v1/payment_intents/'.$id, [
            'headers' => [
                'authorization' => $this->authorization,
            ],
    
        ]);
            
        dd($res,$res->getBody());
    }
}
