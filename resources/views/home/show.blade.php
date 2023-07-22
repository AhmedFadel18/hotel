@extends('home.layouts.home')
@section('content')
    <div class="content-wrapper">
        @foreach ($roomType as $data)
        @endforeach
        <div class=" testimonial_slider owl-carousel">
            @foreach ($roomType->roomtypeimages as $images)
                <img src="{{ asset('assets/images/room_types/' . $images->image_src) }}" height="500" width="500">
                @endforeach
            </div>
        <div class="section_title text-center">
            <a href="#" class="btn theme_btn button_hover">Book Now</a>
        </div>
    </div>
@endsection
