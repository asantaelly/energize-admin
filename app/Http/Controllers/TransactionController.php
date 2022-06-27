<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->user()->hasRole('admin')) {
            $transactions = Transaction::all();
        } else {
            $transactions = Transaction::where('user_id', $request->user()->id)->get();
        }

        return view('manage.transaction.index', ['transactions' => $transactions]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);

        return view('manage.transaction.show', ['transaction' => $transaction]);
    }

 
}
