<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Staff;
use App\Models\Department;
use App\Models\StaffSalary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::get();
        return view('admin.staff.index', compact('staff'));
    }

    public function create()
    {
        $departments = Department::get();
        return view('admin.staff.create', compact('departments'));
    }

    public function store(Request $request)
    {

        $data = new Staff;
        $data->name = $request->name;
        $data->job = $request->job;
        $data->bio = $request->bio;
        $data->salary_type = $request->salary_type;
        $data->salary_amount = $request->salary_amount;
        $data->birth_date = $request->birth_date;
        $data->hiring_date = $request->hiring_date;
        $data->department_id = $request->department_id;

        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('assets/images/staff/', $imageName);
        $data->image = $imageName;
        $data->save();

        return redirect()->back()->with('message', 'The Staff Added Successfully.');
    }

    public function edit($id)
    {
        $data = Staff::find($id);
        $departments = Department::get();
        return view('admin.staff.edit', compact('data', 'departments'));
    }

    public function show($id){
        $data=Staff::where('id',$id)->first();
        $age = Carbon::parse($data->birth_date)->age;
        return view('admin.staff.show',compact('data','age'));
    }

    public function update(Request $request, $id)
    {

        $data = Staff::find($id);
        $data->name = $request->name;
        $data->job = $request->job;
        $data->bio = $request->bio;
        $data->salary_type = $request->salary_type;
        $data->salary_amount = $request->salary_amount;
        $data->birth_date = $request->birth_date;
        $data->hiring_date = $request->hiring_date;
        $data->department_id = $request->department_id;

        if ($request->hasFile('image')) {
            $path = 'assets/images/staff/' . $data->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('assets/images/staff/', $imageName);
            $data->image = $imageName;
        } else {
            $data->image = $request->prev_img;
        }
        $data->update();

        return redirect()->back()->with('message', 'The Staff Updated Successfully.');
    }

    public function delete($id)
    {
        $data = Staff::find($id);
        $path = 'assets/images/staff/' . $data->image;
        File::delete($path);
        $data->delete();

        return redirect()->back()->with('message', 'The Staff Deleted Successfully.');
    }

    public function allPayments($id){
        $data=StaffSalary::where('staff_id',$id)->get();
        $staff=Staff::find($id);
        return view('admin.staff.all-payments',compact('data','staff'));

    }

    public function createPayment($id)
    {
        return view('admin.staff.salary-create', compact('id'));
    }

    public function storePayment(Request $request, $id)
    {
        $data = new StaffSalary;
        $data->salary_amount = $request->salary_amount;
        $data->payment_date = $request->payment_date;
        $data->staff_id = $id;
        $data->save();

        return redirect()->back()->with('message', 'The Staff Salary Payment Created Successfully.');
    }
}
