<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ServicesController extends Controller
{
    public function index(){
        $services=Service::all();
        return view('admin.services.index',compact('services'));
    }

    public function create(){

        return view('admin.services.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'summary'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg,svg',
        ]);
        $service = new Service;
        $service->title = $request->title;
        $service->summary = $request->summary;
        $service->description = $request->description;

        if ($request->hasFile('image')){
            $image =$request->image;
            $imageName= time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/images/services/',$imageName);
            $service->image=$imageName;
        }
        $service->save();
        return redirect()->back()->with('message','The Service Added Successfully.');
    }

    public function show($id){
        $data = Service::find($id);
        return view('admin.services.show',compact('data'));
    }

    public function edit($id){
        $data=Service::find($id);
        return view('admin.services.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $service =Service::find($id);
        $service->title = $request->title;
        $service->summary = $request->summary;
        $service->description = $request->description;

        if ($request->hasFile('image')){
            $path='assets/images/services'.$service->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $image=$request->image;
            $imageName=time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/images/services/',$imageName);
            $service->image=$imageName;
        }else{
            $service->image=$request->prev_img;
        }
        $service->update();
        return redirect()->back()->with('message','The Service Updated Successfully.');
    }

    public function delete($id)
    {
        $data = Service::find($id);
        $path = 'assets/images/services/' . $data->image;
                File::delete($path);
        $data->delete();

        return redirect()->back()->with('message', 'The Service Deleted Successfully.');
    }
}
