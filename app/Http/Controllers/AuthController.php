<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function index()
    {
        return view('home.auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = Customer::where(['email' => $request->email ,'password'=>Hash::check($request->password,'password') ])->count();
        if ($data > 0) {
            $customerLogin = Customer::where(['email' =>$request->email ,'password'=>Hash::check($request->password,'password')])->get();
            session(['customerLogin' => $customerLogin]);
            return redirect()->route('home.index');
        }
        return redirect()->back()->with('message', 'Your Email Or Password Not Valid!');
    }

    public function registeration()
    {
        return view('home.auth.register');
    }

    public function storeCustomer(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:8',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $data = new Customer;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->phone = $request->phone;
        $data->address = $request->address;
        if ($request->image) {
            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('assets/images/customers/', $imageName);
            $data->image = $imageName;
        }
        $data->save();
        session(['customerLogin'=>$data]);
        return redirect()->route('home.index')->with('message', 'The Customer Added Successfully.');
    }

    public function logout()
    {
        session()->forget(['customerLogin']);
        return redirect()->route('home.index');
    }

    public function forgetPassword()
    {
        return view('home.auth.forget-password');
    }

    public function submitForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:customers'
        ]);
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        Mail::send('emails.forget-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->from('hotel@gmail.com');

            $message->subject('Password Reset');

            return redirect()-> back()->with('message', 'We have send you the password reset link. Please check your email inbox');
        });
    }
    public function resetPassword($token)
    {
        return view('home.auth.reset-password', compact('token'));
    }

    public function confirmResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:customers',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        $checkToken = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token])->first();
        if (!$checkToken) {
            return back()->withInput()
                ->with('message', 'Invalid token');
        }
        $customer = Customer::where('email', $request->email);
        $customer->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where('email', $request->email)->delete();
        return redirect()->route('home.login')->with('message', 'Your password have changed');
    }
}
