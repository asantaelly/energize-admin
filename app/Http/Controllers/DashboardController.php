<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fuel;
use App\Models\Transaction;

class DashboardController extends Controller
{
    
    /**
     * Return multiple instance to the dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $petrol = Fuel::where('name', 'petrol')->first();
        $diesel = Fuel::where('name', 'diesel')->first();

        if($request->user()->hasRole('admin')) {
            $transactions = Transaction::all();
        } else {
            $transactions = Transaction::where('user_id', $request->user()->id)->get();
        }

        return view('dashboard', [
            'petrol' => $petrol,
            'diesel' => $diesel,
            'transactions' => $transactions
        ]);
    }
}
