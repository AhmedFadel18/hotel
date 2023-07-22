<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::get();
        return view('admin.departments.index', compact('departments'));
    }

    public function create(){
        return view('admin.departments.create');

    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'details'=>'required',
        ]);

        $data=new Department;
        $data->title=$request->title;
        $data->details=$request->details;
        $data->save();

        return redirect()->back()->with('message','The Department Added Successfully.');
    }

    public function edit($id){
        $data=Department::find($id);
        return view('admin.departments.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'title'=>'required',
            'details'=>'required',
        ]);

        $data=Department::find($id);
        $data->title=$request->title;
        $data->details=$request->details;
        $data->update();

        return redirect()->back()->with('message','The Department Updated Successfully.');
    }

    public function delete($id){
        $data=Department::find($id);
        $data->delete();

        return redirect()->back()->with('message','The Department Deleted Successfully.');
    }
}
