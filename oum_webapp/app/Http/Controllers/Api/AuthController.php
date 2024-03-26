<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $token = $user->createToken('MyAuthApp')->plainTextToken;

            return response()->json([
                'message' => 'Authentication successful',
                'token' => $token,
                'username' => $user->name,
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid credentials',
                'code' => 401
            ], 401);
        }
    }
}