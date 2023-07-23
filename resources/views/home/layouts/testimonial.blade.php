<section class="testimonial_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Testimonial from our Clients</h2>
            <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p>
        </div>
        @if (Session::has('thanks'))
            <h3 class="alert-success text-center">{{ session('thanks') }}</h3>
        @endif
        <div class="testimonial_slider owl-carousel">
            @foreach ($testimonials as $testimonial)
                <div class="media testimonial_item">
                    <div class="media-body">
                        <p>{{ $testimonial->testimonial }}</p>
                        <h4>{{ $testimonial->customer->name }}</h4>
                        <img class="rounded-circle"
                            src="{{ asset('assets/images/customers/' . $testimonial->customer->image) }}" width="50"
                            height="50" alt="">
                    </div>
                </div>
            @endforeach
        </div>

        <!--================Contact Area =================-->
        <section class="contact_area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <form class="row contact_form" action="{{ route('home.testimonials.store') }}" method="POST"
                            id="contactForm" novalidate="novalidate">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="testimonial" rows="1" placeholder="Please Enter Your Testimonial"></textarea>
                                </div>
                                <button type="submit" value="submit" class="btn theme_btn button_hover">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--================Contact Area =================-->



    </div>
</section>
