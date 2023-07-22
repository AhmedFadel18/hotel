@extends('admin.layouts.dashboard')
@section('content')

            <div class="card-header border-transparent">
                <h3 class="card-title">Bookings</h3>
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
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Room</th>
                                <th>Price</th>
                                <th>Check In Date</th>
                                <th>Check Out Date</th>
                                <th>Total Adults</th>
                                <th>Total Children</th>
                            </tr>
                        </thead>
                            @php
                                $i=1;
                            @endphp
                        <tbody>
                            @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $booking->customer->name }}</td>
                                <td>{{ $booking->room->title }}</td>
                                <td>{{ $booking->room->RoomType->price }}</td>
                                <td>{{ $booking->checkin_date }}</td>
                                <td>{{ $booking->checkout_date }}</td>
                                <td>{{ $booking->total_adults }}</td>
                                <td>{{ $booking->total_children }}</td>
                            </tr>
                            @php
                                $i++
                            @endphp
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <a href="{{ route('admin.booking.create') }}" class="btn btn-sm btn-info float-left">Add New Booking</a>
            </div>
@endsection
