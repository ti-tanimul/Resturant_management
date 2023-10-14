<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register(){
        return view('user.register');
    }
    public function userRegister(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type'=> 1,
        ]);
        return redirect()->back()->with('success', 'Insert completed successfully!');
    }
    public function login(){
        return view('user.login');
    }
    public function userlogin(Request $request){
        $userlog = [
            'email' => $request->email,
            'password' => $request->password,
            'type' => 1,
        ];

        if(Auth::attempt($userlog)){

            return redirect('/')->with('msg', 'Login Success');
        }
        return back()->with('success', 'Email or Password Not Match');
    }
    public function userLogout(){
        Auth::logout();
        Session::flush();
        return redirect('/user-login');
    }
}
