<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){
        $roomTypes=RoomType::all();
        return view ('home.index',compact('roomTypes'));
    }

    public function show($id){
        $roomType =RoomType::find($id);
        return view ('home.show',compact('roomType'));
    }
}
