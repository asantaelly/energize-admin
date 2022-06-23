<?php

namespace App\Http\PaymentGateway;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use phpseclib3\Crypt\PublicKeyLoader;



class VodacomMpesa {

    protected string $URL;

    protected string $sessionKey;


    public function __construct()
    {
        $this->URL = env('MPESA_API_URL');
    }



    /**
     * Get Mpesa API Session Key
     * 
     * @return $this
     * 
     */
    public function authenticate(): VodacomMpesa
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$this->encryptAPIKey(),
            'Origin' => '*',
            ])->get($this->URL.'getSession/');

        if($response->failed())
            $response->throw();

        $this->sessionKey = $response->json('output_SessionID');

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
        $validatedData = $this->validatedUSSDPushData($data);

        $response = Http::withHeaders($this->headers())
            ->post($this->URL.'c2bPayment/singleStage/', $validatedData);

        if($response->failed() || $response->clientError() || $response->serverError()){
            $response->throw();
        }

        return $response;
    }


    public function transactionStatus(string $id)
    {
        $response = Http::withHeaders($this->headers())
                        ->get($this->URL.'queryTransactionStatus/'.$id);

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
   public function validatedUSSDPushData($data) 
   {

        return [
            'input_Amount' => $data['amount'],
            'input_Country' => env('MPESA_API_COUNTRY'),
            'input_Currency' => env('MPESA_API_CURRENCY'),
            'input_CustomerMSISDN' => $data['msisdn'],
            'input_ServiceProviderCode' => $data['serviceProviderCode'],
            'input_ThirdPartyConversationID' => $data['transaction_ID'],
            'input_TransactionReference' => $data['reference'],
            'input_PurchasedItemsDesc' => $data['paymentDescription'],
            
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
            'Authorization' => 'Bearer '. $this->encryptSessionKey($this->sessionKey),
            'Origin' => '*',
        ];
    }


    public function encryptAPIKey() {

        $apiKey = env('MPESA_API_KEY');
        $publicKey = PublicKeyLoader::load(env('MPESA_API_PUBLIC_KEY'));

        if(!$publicKey)
            return "Error Loading Public Key";

        if(! openssl_public_encrypt($apiKey, $encryptedAPIKey, $publicKey))
            return "Error encrypting API key";

        return base64_encode($encryptedAPIKey);
    }


    public function encryptSessionKey(string $sessionKey) {

        $publicKey = PublicKeyLoader::load(env('MPESA_API_PUBLIC_KEY'));

        if(!$publicKey)
            return "Error Loading Public Key";

        if(! openssl_public_encrypt($sessionKey, $encryptedSessionKey, $publicKey))
            return "Error encrypting Session key";

        return base64_encode($encryptedSessionKey);
    }


}