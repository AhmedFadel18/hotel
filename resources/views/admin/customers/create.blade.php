@extends('admin.layouts.dashboard')
@section('content')
    <div class="card-header border-transparent">
        <h3 class="card-title">New Customer</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>

        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
    @if($errors->any())
    @foreach ($errors->all() as $error)
    <p class="alert-danger">{{ $error }}</p>
    @endforeach
    @endif
        @if (Session::has('message'))
            <div class="alert-success">{{ session('message') }}</div>
        @endif
        <div class="card-footer clearfix">
            <a href="{{ route('admin.customers.index') }}" class="btn btn-sm btn-secondary float-right">View All Customers</a>
        </div>
        <form action="{{ route('admin.customers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="table-responsive">
                <table class="table m-0">
                    <tr>
                        <th>Customer Name :</th>
                        <td><input type="text" name="name" value="{{ old('name') }}" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Customer Email :</th>
                        <td><input type="email" name="email" value="{{ old('email') }}" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Customer Password :</th>
                        <td><input type="password" name="password" value="{{ old('password') }}" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Customer Phone :</th>
                        <td><input type="text" name="phone" value="{{ old('phone') }}" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Customer Address :</th>
                        <td><input type="text" name="address" value="{{ old('address') }}" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Customer Image :</th>
                        <td><input type="file" name="image" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" class="btn btn-success">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
@endsection
