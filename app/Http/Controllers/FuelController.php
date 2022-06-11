<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fuel;

class FuelController extends Controller
{


    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.fuel.index', [
            'fuels' => Fuel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.fuel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'unique:fuels,name', 'max:255'],
            'price' => ['required', 'numeric'],
            'total_litres' => ['numeric', 'nullable'],
            'status' => ['boolean']
        ]);

        $fuel = Fuel::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'total_litres' => $validated['total_litres'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('fuel.show', ['fuel', $fuel]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('manage.fuel.show', [
            'fuel' => Fuel::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('manage.fuel.edit', [
            'fuel' => Fuel::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $this->validateInput($request);

        $fuel = Fuel::find($id);
        $fuel->name = $validated['name'];
        $fuel->price = $validated['price'];
        $fuel->total_litres = $validated['total_litres'];
        $fuel->status = $validated['status'];
        $fuel->save();

        return redirect()->route('fuel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //  Validation Helper for Fuel Inputs
    public function validateInput($request) 
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'total_litres' => ['numeric', 'nullable'],
            'status' => ['boolean']
        ]);
    }
}
