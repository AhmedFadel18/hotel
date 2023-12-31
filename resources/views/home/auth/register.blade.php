<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="image/favicon.png" type="image/png">
    <title>Royal Hotel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('home/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/vendors/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('home/vendors/owl-carousel/owl.carousel.min.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
</head>

<body>
    @include('home.layouts.header')
    <section class="banner_area">
        <div class="booking_table d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0"
                data-background=""></div>
            <div class="container">
                <div class="hotel_booking_table">
                    <div class="col-md-3">
                        <h2>Register</h2>
                    </div>
                    <div class="col-md-8">
                        <div class="boking_table">
                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="book_tabel_item">
                                            <div class="form-group">
                                                <div class='input-group'>
                                                    <input type='text' name="name" value="{{ old('name') }}" class="form-control"
                                                        placeholder="Enter Your Name" />
                                                </div>
                                                @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class='input-group'>
                                                    <input type='email' name="email" value="{{ old('email') }}" class="form-control"
                                                        placeholder="Enter Your Email" />
                                                </div>
                                                @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class='input-group'>
                                                    <input type='password' name="password" class="form-control"
                                                        placeholder="Enter Your Password" />
                                                </div>
                                                @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class='input-group'>
                                                    <input type='text' name="address" value="{{ old('address') }}" class="form-control"
                                                        placeholder="Enter Your Adress" />
                                                </div>
                                                     @error('address')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class='input-group'>
                                                    <input type='text' name="phone" value="{{ old('phone') }}" class="form-control"
                                                        placeholder="Enter Your Phone" />
                                                </div>
                                                     @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class='input-group'>
                                                    <p class="pl-3">Upload Your Image :</p>
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class='input-group'>
                                                    <input type='submit' value="Login"
                                                        class="book_now_btn button_hover" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </section>





    @include('home.layouts.scripts')
</body>

</html>
