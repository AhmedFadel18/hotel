<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('home.contact-us');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::send('emails.customer-query', ['data'=>$data], function ($message) use ($data) {
            $message->to('hotel@gmail.com')->subject('Hotel Contact Us Query');
            $message->from($data['email']);
        });
        return redirect()->back()->with('message', 'Thanks, Your Query Sent Successfully.');
    }
}
