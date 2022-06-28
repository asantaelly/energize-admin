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
        $petrol = Fuel::where('name', 'diesel')->first();
        $diesel = Fuel::where('name', 'petrol')->first();

        if($request->user()->hasRole('admin')) {
            $transactions = Transaction::orderBy('created_at', 'desc')->get();
        } else {
            $transactions = Transaction::where('user_id', $request->user()->id)->orderBy('created_at', 'desc')->get();
        }

        return view('dashboard', [
            'petrol' => $petrol,
            'diesel' => $diesel,
            'transactions' => $transactions
        ]);
    }
}
