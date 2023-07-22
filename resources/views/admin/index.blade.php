@extends('admin.layouts.dashboard')
@section('content')
    <div class="card-header border-transparent">
        <h1 class="m-0 text-dark">Dashboard</h1>
    </div>
    <div class="card-header border-transparent">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-hotel"></i></span>
                    <div class="info-box-content">
                        <a href="{{ route('admin.rooms.index') }}" class="info-box-text">Total Rooms</a>
                        <span class="info-box-number">
                            {{ $total_rooms }}
                            <small></small>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-ticket-alt"></i></span>

                    <div class="info-box-content">
                        <a href="{{ route('admin.booking.index') }}" class="info-box-text">Total Bookings</a>
                        <span class="info-box-number">
                            {{ $total_bookings }}
                            <small></small>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-friends"></i></span>

                    <div class="info-box-content">
                        <a href="{{ route('admin.customers.index') }}" class="info-box-text">Total Customers</a>
                        <span class="info-box-number">
                            {{ $total_customers }}
                            <small></small>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <a href="{{ route('admin.staff.index') }}" class="info-box-text">Total Staff</a>
                        <span class="info-box-number">
                            {{ $total_staff }}
                            <small></small>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title" id="t">Online Store Visitors</h3>
                    <canvas id="myChart" width="400" height="400"></canvas>
                    <a href="javascript:void(0);">View Report</a>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">820</span>
                        <span>Visitors Over Time</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                            <i class="fas fa-arrow-up"></i> 12.5%
                        </span>
                        <span class="text-muted">Since last week</span>
                    </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                    <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                        <i class="fas fa-square text-primary"></i> This Week
                    </span>

                    <span>
                        <i class="fas fa-square text-gray"></i> Last Week
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
            const config = {
                type: 'line'
                data: {}
                options: {}
                plugins: []
            }
        });
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.js"></script>

        <script src="{{ asset ('charts/chart.js') }}"></script>
        <script src="{{ asset ('charts/chart.min.js') }}"></script>
        <script src="{{ asset ('charts/chart.umd.js') }}"></script>
        <script src="{{ asset ('charts/chart.umd.min.js') }}"></script>
        <script src="{{ asset ('charts/helpers.js') }}"></script>
        <script src="{{ asset ('charts/helpers.min.js') }}"></script>

    </script>
@endsection
{{-- var _labels={!! json_encode($labels) !!};
var _data={!! json_encode($data) !!}; --}}
