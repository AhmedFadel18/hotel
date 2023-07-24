@extends('admin.layouts.dashboard')
@section('content')

            <div class="card-header border-transparent">
                <h3 class="card-title">Tetsimonials</h3>
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
                                <th>tetsimonial Customer</th>
                                <th>tetsimonial</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            @php
                                $i=1;
                            @endphp
                        <tbody>
                            @foreach ($testimonials as $tetsimonial)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $tetsimonial->customer->name }}</td>
                                <td>{{ $tetsimonial->testimonial }}</td>
                                <td>
                                    <a href="{{ route('admin.testimonials.delete',$tetsimonial->id) }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are You Sure Delete This tetsimonial?')"><i class="fa fa-trash"></i></a>
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
@endsection
