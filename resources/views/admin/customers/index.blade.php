@extends('admin.layouts.dashboard')
@section('content')

            <div class="card-header border-transparent">
                <h3 class="card-title">Customers</h3>
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
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Phone</th>
                                <th>Customer Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            @php
                                $i=1;
                            @endphp
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td><img width="50" height="50" src="{{ asset('assets/images/customers/'.$customer->image) }}" alt=""></td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('admin.customers.edit',$customer->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.customers.delete',$customer->id) }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are You Sure Delete This Customer?')"><i class="fa fa-trash"></i></a>
                                </td>
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
                <a href="{{ route('admin.customers.create') }}" class="btn btn-sm btn-info float-left">Add New Customer</a>
            </div>
@endsection
