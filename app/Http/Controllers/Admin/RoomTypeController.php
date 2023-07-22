<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Models\RoomTypeImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Nette\Utils\Random;

class RoomTypeController extends Controller
{
    public function index()
    {
        $room_types = RoomType::get();
        return view('admin.room-type.index', compact('room_types'));
    }

    public function create()
    {
        return view('admin.room-type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'details' => 'required',
        ]);

        $data = new RoomType;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->details = $request->details;
        $data->save();

        foreach ($request->room_type_imgs as $img) {
            $image = $img;
            $imageName =$image->hashName() . '.' . $image->getClientOriginalExtension();
            $image->move('assets/images/room_types/', $imageName);
            $imgData = new RoomTypeImage;
            $imgData->room_type_id = $data->id;
            $imgData->image_src = $imageName;
            $imgData->save();
        }

        return redirect()->back()->with('message', 'The Room Type Added Successfully.');
    }

    public function show($id){
        $data=RoomType::where('id',$id)->first();

        return view('admin.room-type.show',compact('data'));
    }

    public function edit($id)
    {
        $data = RoomType::find($id);
        return view('admin.room-type.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'details' => 'required',
        ]);

        $data = RoomType::find($id);
        $data->title = $request->title;
        $data->price = $request->price;
        $data->details = $request->details;
        $data->update();

        if ($request->hasFile('images')) {
            foreach ($request->images as $img) {
                $image = $img;
                $imageName =$image->hashName() . '.' . $image->getClientOriginalExtension();
                $image->move('assets/images/room_types/', $imageName);
                $imgData = new RoomTypeImage;
                $imgData->room_type_id = $data->id;
                $imgData->image_src = $imageName;
                $imgData->save();
            }
        }

        return redirect()->back()->with('message', 'The Room Type Updated Successfully.');
    }

    public function delete($id)
    {
        $data = RoomType::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'The Room Type Deleted Successfully.');
    }

    public function delete_image($id)
    {
        $data = RoomTypeImage::find($id);
        $path = 'assets/images/room_types/' . $data->image_src;
        File::delete($path);
        $data->delete();

        return redirect()->back()->with('message', 'The Image Deleted Successfully.');
    }
}
