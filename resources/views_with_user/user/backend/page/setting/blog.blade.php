@extends('Admin-panel.Partial.Layout')
@section('title')
    Blog
@endsection
@section('content')
<div class="row">
    <style>
        .content-text {
            max-height: 128px;  /* Change to pixels */
            overflow: hidden;
            position: relative;
        }
        
        .show-more-btn {
            margin-top: 10px;
            cursor: pointer;
            color: #1b6670;
            background-color: transparent;
            border: 1px solid #cfcfcf;
            padding: 5px;
            border-radius: 5px;
        }
    </style>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create post form</h4> 
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        <span class="text-success">{{ session('message') }}</span>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        <span class="text-danger">{{ session('error') }}</span>
                    </div>
                @endif
                <form action="{{ route('com.blog.store') }}" id="form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row align-items-end">
                        <div class="col-md-12 form-group">
                            <label for="title">Blog Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="">
                            
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="image">Blog Image</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="">
                            
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- {{ asset('Upload/com_frontend/slider/'.$slider->image) }} --}}
                        <div class="col-md-6 form-group">
                            <img id="image-preview" src="" alt="Slider Preview"
                                            style=" max-width: 200px; max-height: 200px; border:2px solid rgb(199, 199, 199); padding:5px;" />
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="desc">Blog Desc</label>
                            <textarea name="desc" class="form-control" id="desc" cols="30" rows="10"></textarea>
                            
                            @error('desc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                @foreach ($blogs as $data)
                <div class="p-2 my-2 border border-bottom" id="blog_show_{{ $data->id }}">
                    <div class="row">
                        <div class="col-12 col-xxl-11 col-md-10 ">
                            <div class="row">
                                <div class="col-12 col-xxl-3 col-md-4 ">
                                    <img src="{{ asset('Upload/com_frontend/blog/'.$data->image) }}" alt="" class="w-100 border border-2 p-2" style="height: 250px;">
                                </div>
                                <div class="col-12 col-xxl-9 col-md-8 ">
                                    @if ($data->is_active == 1)
                                    <span class="badge text-success fw-bold">Active</span>
                                    @else
                                    <span class="badge text-warning fw-bold">Inactive</span>
                                    @endif
                                    <h4>{{ $data->title }}</h4>
                                    <div class="content-text">{!! $data->desc !!}</div>
                                    {{-- <p class="fw-lighter text-truncate">{!! $data->desc !!}</p> --}}
                                    <button class="show-more-btn">Show More</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xxl-1 col-md-2 ">
                            <div class="">
                                <button data-id="{{ $data->id }}" class="btn btn-primary m-1 blog_edit" id="blog_edit_{{ $data->id }}"  >Edit</button>
                                <a href="" data-id="{{ $data->id }}" class="btn btn-success m-1">View</a>
                                <a href="" data-id="{{ $data->id }}" class="btn btn-danger m-1">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-2 blog_update" id="blog_update_{{ $data->id }}">
                    <form action="{{ route('com.blog.update',$data->id) }}" id="up_form_{{ $data->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" class="form-control" name="blog_id" placeholder="" value="{{$data->id  }}">
                        <div class="row align-items-end">
                            <div class="col-md-12 form-group">
                                <label for="title">Blog Title</label>
                                <input type="text" class="form-control" id="title" name="up_title" placeholder="" value="{{ $data->title }}">
                                
                                @error('up_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <div class="col-md-6 form-group">
                                <label for="update-image">Blog Image</label>
                                <input type="file" class="form-control" id="update-image" name="up_image" placeholder="">
                                <input type="hidden" class="form-control" name="old_image" placeholder="" value="{{$data->image  }}">
                                
                                @error('up_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- {{ asset('Upload/com_frontend/slider/'.$slider->image) }} --}}
                            <div class="col-md-6 form-group">
                                <img id="update-image-preview" src="{{ asset('Upload/com_frontend/blog/'.$data->image) }}" alt="Blog Preview"
                                                style=" max-width: 100px; max-height: 100px; border:2px solid rgb(199, 199, 199); padding:5px;" />
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="">
                                    <label for="desc">Blog Desc</label>
                                    <textarea class="form-control" name="up_desc" id="up_desc_{{ $data->id }}" placeholder="Leave a comment here" >{!! $data->desc !!}</textarea>                                    
                                </div>
                                
                                @error('up_desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <div class="col-md-12 form-group d-flex justify-content-between">
                                <a href="{{ route('com.blog')}}" class="btn btn-black"> back</a>
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </form>

                    <script>
                        $(document).ready(function() {
                            ClassicEditor.create(document.querySelector('#up_desc_{{ $data->id }}'), {
                                toolbar: [
                                    'heading',
                                    'undo', 
                                    'redo', 
                                    'bold', 
                                    'italic', 
                                    'underline',
                                    'strikethrough', 
                                    'code', 
                                    'superscript', 
                                    'subscript', 
                                    'fontColor', 
                                    'fontBackgroundColor', 
                                    'alignment', 
                                    'blockQuote', 
                                    'numberedList', 
                                    'bulletedList', 
                                    'link', 
                                    // 'imageUpload', 
                                    // 'mediaEmbed',
                                    'insertTable', 
                                    'codeBlock', 
                                    'insertHorizontalRule', 
                                    'specialCharacters', 
                                    'emoji',
                                    'customButton',
                                ]
                            })
                            .then(editor => {
                                console.log('Successful!');
                            })
                            .catch(error => {
                                console.error(error);
                            });
                        });
                    </script>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script> --}}
<script>
    $(document).ready(function() {
        $('#image').on('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image-preview').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);
            } else {
                $('#image-preview').hide();
            }
        });

        $('#update-image').on('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#update-image-preview').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);
            } else {
                $('#update-image-preview').hide();
            }
        });
    });

