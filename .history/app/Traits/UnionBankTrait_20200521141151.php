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

    


    
}
