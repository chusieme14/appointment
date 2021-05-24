<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);
        if(!auth()->attempt($data)){
            return response(['error_message' => 'Incorrect credentials']);
        }
        $token = auth()->user()->createToken('API TOKEN')->accessToken;

        return response(['user' => auth()->user(), 'token' => $token]);
    }
    public function logout(Request $request){
        return $request->user();
        // auth()->user()->token()->revoke();
    }
}
