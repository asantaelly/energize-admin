<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fuel;


class DashboardController extends Controller
{
    
    /**
     * Return multiple instance to the dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {

        $petrol = Fuel::where('name', 'petrol')->first();
        $diesel = Fuel::where('name', 'diesel')->first();

        return view('dashboard', [
            'petrol' => $petrol,
            'diesel' => $diesel,
        ]);
    }
}
