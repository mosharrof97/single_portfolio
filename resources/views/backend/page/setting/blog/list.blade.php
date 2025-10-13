@extends('backend.partial.layout')
@section('content')
    <div class="container-xl">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Blog Post</h4>
                <a href="{{ route('blog.create') }}" class="btn btn-primary">Create blog post</a>
            </div>

            <div class="card-body">
                @include('components.message')

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $data)
                                <tr>
                                    <td>
                                        <img src="{{ asset($data->image) }}" alt="" width="30" height="30">
                                    </td>
                                    <td>{{ $data->category->category }}</td>
                                    <td>{{ $data->title }}</td>
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
                                        <a href="{{ route('blog.edit', $data->slug) }}"
                                            class="btn btn-primary m-1">Edit</a>

                                        <form action="{{ route('blog.delete', $data->slug) }}" method="post">
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







    <script>
        $(document).ready(function() {
            $('.status').change(function() {
                var status = $(this).val();
                var slug = $(this).data('slug');

                $.ajax({
                    type: 'PUT',
                    url: "{{ route('blog.update.status', ':slug') }}".replace(':slug', slug),
                    data: {
                        _token: '{{ csrf_token() }}',
                        slug: slug,
                        status: status
                    },

                    success: function(response) {
                        var message = response;
                        // toastr.success(message);
                        showToast(message, 'success');
                        console.log(message);

                    },
                    error: function(xhr, status, error) {
                        console.log(error);

                        // toastr.error('Failed to update data.', 'Error');
                    }
                });
            });

            $('.activeStatus').change(function() {
                var status = $(this).val();
                var slug = $(this).data('slug');
                console.log(slug);
                console.log(status);


                $.ajax({
                    type: 'PUT',
                    url: "{{ route('blog.update.status', ':slug') }}".replace(':slug', slug),
                    data: {
                        _token: '{{ csrf_token() }}',
                        slug: slug,
                        is_active: status
                    },

                    success: function(response) {
                        console.log(response);
                        showToast(response, 'success');
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });

        });
    </script>
@endsection
