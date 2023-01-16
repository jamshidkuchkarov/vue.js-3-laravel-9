<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){

    }
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
             'name'=>'required | string | max:255',
             'email'=>'required | string| email | max:255,unique:users',
             'password'=>'required|between:8,225|confirmed',
        ]);
        if($validator->fails()){
            return response(['error'=>$validator->errors()->all()],422);
        }
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        if(!$user){
            return response()->json(['success'=>false,'message'=>"Registration failed"],500);
        }
        return response()->json(['success'=>true,'message'=>"Registration successfuly!"],500);
    }
}
