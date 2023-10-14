<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mail(){
        return view('mail');
    }
    public function sendMail(Request $request){
        $name = $request->name;
        $mobile = $request->mobile;
        $address = $request->address;
        // $message = $request->message;

        $send_mail = "tanvirahmed219921@gmail.com";
        
        Mail::to($send_mail)->send(new SendMail($name, $mobile, $address));
        return "Mail Send Successfully";
    }
}