@extends('admin.layouts.dashboard')
@section('content')
    <div class="card-header border-transparent">
        <h3 class="card-title">Edit Service</h3>
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
        <form action="{{ route('admin.services.update',$data->id) }}" method="POST">
        @csrf
        <div class="table-responsive">
            <table class="table m-0">
                <tr>
                    <th>Service Title :</th>
                    <td><input type="text" name="title" class="form-control"></td>
                </tr>
                <tr>
                    <th>Service Summary :</th>
                    <td><input type="text" name="summary" class="form-control"></td>
                </tr>
                <tr>
                    <th>Service Description :</th>
                    <td><input type="text" name="description" class="form-control"></td>
                </tr>
                <tr>
                    <th>Service Image :</th>
                    <input type="hidden" name="prev_img" value="{{ $data->image }}">
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
        <div class="card-footer clearfix">
            <a href="{{ route('admin.services.create') }}" class="btn btn-sm btn-info float-left">Add New Service</a>
            <a href="{{ route('admin.services.index') }}" class="btn btn-sm btn-secondary float-right">View All Services</a>
        </div>
@endsection
