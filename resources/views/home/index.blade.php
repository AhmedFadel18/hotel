@extends('home.layouts.home')
@section('content')
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Hotel Accomodation</h2>
            <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
        </div>
        <div class="row mb_30">
            @foreach ($roomTypes as $roomType)
                @foreach ($roomType->roomtypeimages->take(1) as $images)
                    <div class="col-lg-3 col-sm-6">
                        <div class="accomodation_item text-center">
                            <div class="hotel_img">
                                <img src="{{ asset('assets/images/room_types/' . $images->image_src) }}" height="270"
                                width="270" alt="">
                                <a href="#" class="btn theme_btn button_hover">Book Now</a>
                            </div>
                            <a href="{{ route('home.show',$roomType->id) }}" class="btn btn-dark button_hover">Details</a>
                            <a href="#">
                                <h4 class="sec_h4">{{ $roomType->title }}</h4>
                            </a>
                            <h5>{{ $roomType->price }} $<small>/night</small></h5>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</section>
@endsection
