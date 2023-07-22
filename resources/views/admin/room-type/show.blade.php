@extends('admin.layouts.dashboard')
@section('content')
    <div class="table-responsive">
        <table class="table m-0">
            <tr>
                <th>Room Type Title :</th>
                <td>{{ $data->title }}</td>
            </tr>
            <tr>
                <th>Room Type Price :</th>
                <td>{{ $data->price }}</td>
            </tr>
            <tr>
                <th>Details :</th>
                <td>
                    {{ $data->details }}
                </td>
            </tr>
            <tr>
                <th>Gallery :</th>
                <td></td>
                <table class="table m-0">
                    <tr>
                        @foreach ($data->roomtypeimages as $image)
                            <td>
                                <img src="{{ asset('assets/images/room_types/' . $image->image_src) }}" width="150"
                                    height="150">
                            </td>
                        @endforeach
                    </tr>
                </table>
            </tr>

        </table>
    </div>
@endsection
