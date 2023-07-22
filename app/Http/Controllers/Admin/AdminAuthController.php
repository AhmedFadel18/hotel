<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;

class AdminAuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.index');
    }


    public function login_check(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where(['email' => $request->email, 'password' => sha1($request->password)])->count();
        if ($admin > 0) {
            $adminLogin = Admin::where(['email' => $request->email, 'password' => sha1($request->password)])->get();
            session(['adminLogin' => $adminLogin]);
            if ($request->has('remember')) {
                Cookie::queue('adminEmail', $request->email, 1440);
                Cookie::queue('adminPassword', $request->password, 1440);
            }


            return redirect()->route('admin.index');
        }
        return redirect()->back()->with('message', 'Your Email Or Password Not Valid!');
    }

    public function logout()
    {
        session()->forget(['adminLogin']);
        return redirect()->route('admin.login');
    }

    public function forgetPassword()
    {
        return view('auth.forget-password');
    }

    public function submitForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users'
        ]);
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        Mail::send('emails.forget-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Password Reset');

            return back()->with('message', 'We have send you the password reset link. Please check your email inbox');
        });
    }
    public function resetPassword($token)
    {
        return view('auth.reset-password', compact('token'));
    }

    public function confirmResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users',
            'password' => 'required|min:6|confirmed',
            'confirm_password' => 'required',
        ]);
        $chekToken = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token])->first();
        if (!$chekToken) {
            return back()->withInput()
                ->with('message', 'Invalid token');
        }
        $user = User::where('email', $request->email);
        $user->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where('email', $request->email)->delete();
        return redirect('login')->with('message', 'Your password have changed');
    }
}
