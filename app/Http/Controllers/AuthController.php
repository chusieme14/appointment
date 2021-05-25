<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

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
        $token = auth()->user()->createToken('ACCESS TOKEN')->accessToken;

        return response(['user' => auth()->user(), 'token' => $token]);
    }
    public function logout(Request $request){
        $request->user()->tokens()->delete();
        Cookie::queue(Cookie::forget('laravel_session'));
        return $request->user();
        // auth()->user()->token()->revoke();
    }
    public function checkuser(Request $request){
        if($request->user()) return true;
        else return false;
    }
    public function getuser(Request $request){
        return $request->user();
    }
}
