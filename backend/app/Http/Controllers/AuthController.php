<?php

namespace App\Http\Controllers;
use App\Models\MLogin;
use App\Models\MRegister;

use Illuminate\Http\Request;

class AuthController extends Controller
{
     // Registrasi pengguna baru
     public function register(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8',
         ]);
 
         $user = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
         ]);
         return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'User registered successfully'
        ], 201);
    }
    // Login pengguna
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $user = $request->user();
        $token = $user->createToken('Personal Access Token')->accessToken;

        return response()->json([
            'success' => true,
            'data' => [
                'user' => $user,
                'token' => $token,
            ],
            'message' => 'User logged in successfully'
        ]);
        }

        // Logout pengguna
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'success' => true,
            'message' => 'User logged out successfully'
        ]);
    }
}
