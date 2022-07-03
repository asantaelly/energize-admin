<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;


class HardwareController extends Controller
{
    

    public function getAccessCode(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required'],
            'status' => ['required'],
        ]);

        $transaction = Transaction::where('access_token', $validated['code'])->first();

       
            if($transaction == NULL || $transaction->status == FALSE)
            {
                return [
                    'Error' => 'Invalid access token!'
                ];
            }

            if($validated['status'] == 'active') {

                return [
                    'fuel' => $transaction->litres,
                    'type' => $transaction->fuel->name,
                    'name' => $transaction->user->name,
                ];

            } elseif($validated['status'] == 'inactive') {

                $transaction->status = FALSE;
                $transaction->save();

                return [
                    'message' => 'Updated',
                    'transaction' => $transaction,
                ];
            }
        }
        

            

}
