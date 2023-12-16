<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('register');
    }
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

    }

    public function register(Request $request)
    {

        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),

        ]);

        $userDetails = new UserDetail([
            'firstName' => $request->input('firstName'),
            'lastName'  => $request->input('lastName'),
            'mobile' => $request->input('mobile'),
        ]);

        $user->userDetail()->save($userDetails);
        return response()->json(['message' => 'Registration successful', 'user' => $user], 201);

    }
}
