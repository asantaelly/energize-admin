<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\PaymentGateway\AirtelMoney;
use App\Http\PaymentGateway\VodacomMpesa;
use App\Models\Fuel;
use App\Models\User;
use App\Models\Transaction;
use Carbon\Carbon;




class PaymentController extends Controller
{

   
     /**
     *  Vodacom MPESA
     * 
     *  Get payment USSDPush request and process it.
     *  
     */
    public function getUSSDPush(Request $request)
    {
        $user = User::find($request->user['id']);
        $fuel = Fuel::find($request->fuel['id']);

        $validated = $request->validate([
            'phoneNumber' => ['required'],
            'amount' => ['required'],
            'fuelAmount' => ['required'],
        ]);

        $validPhoneNumber = (int) '255'.substr($validated['phoneNumber'], 1);
        $fuelAmount = round($validated['fuelAmount'], 2);

        // Generate Unique transaction ID
        // $date = Carbon::now();
        // $uniqueTransactionID =  md5(uniqid(rand(), true)).$date->format('YmdHis');
        $uniqueTransactionID =  md5(uniqid(rand(), true));


        // Generate access token
        $access_token = random_int(1000, 9999);

        // Payment Description
        $paymentDescription = (string) round($fuelAmount, 0)." Litres of ".ucfirst($fuel->name);

        $data = [
            'msisdn' =>  $validPhoneNumber,
            'amount' => $validated['amount'],
            'serviceProviderCode' => '000000',
            'transaction_ID' => $uniqueTransactionID,
            'reference' => 'T12344CA',
            'paymentDescription' => $paymentDescription,
        ];

        $response = (new VodacomMpesa)->authenticate()->USSDPush($data);

        if($response->failed() || $response->clientError() || $response->serverError()){
            $response->throw();
        }

        // store transactions details
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'fuel_id' => $fuel->id,
            'price' => $fuel->price,
            'cash_paid' => $validated['amount'],
            'litres' => $fuelAmount,
            'phone_number' =>  $validPhoneNumber,
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

    
}
