<?php

namespace App\Http\Controllers\Auth\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class UserController extends Controller
{


    public function register(Request $request) 
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
        
    }

    public function login(Request $request) 
    {

        $validated = $request->validate([
            'email' => ['required', 'string', 'email:rfc,dns'],
            'password' => ['required', 'string', 'min:8']
        ]);

        // Check email
        $user = User::where('email', $validated['email'])->first();

        // Check password
        if(!$user || !Hash::check($validated['password'], $user->password)) {
            return response(['errors' => ["message" => ["Email address or Password is invalid!"]]], 422);
        }

        $token = $user->createToken('APP_TOKEN')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

    }

    public function logout(Request $request) 
    {

        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
        
    }
}