<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TestimonialController extends Controller
{
    public function store(Request $request){
        if(Session::has('customerLogin')){
            $request->validate([
                'testimonial'=>'required'
            ]);
            $testimonial= new Testimonial;
            $testimonial->customer_id=Session::get('customerLogin')[0]->id;
            $testimonial->testimonial=$request->testimonial;
            $testimonial->save();
            return redirect()->back()->with('thanks','We Are Very Grateful For Your Opinion.');
        }else{
            return view('home.auth.login');
        }
    }
}
