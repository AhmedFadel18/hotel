<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){
        $roomTypes=RoomType::all();
        $services=Service::all();
        $testimonials=Testimonial::all();
        return view ('home.index',compact('roomTypes','services','testimonials'));
    }

    public function show($id){
        $roomType =RoomType::find($id);
        $testimonials=Testimonial::all();
        $services=Service::all();
        return view ('home.show',compact('roomType','testimonials','services'));
    }
}
