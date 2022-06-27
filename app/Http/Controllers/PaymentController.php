<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\PaymentGateway\AirtelMoney;
use App\Http\PaymentGateway\VodacomMpesa;
use App\Models\Fuel;
use App\Models\User;
use App\Models\Transaction;




class PaymentController extends Controller
{

    public function processPayment(Request $request) {

        $user = User::find($request->user['user']['id']);
        $fuel = Fuel::find($request->data['fuel']['id']);


        // Generate access token
        $access_token = random_int(1111, 9999);

        // store transactions details
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'fuel_id' => $fuel->id,
            'price' => $fuel->price,
            'cash_paid' => $request->data['amount'],
            'litres' => round($request->data['fuelAmount'], 2),
            'phone_number' => $request->phoneNumber,
            'access_token' => $access_token,
            'status' => true,
        ]);

        return [
            'Message' => 'Payment was received successfully',
            'transaction' => $transaction
        ];
    }

    
    /**
     *  AIRTEL MONEY
     * 
     *  Get payment USSDPush request and process it.
     *  
     */
    public function getPayment(Request $request)
    {
        $validated = $request->validate([
            'reference' => ['required', 'string', 'max:255'],
            'msisdn' => ['required'],
            'amount' => ['required'],
        ]);

        $data = [
            'reference' => $validated['reference'],
            'msisdn' => $validated['msisdn'],
            'amount' => $validated['amount']
        ];

        // Make request to get ussd push notification
        $response = (new AirtelMoney)->authenticate()->USSDPush($data);

        return $response;

    }


     /**
     *  Vodacom MPESA
     * 
     *  Get payment USSDPush request and process it.
     *  
     */
    public function getUSSDPush(Request $request)
    {

        $validated = $request->validate([
            'msisdn' => ['required'],
            'amount' => ['required'],
            'serviceProviderCode' => ['required'],
            'transaction_ID' => ['required'],
            'reference' => ['required'],
            'paymentDescription' => ['required', 'string', 'max:255']
        ]);

        $data = [
            'msisdn' => $validated['msisdn'],
            'amount' => $validated['amount'],
            'serviceProviderCode' => $validated['serviceProviderCode'],
            'transaction_ID' => $validated['transaction_ID'],
            'reference' => $validated['reference'],
            'paymentDescription' => $validated['paymentDescription'],
        ];

        $response = (new VodacomMpesa)->authenticate()->USSDPush($data);
        
        return $response;
    }



    
}
