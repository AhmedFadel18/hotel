@extends('admin.layouts.dashboard')
@section('content')

            <div class="card-header border-transparent">
                <h3 class="card-title">Staff</h3>
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
                                <th>Name</th>
                                <th>Job</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            @php
                                $i=1;
                            @endphp
                        <tbody>
                            @foreach ($staff as $staff)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $staff->name }}</td>
                                <td>{{ $staff->job }}</td>
                                <td>{{ $staff->department->title }}</td>
                                <td>
                                    <a href="{{ route('admin.staff.show',$staff->id) }}" class="btn btn-info btn-sm" title="show"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('admin.staff.edit',$staff->id) }}" class="btn btn-warning btn-sm" title="edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.staff.payments',$staff->id) }}" class="btn btn-dark btn-sm" title="salary"><i class="fa fa-money-check-alt"></i></a>
                                    <a href="{{ route('admin.staff.delete',$staff->id) }}" class="btn btn-danger btn-sm" title="delete"
                                        onclick="return confirm('Are You Sure Delete This staff?')"><i class="fa fa-trash"></i></a>
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
                <a href="{{ route('admin.staff.create') }}" class="btn btn-sm btn-info float-left">Add New Staff</a>
            </div>
@endsection
