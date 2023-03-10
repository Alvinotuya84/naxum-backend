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
        if (!Auth::attempt($request->only('email', 'password')))

        return response()->json([
           'message' => 'Invalid login details',
           401
        ]);

       $user = User::where('email',  $request->email)->firstOrFail();

       auth()->user()->tokens()->delete();

       $token = $user->createToken('auth_token')->plainTextToken;

       $avatar=new Avatar();


       return response()->json([
           'user' => $user,
           'profile_picture'=> $avatar->create($user->full_name)->toBase64(),
           'token' => $token
       ]);
    }


    public function update(UpdateUser $request, User $user){


        $clean=$request->validated();

        if(!Hash::check($request->old_password,$user->password)){
            return response()->json([
                'message'=>"Invalid password",
                'success'=>false
            ],422);
        }

        $user->tokens()->delete();

        $token = $user->createToken('auth_token')->plainTextToken;
    $user->update([
        'full_name' => $clean['full_name'],
        'user_name' => $clean['user_name'],
        'contact_number'=>$clean['contact_number'],
        'email' => $clean['email'],
        'password' => Hash::make($clean['new_password']),
    ]);




       $avatar=new Avatar();


       return response()->json([
           'user' => $user,
           'profile_picture'=> $avatar->create($user->full_name)->toBase64(),
           'token' => $token,
           'message'=>"Your info has been updated succesfully"
       ]);
    }
}
