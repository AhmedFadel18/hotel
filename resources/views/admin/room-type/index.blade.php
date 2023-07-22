@extends('admin.layouts.dashboard')
@section('content')
    <div class="card-header border-transparent">
        <h3 class="card-title">Room Types</h3>
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
                        <th>Room Type Title</th>
                        <th>Room Type Price</th>
                        <th>Room Type Images</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @php
                    $i = 1;
                @endphp
                <tbody>
                    @foreach ($room_types as $room_type)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $room_type->title }}</td>
                            <td>{{ $room_type->price }} $</td>
                            <td>{{ $room_type->roomtypeimages->count() }} </td>
                            <td>
                                <a href="{{ route('admin.room_types.show', $room_type->id) }}" class="btn btn-info btn-sm"><i
                                        class="fa fa-eye"></i></a>
                                <a href="{{ route('admin.room_types.edit', $room_type->id) }}"
                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('admin.room_types.delete', $room_type->id) }}"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are You Sure Delete This Room Type?')"><i
                                        class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        <a href="{{ route('admin.room_types.create') }}" class="btn btn-sm btn-info float-left">Add New Room Type</a>
    </div>
@endsection
