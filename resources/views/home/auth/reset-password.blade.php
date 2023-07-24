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
    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="row g-0">

                        <div class="card-body p-4 p-lg-5 text-black">
                            @if (Session::has('message'))
                                <div class="alert-danger">{{ session('message') }}</div>
                            @endif

                            <form action="{{ route('home.submit_reset_password') }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Reset Password</h5>

                                <div class="form-outline mb-4">
                                    <input type="email" id="form2Example17" name="email"
                                        class="form-control form-control-lg" />
                                    <label class="form-label">Email address</label>
                                    @error('email')
                                    <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg" />
                                    <label class="form-label" for="form2Example27">Password</label>
                                    @error('password')
                                    <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password_confirmation"
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="form2Example27">Confirm password</label>
                                    @error('password_confirmation')
                                    <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="pt-1 mb-4">
                                    <button class="btn btn-dark btn-lg btn-block" type="submit">Reset Password</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('home.layouts.scripts')
</body>

</html>
