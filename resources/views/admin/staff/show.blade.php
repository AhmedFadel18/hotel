@extends('admin.layouts.dashboard')
@section('content')
    <div class="table-responsive">
        <table class="table m-0">
            <tr>
                <th>Name :</th>
                <td>{{ $data->name }}</td>
            </tr>
            <tr>
                <th>Job :</th>
                <td>{{ $data->job }}</td>
            </tr>
            <tr>
                <th>Department :</th>
                <td>{{ $data->department->title }}</td>
            </tr>
            <tr>
                <th>Salary :</th>
                <td>
                    {{ $data->salary_amount }}
                </td>
            </tr>
            <tr>
                <th>Hiring Date :</th>
                <td>
                    {{ date('Y-m-d', strtotime($data->hiring_date)) }}
                </td>
            </tr>
            <tr>
                <th>Age :</th>
                <td>
                    {{ $age }}
                </td>
            </tr>
            <tr>
                <th>Bio :</th>
                <td>
                    {{ $data->bio }}
                </td>
            </tr>
            <tr>
                <th>Image :</th>
                <td>
                    <table class="table m-0">
                        <tr>
                            <td>
                                <img src="{{ asset('assets/images/staff/' . $data->image) }}" width="150" height="150">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
    </div>
@endsection
