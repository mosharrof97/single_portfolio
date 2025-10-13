@extends('user.backend.partial.layout')

@section('title')
    <span>Our Service</span>
@endsection
@section('content')
    <div class="container-xl">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Our service</h4>
                <a href="{{ route('user.service.create') }}" class="btn btn-primary">Create service</a>
            </div>

            <div class="card-body">
                @include('components.message')

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>desc</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset($data->icon) }}" alt="" width="30" height="30">
                                    </td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->desc }}</td>
                                    <td>
                                        @if ($data->status == 0)
                                            <span class="badge text-bg-warning">Draft</span>
                                        @elseif ($data->status == 1)
                                            <span class="badge text-bg-info">Unpublish</span>
                                        @else
                                            <span class="badge text-bg-success">Publish</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('user.service.edit', $data->slug) }}"
                                            class="btn btn-primary m-1">Edit</a>

                                        <form action="{{ route('user.service.delete', $data->slug) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="testimonialId" value="{{ $data->slug }}">
                                            <input type="submit" class="btn btn-success m-1" value="Delete">
                                            {{-- <a type="submit" class="btn btn-success m-1">Delete</a> --}}
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
