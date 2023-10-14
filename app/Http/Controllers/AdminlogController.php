<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminlogController extends Controller
{
    public function register(){
        return view('admin.register');
    }
    public function adminRegister(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type'=> 2,
        ]);
        return redirect()->back()->with('success', 'Insert Completed Successfully!');
    }
    public function login(){
        return view('admin.login');
    }
    public function adminlogin(Request $request){
        $adminlog = [
            'email' => $request->email,
            'password' => $request->password,
            'type' => 2,
        ];
        if(Auth::attempt($adminlog)){
            return redirect('/admin/add-about')->with('msg', 'Login Success');
        }
        return back()->with('success', 'Email or Password Not Match');
    }
}
