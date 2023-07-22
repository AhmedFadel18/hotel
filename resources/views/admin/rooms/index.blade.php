@extends('admin.layouts.dashboard')
@section('content')

            <div class="card-header border-transparent">
                <h3 class="card-title">Rooms</h3>
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
                                <th>Room Title</th>
                                <th>Room Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            @php
                                $i=1;
                            @endphp
                        <tbody>
                            @foreach ($rooms as $room)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $room->title }}</td>
                                <td>{{ $room->RoomType->title }}</td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('admin.rooms.edit',$room->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.rooms.delete',$room->id) }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are You Sure Delete This Room?')"><i class="fa fa-trash"></i></a>
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
                <a href="{{ route('admin.rooms.create') }}" class="btn btn-sm btn-info float-left">Add New Room</a>
            </div>
@endsection
