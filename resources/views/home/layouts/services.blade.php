<section class="facilities_area section_gap">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
    </div>
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_w">Royal Facilities</h2>
            <p>Who are in extremely love with eco friendly system.</p>
        </div>
        <div class="row mb_30">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6">
                    <div class="facilities_item">
                        <h4><img src="{{ asset('assets/images/services/' . $service->image) }}" width="50px"
                                height="50px" class="m-2"></i>{{ $service->title }}</h4>
                        <p>{{ $service->summary }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