</script>

{{-- CK Editor start--}}
<script>
    $(document).ready(function() {
        ClassicEditor.create(document.querySelector('#desc'), {
            toolbar: [
                'heading',
                'undo', 
                'redo', 
                'bold', 
                'italic', 
                'underline',
                'strikethrough', 
                'code', 
                'superscript', 
                'subscript', 
                'fontColor', 
                'fontBackgroundColor', 
                'alignment', 
                'blockQuote', 
                'numberedList', 
                'bulletedList', 
                'link', 
                // 'imageUpload', 
                // 'mediaEmbed',   
                'insertTable', 
                'codeBlock', 
                'insertHorizontalRule', 
                'specialCharacters', 
                'emoji',
                'customButton',
            ]
        })
        .then(editor => {
           console.log('Successful!');
           
        })
        .catch(error => {
            console.error(error);
        });
    });

    // Content Show Hide
    $(document).ready(function() {
        $(".show-more-btn").click(function() {
            var content = $(this).prev(".content-text");
            var currentMaxHeight = parseInt(content.css("max-height"));

            var maxHeightInPixels = 128; 
            if (currentMaxHeight === maxHeightInPixels) {
                console.log('Helo');
                content.css("max-height", "none");
                $(this).text("Show Less");
            } else {
                console.log('Hello');
                content.css("max-height", maxHeightInPixels + "px");
                $(this).text("Show More");
            }
        });
    });    

</script>
{{-- CK Editor start--}}

{{--========== Data Model ===========--}}
<script>    
    $(document).ready(function() {
        $('.blog_update')
            .hide()
            .find('input, select')
            .prop('disabled', true)
            .css('background-color', '#efefec');

        $('.blog_edit').on('click', function() {
            var Id = $(this).data('id');

            $('#blog_update_'+Id).show()
                .find('input, select')
                .prop('disabled', false)
                .css('background-color', '');

            $('#blog_show_'+Id).hide();

            // if (Id) {
            //     $.ajax({
            //         url: "{{ route('com.blog.update', '') }}/" + Id,
            //         type: "PUT",
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Set CSRF token if needed
            //         },
            //         data: {
            //             'id': Id
            //         },
            //         dataType: "json",
            //         success: function(data) {
            //             console.log("Data received:", data);
            //             // Handle successful response here if needed
            //         },
            //         error: function(xhr, status, error) {
            //             console.error('AJAX request failed:', error);
            //         }
            //     });
            // }
        });
    });

       
</script>
{{--========== Data Model ===========--}}
@endsection