<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        return view('/login', ['title' => 'Sign in']);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return response([
                'user' => auth()->user(),
                'token'=> auth()->user()->createToken('secret')->plainTextToken
            ],200);
        }
        return response([
            'message' => 'Invalid Credentials'
        ],400);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response(['message' => 'logout success'],200);
    }
}
