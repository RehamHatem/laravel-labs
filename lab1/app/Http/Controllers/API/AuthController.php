<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
     // Register
    public function register(Request $request)
    {
        $validate=$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            
        ]);

        $user = User::create($validate);

        // $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'message'=>'User registered successfully',
            'data' => $user,
            // 'token'=> $token
        ], 201);
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
           return response()->json(['message'=>'The provided credentials are incorrect.'], 401);
        }

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            "message"=>"User logged in successfully",
            'data'=>$user,
            'token'=>$token
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message'=>'Logged out successfully'], 200);
    }
}
