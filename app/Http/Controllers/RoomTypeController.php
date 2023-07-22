<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use App\Models\RoomTypeImage;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index()
    {
        $room_types = RoomType::get();
        return view('admin.room-type.index', compact('room_types'));
    }

    public function create(){
        return view('admin.room-type.create');

    }

    public function store(Request $request){
        $data=new RoomType;
        $data->title=$request->title;
        $data->details=$request->details;
        $data->save();

        return redirect()->back()->with('message','The Room Type Added Successfully.');
    }

    public function show($id){
        $room_type=RoomType::where('id',$id)->first();

        return view('admin.room-type.show',compact('room_type'));
    }

    public function edit($id){
        $data=RoomType::find($id);
        return view('admin.room-type.edit',compact('data'));
    }

    public function update(Request $request,$id){

        $data=RoomType::find($id);
        $data->title=$request->title;
        $data->details=$request->details;
        $data->update();

        return redirect()->back()->with('message','The Room Type Updated Successfully.');
    }

    public function delete($id){
        $data=RoomType::find($id);
        $data->delete();

        return redirect()->back()->with('message','The Room Type Deleted Successfully.');
    }

    public function delete_image($id){
        $data=RoomTypeImage::find($id);
        $data->delete();

        return redirect()->back()->with('message','The Image Deleted Successfully.');
    }
}
