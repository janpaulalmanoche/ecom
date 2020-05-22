<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

trait UnionBankMerchantPaymentTrait
{

    // public function __construct()
    // {
    //     $this->client = new Client();
    //     $this->union_app_id = env('UNION_ID');
    //     $this->union_app_secret = env('UNION_SECRET');
    //     $this->redirect_url = env('REDIRECT_URL');
    //     $this->paymaya_id = "01bbb51e-1e6c-4bd4-af9c-450957522aac";
    //     $this->access_token = Session::get('access_token_union');
    // }

    public function payment_merchant($amount, $refference_number_order)
    {

            $refference_unique_id = Str::uuid();
            $date = date_format(Carbon::now(), 'Y-m-d\TH:i:s.U\Z');
            dd($date);
          
            $response =   $this->client->request(
                'POST',
                'https://api-uat.unionbankph.com/partners/sb/merchants/v4/payments/single',
                [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                        'x-ibm-client-id' => $this->union_app_id,
                        'x-ibm-client-secret' => $this->union_app_secret,
                        'Authorization' => sprintf("Bearer %s", Session::get('access_token_union')),
                        'x-partner-id' => $this->paymaya_id
                    ],
                    'json' => [
                        "senderRefId" => "123232",
                        "tranRequestDate" => $date,
                        "amount" => [
                            'currency' => "PHP",
                            "amount" => $amount
                        ],
                        "remarks" => "Payment remarks",
                        "particulars" => "Payment particulars",
                        "info" => [
                            [
                                "index" => auth()->user()->id,
                                "first_name" => auth()->user()->f_name,
                                "middle_name" => auth()->user()->m_name,
                                "refference_number_order" => $refference_number_order,
                            ]
                        ]
                    ]
                ]
            );

            //ending tag response 


            $body = json_decode($response->getBody()->getContents(), true);
          
    }
}
