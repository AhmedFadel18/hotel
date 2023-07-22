<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CustomerBookingContoller extends Controller
{
    public function index()
    {
        return view('home.booking');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'checkin_date' => 'required',
            'checkout_date' => 'required|after_or_equal:checkin_date',
            'total_adults' => 'required',
        ]);
        $room = Room::find($request->room_id);

        $sessionData = [
            'customer_id' => Session::get('customerLogin')[0]->id,
            'room_id' => $request->room_id,
            'checkin_date' => $request->checkin_date,
            'checkout_date' => $request->checkout_date,
            'total_adults' => $request->total_adults,
            'total_children' => $request->total_children,
        ];
        session($sessionData);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'USD',
                    'product_data' => [
                        'name' => $room->title,
                    ],
                    'unit_amount' => $room->RoomType->price * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('home.booking.success') . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('home.booking.fail'),

        ]);
        return redirect($session->url);
    }

    function booking_payment_success(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));
        if ($session->payment_status == 'paid') {
            $data = new Booking;
            $data->customer_id = session('customer_id');
            $data->room_id = session('room_id');
            $data->checkin_date = session('checkin_date');
            $data->checkout_date = session('checkout_date');
            $data->total_adults = session('total_adults');
            $data->total_children = session('total_children');
            $data->save();
            return redirect()->route('home.index')->with('message', 'Your Room Booked Successfully.');
        }
    }

    function booking_payment_fail()
    {
        return redirect()->route('home.index')->with('fail', 'Your Room Booking Has Been Failed !!');
    }


    public function availableRooms($data)
    {
        $available_rooms = DB::select("SELECT * FROM rooms WHERE id NOT IN
        (SELECT room_id FROM bookings WHERE '$data' BETWEEN checkin_date AND checkout_date)");

        $data = [];
        foreach ($available_rooms as $room) {
            $roomType = RoomType::find($room->room_type_id);
            $data[] = ['room' => $room, 'roomType' => $roomType];
        }
        return response()->json(['data' => $data]);
    }
}
