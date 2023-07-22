<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::get();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create(){
        $room_types=RoomType::all();
        return view('admin.rooms.create',compact('room_types'));

    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'room_type_id'=>'required',
        ]);

        $data=new Room;
        $data->title=$request->title;
        $data->room_type_id=$request->room_type_id;
        $data->save();

        return redirect()->back()->with('message','The Room Added Successfully.');
    }

    public function edit($id){
        $data=Room::find($id);
        return view('admin.rooms.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'title'=>'required',
            'room_type_id'=>'required',
        ]);

        $data=Room::find($id);
        $data->title=$request->title;
        $data->details=$request->details;
        $data->update();

        return redirect()->back()->with('message','The Room Updated Successfully.');
    }

    public function delete($id){
        $data=Room::find($id);
        $data->delete();

        return redirect()->back()->with('message','The Room Deleted Successfully.');
    }
}
