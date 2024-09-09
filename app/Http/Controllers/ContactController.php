<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('frontend.contact.index');
    }
    public function send_mail(Request $request){
        // return $request->all();
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone_number'=>'required',
            'message'=>'required',
        ]);
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'message'=>$request->message
        ];
        Mail::to('hikmatullah.ibrat2018@gmail.com')->send(new ContactMail($data));

        return redirect()->back();
    }
}
