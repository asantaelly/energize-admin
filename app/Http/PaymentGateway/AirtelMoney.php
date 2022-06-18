<?php

namespace App\Http\PaymentGateway;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;



class AirtelMoney {

    public string $URL = 'https://openapiuat.airtel.africa/';

    public string $token;



    /**
     * Authorize client to access the airtel money API
     * 
     * @return $this
     * 
     */
    public function authenticate(): AirtelMoney
    {
        $response = Http::withHeaders(['Content-Type' => 'application/json'])
                    ->post($this->URL.'auth/oauth2/token', [
                        'client_id' => env('PAYMENT_CLIENT_ID'),
                        'client_secret' => env('PAYMENT_CLIENT_SECRET'),
                        'grant_type' => env('PAYMENT_GRANT_TYPE')
                    ]);

        if($response->failed())
            $response->throw();

        $this->token = $response->json('access_token');

        return $this;

    }

    
    /**
     *  USSD PUSH
     * 
     *  @param array $data
     * 
     *  @return json
     */
    public function USSDPush(array $data)
    {

        $validatedData = $this->validatedUSSDPush($data);

        $response = Http::withHeaders($this->headers())
            ->post($this->URL.'merchant/v1/payments', $validatedData);

        if($response->failed())
            $response->throw();

        return $response->json();
    }


    public function transactionStatus(string $id)
    {
        $response = Http::withHeaders($this->headers())
                        ->get($this->URL.'standard/v1/payments/'.$id);

        if($response->failed())
            $response->throw();

        return $response->json();
    }

    /**
     * 
     *  Validate USSDPUSH inputs
     * 
     *  @param array $data
     * 
     *  @return array
     * 
     */
   public function validatedUSSDPush($data) 
   {
       $validated = Validator::make($data, [
           'reference' => ['required', 'string', 'max:255'],
           'msisdn' => ['required', 'number'],
           'amount' => ['required', 'number'],
           'id' => ['required'],
       ]);

    return [
        "reference" => $validated['reference'],
        "subscriber" => [
            "country" => env('PAYMENT_COUNRY'),
            "currency" => env('PAYMENT_CURRENCY'),
            "msisdn" => $validated['msisdn']
        ],
        "transaction" => [
            "amount" => $validated['amount'],
            "country" => env('PAYMENT_COUNRY'),
            "currency" => env('PAYMENT_CURRENCY'),
            "id" => $validated['transaction_id'],
        ]
    ];
   }

   /**
     * Generate headers
     *
     * @return array
     */
    private function headers(): array
    {
        return [
            'Content-Type' => 'application/json',
            'X-Country' => env('PAYMENT_COUNTRY'),
            'X-Currency' => env('PAYMENT_CURRENCY'),
            'Authorization' => 'Bearer ' . $this->token,
        ];
    }


}