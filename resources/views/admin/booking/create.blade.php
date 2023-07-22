@extends('admin.layouts.dashboard')
@section('content')
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
        <div class="card-footer clearfix">
            <a href="{{ route('admin.booking.index') }}" class="btn btn-sm btn-secondary float-right">View All Bookings</a>
        </div>
        <form action="{{ route('admin.booking.store') }}" method="POST">
            @csrf
            <div class="table-responsive">
                <table class="table m-0">
                    <tr>
                        <th>Select Customer :</th>
                        <td>
                            <select name="customer_id" class="form-control">
                                <option value="">Choose Customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            @error('customer_id')
                                <div class="alert-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
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

@section('scripts')
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
@endsection
@endsection
