<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{    
    public function user(Request $request)
    {
        return $request->user();
    }

    public function register(Request $request)
    {
        # Check request data
        $registerUserData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8|'
        ]);

        # Create user
        $user = User::create([
            'name' => $registerUserData['name'],
            'email' => $registerUserData['email'],
            'password' => Hash::make($registerUserData['password']),
        ]);

        # Log user
        $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;

        # Return response
        return response()->json([
            'message' => 'User Created',
            'user' => $user,
            'access_token' => $token,
        ]);
    }

    public function login(Request $request)
    {
        # Check request data
        $loginUserData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|min:8'
        ]);

        # Check user
        $user = User::where('email', $loginUserData['email'])->first();
        if (!$user || !Hash::check($loginUserData['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid Credentials'
            ], 401);
        }

        # Log user
        $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;
        
        # Return response
        return response()->json([
            'message' => 'Logged in', 
            'user' => $user,
            'access_token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        # Delete user tokens
        $request->user()->tokens()->delete();

        # Return response
        return response()->json([
            'message' => 'logged out'
        ]);
    }
}
