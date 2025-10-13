@extends('Company-panel.Partial.Layout')

@section('title')
    <span>Testimonials</span>
@endsection
@section('content')

<div class="container-xl">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Testimonials</h4>
            <a href="{{ route('create.company.testimonial') }}" class="btn btn-primary">Create new testimonial</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Profession</th>
                            <th>Rating star</th>
                            <th>Status</th>
                            <th>Active status</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonials as $data) 
                        <tr>
                            <td>
                                <img src="{{ asset('Upload/com_frontend/testimonial/'.$data->image) }}" alt="" width="30" height="30">
                            </td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->profession }}</td>
                            <td>{{ $data->rating_star }}</td>
                            <td>
                                <form action="" id="updateStatus" method="post">
                                    <select name="status" id="status{{ $data->id }}" data-id="{{ $data->id }}" class="form-control badge text-bg-success status">
                                        <option class="text-bg-light" value="1" {{ $data->status == '0' ? 'selected active' : '' }}>Draft</option>
                                        <option class="text-bg-light" value="1" {{ $data->status == '1' ? 'selected active' : '' }}>Pending</option>
                                        <option class="text-bg-light" value="2" {{ $data->status == '2' ? 'selected active' : '' }}>Published</option>
                                    </select>
                                </form>
                            </td>
                            <td> 
                                <form action="" id="updateActiveStatus" method="post">
                                    <select name="is_active" id="is_active" data-id="{{ $data->id }}" class="form-control badge text-bg-success activeStatus">
                                        <option class="text-bg-light" value="1" {{ $data->is_active == true ? 'selected active' : '' }}>Active</option>
                                        <option class="text-bg-light" value="0" {{ $data->is_active == false ? 'selected active' : '' }}>In-active</option>
                                    </select>
                                </form>
                            </td>                           
                            <td>{{ $data->content }}</td>
                            <td>
                                <a href="{{ route('edit.company.testimonial',$data->id) }}" class="btn btn-primary m-1">Edit</a>

                                <form action="{{ route('destroy.company.testimonial') }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="testimonialId" value="{{ $data->id }}">
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
    $(document).ready(function(){
        $('.status').change(function(){
            var status = $(this).val();
            var id = $(this).data('id');
            // console.log("Status: " + status);
            // console.log("ID: " + id);

            $.ajax({
                type: 'PUT',
                url: "{{ route('update.company.testimonial.status') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    status: status
                },

                success: function (response) {
                    var message = response;
                    // toastr.success(message);
                    showToast(message, 'success');
                    console.log(message);
                    
                },
                error: function (xhr, status, error) {
                    console.log(error);

                    // toastr.error('Failed to update data.', 'Error');
                }
            });
        });

        $('.activeStatus').change(function(){
            var status = $(this).val();
            var id = $(this).data('id');
            console.log(id);
            console.log(status);
            

            $.ajax({
                type: 'PUT',
                url: "{{ route('update.company.testimonial.status') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    is_active: status
                },

                success: function (response) {
                    console.log(response);
                    showToast(response,'success');
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        });

    });
</script>

@endsection