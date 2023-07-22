@extends('admin.layouts.dashboard')
@section('content')
    <div class="table-responsive">
        <table class="table m-0">
            <tr>
                <th>Service Title :</th>
                <td>{{ $data->title }}</td>
            </tr>
            <tr>
                <th>Service Summary :</th>
                <td>{{ $data->summary }}</td>
            </tr>
            <tr>
                <th>Description :</th>
                <td>
                    {{ $data->description }}
                </td>
            </tr>
            <tr>
                <th>Image :</th>
                <td></td>
                <table class="table m-0">
                    <tr>
                            <td>
                                <img src="{{ asset('assets/images/services/' . $data->image) }}" width="150"
                                    height="150">
                            </td>
                    </tr>
                </table>
            </tr>

        </table>
    </div>
@endsection
