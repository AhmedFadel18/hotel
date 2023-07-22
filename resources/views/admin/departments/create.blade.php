@extends('admin.layouts.dashboard')
@section('content')
    <div class="card-header border-transparent">
        <h3 class="card-title">New Department</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>

        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        @if ($errors->any())
            @foreach ($errors as $error)
                <p class="alert-danger">{{ $error }}</p>
            @endforeach
        @endif

        @if (Session::has('message'))
            <div class="alert-success">{{ session('message') }}</div>
        @endif
        <div class="card-footer clearfix">
            <a href="{{ route('admin.departments.index') }}" class="btn btn-sm btn-secondary float-right">View All
                Departments</a>
        </div>
        <form action="{{ route('admin.departments.store') }}" method="POST">
            @csrf
            <div class="table-responsive">
                <table class="table m-0">
                    <tr>
                        <th>Department Title :</th>
                        <td><input type="text" name="title" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Department Details :</th>
                        <td>
                            <textarea name="details" class="form-control"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" class="btn btn-info">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->

@endsection
