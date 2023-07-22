
    <div class="card-header border-transparent">
        <h3 class="card-title">New Booking</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>

        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        @if (Session::has('message'))
            <div class="alert-success">{{ session('message') }}</div>
        @endif

        <form action="{{ route('home.booking.store') }}" method="POST">
            @csrf
            <div class="table-responsive">
                <table class="table m-0">

                    <tr>
                        <th>Check In Date :</th>
                        <td><input type="date" name="checkin_date" class="form-control checkin-date">
                            @error('checkin_date')
                                <div class="alert-danger">{{ $message }}</div>
                            @enderror
                        </td>

                        <th>Check Out Date :</th>
                        <td><input type="date" name="checkout_date" class="form-control checkout-date">
                            @error('checkout_date')
                                <div class="alert-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>Total Adults :</th>
                        <td><input type="number" name="total_adults" class="form-control">
                            @error('total_adults')
                                <div class="alert-danger">{{ $message }}</div>
                            @enderror
                        </td>

                        <th>Total Children :</th>
                        <td><input type="number" name="total_children" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <th>Available Rooms :</th>
                        <td>
                            <select name="room_id" class="form-control room-list">
                                <option value="0">Choose Room</option>
                            </select>
                            @error('room_id')
                                <div class="alert-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" class="btn btn-success" class="form-control">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
@include('home.layouts.scripts')
<script>
        $(document).ready(function() {
            $(".checkin-date").on('blur', function() {
                var _checkinDate = $(this).val();
                $.ajax({
                    url: "{{ url('admin/booking') }}/available-rooms/" + _checkinDate,
                    dataType: 'json',
                    beforeSend: function() {
                        $(".room-list").html('<option>--Loading--<option/>');
                    },
                    success: function(res) {
                        var _html = '';
                        $.each(res.data, function(index, row) {
                            _html += '<option value="' + row.room.id + '">' + row.room
                                .title + ' - ' + row.roomType.title +
                                '<option/>';
                        });
                        $(".room-list").html(_html);
                    }
                })
            })
        });
    </script>








{{-- <!doctype html>
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
                @if (Session::has('message'))
                    <div class="alert-danger">{{ session('message') }}</div>
                @endif
                <div class="card-body p-0">
                    @if (Session::has('message'))
                        <div class="alert-success">{{ session('message') }}</div>
                    @endif

                    <form action="{{ route('home.booking.store') }}" method="POST">
                        @csrf
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tr>
                                    <th>Check In Date :</th>
                                    <td><input type="date" name="checkin_date" class="form-control checkin-date">
                                        @error('checkin_date')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </td>

                                    <th>Check Out Date :</th>
                                    <td><input type="date" name="checkout_date" class="form-control checkout-date">
                                        @error('checkout_date')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total Adults :</th>
                                    <td><input type="number" name="total_adults" class="form-control">
                                        @error('total_adults')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </td>

                                    <th>Total Children :</th>
                                    <td><input type="number" name="total_children" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Available Rooms :</th>
                                    <td>
                                        <select name="room_id" class="form-control room-list">
                                            <option value="0">Choose Room</option>
                                        </select>
                                        @error('room_id')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="submit" class="btn btn-success" class="form-control">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </section>
    @include('home.layouts.scripts')
    <script>
        $(document).ready(function() {
            $(".checkin-date").on('blur', function() {
                var _checkinDate = $(this).val();
                $.ajax({
                    url: "{{ url('booking') }}/available-rooms/" + _checkinDate,
                    dataType: 'json',
                    beforeSend: function() {
                        $(".room-list").html('<option>--Loading--</option>');
                    },
                    success: function(res) {
                        var _html = '';
                        $.each(res.data, function(index, row) {
                            _html += '<option value="' + row.room.id + '">' + row.room
                                .title + ' - ' + row.roomType.title +
                                '<option/>';
                        });
                        $(".room-list").html(_html);
                    }
                })
            })
        });
    </script>
</body>

</html> --}}
