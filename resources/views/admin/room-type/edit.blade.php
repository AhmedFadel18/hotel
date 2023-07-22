@extends('admin.layouts.dashboard')
@section('content')
    <div class="card-header border-transparent">
        <h3 class="card-title">Edit Room Type</h3>
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
        <form action="{{ route('admin.room_types.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="table-responsive">
                <table class="table m-0">
                    <tr>
                        <th>Room Type Title :</th>
                        <td><input type="text" name="title" value="{{ $data->title }}" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Room Type Price :</th>
                        <td><input type="text" name="price" value="{{ $data->price }}" class="form-control"></td>
                    </tr>
                    <tr>
                        <th>Details :</th>
                        <td>
                            <textarea name="details" class="form-control">{{ $data->details }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Gallery :</th>
                        <table class="table m-0">
                            <tr>
                                <td>
                                    <input type="file" name="images[]" multiple>
                                </td>
                            </tr>
                            <tr>
                                @foreach ($data->roomtypeimages as $image)
                                    <td>
                                        <img src="{{ asset('assets/images/room_types/' . $image->image_src) }}"
                                            width="100" height="100">
                                        <p class="m-3">
                                            <a href="{{ route('admin.roomtype_image.delete', $image->id) }}"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are You Sure Delete This image?')"><i
                                                    class="fa fa-trash"></i></a>
                                        </p>
                                    </td>
                                @endforeach
                            </tr>
                        </table>
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
        <a href="{{ route('admin.room_types.create') }}" class="btn btn-sm btn-info float-left">Add New Room Type</a>
        <a href="{{ route('admin.room_types.index') }}" class="btn btn-sm btn-secondary float-right">View All Room Types</a>
    </div>

@endsection
