@extends('admin.layouts.dashboard')
@section('content')
    <div class="card-header border-transparent">
        <h3 class="card-title">New Room</h3>
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
        <form action="{{ route('admin.rooms.store') }}" method="POST">
            @csrf
            <div class="table-responsive">
                <table class="table m-0">
                    <tr>
                        <th>Room Title :</th>
                        <td><input type="text" name="title" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Select Room Type :</th>
                        <td>
                            <select name="room_type_id" class="form-control">
                                <option value="0">Choose Room Type</option>
                                @foreach ($room_types as $room_type)
                                <option value="{{ $room_type->id }}">{{ $room_type->title }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" class="btn btn-info">
                        </td>
                        <div class="card-footer clearfix">
                            <a href="{{ route('admin.rooms.index') }}" class="btn btn-sm btn-secondary float-right">View All Room Types</a>
                        </div>
                    </tr>
                    </table>
                </div>
             </form>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->

@endsection
