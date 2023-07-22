@extends('admin.layouts.dashboard')
@section('content')

            <div class="card-header border-transparent">
                <h3 class="card-title">{{ $staff->name }} Payments</h3>
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
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                            @php
                                $i=1;
                            @endphp
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $data->salary_amount }}</td>
                                <td>{{ $data->payment_date }}</td>
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
                <a href="{{ route('admin.staff.salary.create',$staff->id) }}" class="btn btn-sm btn-info float-left">Add New Salary Payment</a>
            </div>
@endsection
