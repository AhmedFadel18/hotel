<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::get();
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:customers',
            'password'=>'required|min:8',
            'phone'=>'required',
            'address'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg,svg',
        ]);

        $data = new Customer;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password =Hash::make($request->password) ;
        $data->phone = $request->phone;
        $data->address = $request->address;

        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('assets/images/customers/', $imageName);
        $data->image = $imageName;
        $data->save();

        return redirect()->back()->with('message', 'The Customer Added Successfully.');
    }

    public function edit($id)
    {
        $data = Customer::find($id);
        return view('admin.customers.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',
        ]);

        $data = Customer::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password =Hash::make($request->password) ;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->hasFile('image')) {
            $path = 'assets/images/customers/' . $data->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('assets/images/customers/', $imageName);
            $data->image = $imageName;

        }else{
            $data->image=$request->prev_img;
        }
            $data->update();

            return redirect()->back()->with('message', 'The Customer Updated Successfully.');
    }

    public function delete($id)
    {
        $data = Customer::find($id);
        $path = 'assets/images/customers/' . $data->image;
                File::delete($path);
        $data->delete();

        return redirect()->back()->with('message', 'The Customer Deleted Successfully.');
    }
}
