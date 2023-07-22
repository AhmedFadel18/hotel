<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Staff;

class AdminController extends Controller
{
    public function index(){
        $total_bookings=Booking::count();
        $total_rooms=Room::count();
        $total_customers=Customer::count();
        $total_staff=Staff::count();
        $bookings=Booking::selectRaw('count(id) as total_bookings , checkin_date')->groupBy('checkin_date')->get();
        $labels=[];
        $data=[];
        foreach($bookings as $booking){
            $labels[]=$booking['checkin_date'];
            $data[]=$booking['total_bookings'];
        }

        return view('admin.index',compact('total_bookings','total_rooms','total_customers','total_staff','labels','data'));
    }
}
