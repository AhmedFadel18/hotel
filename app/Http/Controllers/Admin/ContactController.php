<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view ('home.contact-us');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);

        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ];

        Mail::send('mail', $data, function ($message) {
            $message->to('afadel.dev18@gmail.com', 'Fadel')->subject('Hotel Contact Us Query');
            $message->from('hotel@gmail.com' , 'Hotel');
        });
        return redirect()->back()->with('message','Thanks, Your Query Sent Successfully.');
    }
}
