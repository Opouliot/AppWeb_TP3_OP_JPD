<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            if(auth()->user()->role->name == 'admin') {
                $plainToken = auth()->user()->createToken('authToken', ['admin', 'user'])->plainTextToken;
            } else {
                $plainToken = auth()->user()->createToken('authToken', ['user'])->plainTextToken;
            }
            return response()->json([
                'access_token' => $plainToken,
                'token_type' => 'Bearer',
                'user' => auth()->user()
            ]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function logout(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            auth()->user()->tokens()->delete();
            auth()->logout();
            return response()->json(['message' => 'Successfully logged out']);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
