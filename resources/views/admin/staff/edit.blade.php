@extends('admin.layouts.dashboard')
@section('content')
    <div class="card-header border-transparent">
        <h3 class="card-title">Edit Staff</h3>
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
        <form action="{{ route('admin.staff.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="table-responsive">
                <table class="table m-0">
                    <tr>
                        <th>Name :</th>
                        <td><input type="text" name="name" class="form-control" value="{{ $data->name }}"></td>

                        <th>Job :</th>
                        <td><input type="text" name="job" class="form-control" value="{{ $data->job }}"></td>
                    </tr>
                    <tr>
                        <th>Select Department :</th>
                        <td>
                            <select name="department_id" class="form-control">
                                <option value="0">Choose Department</option>
                                @foreach ($departments as $department)
                                    <option @if ($data->department_id == $department->id) selected @endif value="{{ $department->id }}">
                                        {{ $department->title }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Salary Type :</th>
                        <td>
                            <input type="radio" name="salary_type" @if ($data->salary_type == 'monthly') checked @endif
                                value="monthly">Nonthly
                            <input type="radio" name="salary_type" @if ($data->salary_type == 'weekly') checked @endif
                                value="weekly">Weekly
                            <input type="radio" name="salary_type" @if ($data->salary_type == 'daily') checked @endif
                                value="daily">Daily
                        </td>

                        <th>Salary Amount :</th>
                        <td><input type="number" name="salary_amount" class="form-control"
                                value="{{ $data->salary_amount }}"></td>
                    </tr>
                    <tr>
                        <th>Birth Date :</th>
                        <td><input type="date" name="birth_date" class="form-control" value="{{ date('Y-m-d',strtotime($data->birth_date)) }}">
                        </td>

                        <th>Hiring Date :</th>
                        <td><input type="date" name="hiring_date" class="form-control" value="{{ date('Y-m-d',strtotime($data->hiring_date) )}}">
                        </td>
                    </tr>
                    <tr>
                        <th>Bio :</th>
                        <td><input type="text" name="bio" class="form-control" value="{{ $data->bio }}"></td>
                    </tr>
                    <tr>
                        <th>Image :</th>
                        <td><input type="file" name="image" class="form-control">
                            <input type="hidden" name="prev_img" value="{{ $data->image }}">
                            <img width="50" height="50" src="{{ asset('assets/images/staff/' . $data->image) }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" class="btn btn-info">
                        </td>
                        <div class="card-footer clearfix">
                            <a href="{{ route('admin.staff.index') }}" class="btn btn-sm btn-secondary float-right">View
                                All staff Types</a>
                        </div>
                    </tr>
                </table>
            </div>
        </form>
        <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->

@endsection
