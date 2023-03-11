<?php

namespace App\Http\Controllers\Api\Auth;


use App\Http\Requests\UpdateUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravolt\Avatar\Avatar;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;




class LoginController extends Controller
{
    public function login(Request $request){

        $request->validate([

            'user_name' => ['required', 'string', 'max:255'],
            'password' => ['required'],

    ]);

        $user=User::where('user_name',$request->user_name)->first();
        if(!$user){
            return response()->json([
                'message'=>"Invalid credentials",
                'success'=>false
            ],422);
        }
        if(!Hash::check($request->password,$user->password)){
            return response()->json([
                'message'=>"Invalid password",
                'success'=>false
            ],422);
        }

       $user = User::where('user_name',  $request->user_name)->firstOrFail();

       $user->tokens()->delete();

       $token = $user->createToken('auth_token')->plainTextToken;

       $avatar=new Avatar();


       return response()->json([
           'user' => $user,
           'token' => $token
       ]);
    }


    public function update(UpdateUser $request){
        $user=Auth::user();

        $clean=$request->validated();



        $user->tokens()->delete();

        $token = $user->createToken('auth_token')->plainTextToken;
    $user->update($clean);






       return response()->json([
           'user' => $user,
           'token' => $token,
           'message'=>"Your info has been updated succesfully"
       ]);
    }


    public function logout(){

        auth()->user()->tokens()->delete();
        return response()->json([
            'message'=>"Successfully logged out",
            'success'=>true
        ]);

    }
}
