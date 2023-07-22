@extends('admin.layouts.dashboard')
@section('content')
    <div class="card-header border-transparent">
        <h3 class="card-title">Add Salary Payment</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>

        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        @if($errors->any())
        @foreach ($errors as $error)
        <p class="alert-danger">{{ $error }}</p>
        @endforeach
        @endif

        @if (Session::has('message'))
            <div class="alert-success">{{ session('message') }}</div>
        @endif
        <form action="{{ route('admin.staff.salary.store',$id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="table-responsive">
                <table class="table m-0">
                    <tr>
                        <th>Amount :</th>
                        <td><input type="number" name="salary_amount" class="form-control"></td>

                        <th>Payment Date :</th>
                        <td><input type="date" name="payment_date" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" class="btn btn-info">
                        </td>
                        <div class="card-footer clearfix">
                            <a href="{{ route('admin.staff.index') }}" class="btn btn-sm btn-secondary float-right">View All staff</a>
                        </div>
                    </tr>
                    </table>
                </div>
             </form>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->

@endsection
