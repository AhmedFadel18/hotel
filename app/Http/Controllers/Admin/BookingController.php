<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\RoomType;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::get();
        return view('admin.booking.index', compact('bookings'));
    }

    public function create()
    {
        $customers = Customer::get();
        return view('admin.booking.create', compact('customers'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'customer_id' => 'required',
        //     'room_id' => 'required',
        //     'checkin_date' => 'required',
        //     'checkout_date' => 'required|after_or_equal:checkin_date',
        //     'total_adults' => 'required',
        // ]);
        // $data = new Booking;
        // $data->customer_id = $request->customer_id;
        // $data->room_id = $request->room_id;
        // $data->checkin_date = $request->checkin_date;
        // $data->checkout_date = $request->checkout_date;
        // $data->total_adults = $request->total_adults;
        // $data->total_children = $request->total_children;

        // $data->save();
        // return redirect()->route('home.bookings.payments.create',$data->id);
        // ->with('message', 'The Room Has Been Booked Successfully.')
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'USD',
                    'product_data' => [
                        'name' => 'some_name',
                    ],
                    'unit_amount' => 2000000,
                ],
                'quantity' => 1,
            ]],
            'mode'=>'payment',
            'success_url' => route('admin.booking.success'),
            'cancel_url' => route('admin.booking.fail'),

        ]);
        return redirect($session->url);
    }

    function booking_payment_success(Request $request){
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        dd($request->get('session_id'));
        $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));
        $customer = \Stripe\Customer::retrieve($session->customer);
        if($session->payment_status=='paid'){
            echo 'success';
            // dd(session('customer_id'));
            // $data=new Booking;
            // $data->customer_id=session('customer_id');
            // $data->room_id=session('room_id');
            // $data->checkin_date=session('checkin_date');
            // $data->checkout_date=session('checkout_date');
            // $data->total_adults=session('total_adults');
            // $data->total_children=session('total_children');

            // $data->save();
            // return view('booking.success');
        }
    }

    function booking_payment_fail(Request $request){
        echo 'Fail';
        // return view('booking.failure');
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
