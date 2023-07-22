@extends('admin.layouts.dashboard')
@section('content')
    <div class="card-header border-transparent">
        <h3 class="card-title">Edit Room</h3>
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
        <form action="{{ route('admin.rooms.update',$data->id) }}" method="POST">
        @csrf
        <div class="table-responsive">
            <table class="table m-0">
                    <tr>
                        <th>Room Title :</th>
                        <td><input type="text" name="title" value="{{ $data->title }}" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Details :</th>
                        <td><textarea name="details" class="form-control">{{ $data->details }}</textarea></td>
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
            <a href="{{ route('admin.rooms.create') }}" class="btn btn-sm btn-info float-left">Add New Room Type</a>
            <a href="{{ route('admin.rooms.index') }}" class="btn btn-sm btn-secondary float-right">View All Room Types</a>
        </div>
@endsection
