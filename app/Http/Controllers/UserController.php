<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getActiveUser(){
        return User::with('department','role')->where('status',1)->where('role_id','<>',1)->get();
    }
    public function create(Request $request){
        // return $request;
        User::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'department_id' => $request->department_id?$request->department_id:null,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password), 
            'role_id' => $request->role_id,
        ]);
    }
    public function destroy(User $user_id){
        if($user_id->appointments()->count()){
            return $user_id->update([
                'status' => 0
            ]);
        }
        User::destroy($user_id->id);
    }
    public function update(Request $request){
        $user = User::findorfail($request->id);
        $user->update($request->toArray());
        if($request->password){
            $user->update([
                'password' => bcrypt($request->password)
            ]);
        }
    }
    public function checkUsername(Request $request){
        return User::where('username',$request->username)->first();
    }
    public function checkEmail(Request $request){
        return User::where('email',$request->email)->first();
    }
}
