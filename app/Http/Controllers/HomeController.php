<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){
        $roomTypes=RoomType::all();
        $services=Service::all();
        return view ('home.index',compact('roomTypes','services'));
    }

    public function show($id){
        $roomType =RoomType::find($id);
        return view ('home.show',compact('roomType'));
    }
}
