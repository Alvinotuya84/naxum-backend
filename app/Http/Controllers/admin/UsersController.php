<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    use RegistersUsers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }


    public function index()
    {
        $accounts=User::where('role',null)->get();
        return view('accounts-list',compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user=null;
        return view('account-add-edit',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'full_name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'max:255','unique:users'],
            'contact_number' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function store(Request $request)
    {

        $clean=$request->validate([

                'full_name' => ['required', 'string', 'max:255'],
                'user_name' => ['required', 'string', 'max:255','unique:users'],
                'contact_number' => ['nullable', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
          User::create([
             'full_name' => $clean['full_name'],
             'user_name' => $clean['user_name'],
             'contact_number'=>$clean['contact_number'],
             'email' => $clean['email'],
             'password' => Hash::make($clean['password']),
         ]);
 session()->flash('success', 'User has been created successfully');
 return redirect()->route('home');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('account-add-edit',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user )
    {
        $clean=$request->validate([

            'full_name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'max:255'],
            'contact_number' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['required', 'string', 'min:8'],

    ]);
    $user->update([
         'full_name' => $clean['full_name'],
         'user_name' => $clean['user_name'],
         'contact_number'=>$clean['contact_number'],
         'email' => $clean['email'],
         'password' => Hash::make($clean['password']),
     ]);
session()->flash('success', 'User has been Updated successfully');
return redirect()->route('home');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    $user=User::find($id);
    $user->delete();
        return response()->json([
            'message'=>$id,
            'success'=>'Succesful Deletion'

        ]);
    }
    public function viewall(){
        $accounts = User::where('id', '!=', auth()->id())->get();
        return view('accounts-list',compact('accounts'));
    }
}
