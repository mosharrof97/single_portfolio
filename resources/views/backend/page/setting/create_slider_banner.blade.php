@extends('backend.partial.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Home Slider Form</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <span class="text-success">{{ session('success') }}</span>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <span class="text-danger">{{ session('error') }}</span>
                        </div>
                    @endif
                    <form action="{{ route('user.slider.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="title">Slider Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="">

                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="sub_title">Slider Sub Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="">

                                @error('sub_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="image">Slider Image<span class="text-danger">*</span> </label>
                                <span class="text-danger" style="font-size: 12px">(Image upload only PNG, JPG, JPEG and
                                    Image
                                    size less then 1MB )</span>{{-- and Width: 1920px, Height:780px --}}
                                <input type="file" class="form-control" id="image" name="image" placeholder="">

                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="desc">Slider Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="desc" id="desc" cols="10" rows="3"></textarea>

                                @error('desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- {{ asset('Upload/com_frontend/slider/'.$slider->image) }} --}}
                            <div class="col-md-6 form-group">
                                <img id="image-preview" src="" alt="Slider Preview"
                                    style=" max-width: 200px; max-height: 200px; border:2px solid rgb(199, 199, 199); padding:5px;" />
                            </div>

                            <div class="col-md-12 form-group text-end">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Home Slider</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Sub Title</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $key => $data)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td class="text-start">{{ $data->title }}</td>
                                        <td class="text-start">{{ $data->sub_title }}</td>
                                        <td class="text-start">{{ $data->desc }}</td>
                                        <td class="text-start">
                                            <img src="{{ asset('assets/img/user/slider/' . $data->image) }}" alt=""
                                                class="border border-2" width="100" height="50">
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal"
                                                data-bs-target="#sliderForm">
                                                Edit
                                            </button>
                                            <a href="{{ route('user.slider.delete', $data->id) }}"
                                                class="btn btn-danger m-1"> delete</a>
                                        </td>
                                    </tr>

                                    {{-- =========== Modal ============ --}}
                                    <div class="modal fade" id="sliderForm" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="sliderFormLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="sliderFormLabel">Slider edit</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('user.slider.update') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="slider_id"
                                                            value="{{ $data->id }}">
                                                        <div class="row">
                                                            <div class="col-md-6 form-group">
                                                                <label for="title{{ $data->id }}">Slider Title<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    id="title{{ $data->id }}" name="title"
                                                                    value="{{ $data->title }}">

                                                                @error('title')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 form-group">
                                                                <label for="sub_title{{ $data->id }}">Slider Sub
                                                                    Title<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    id="sub_title{{ $data->id }}" name="sub_title"
                                                                    value="{{ $data->sub_title }}">

                                                                @error('sub_title')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 form-group">
                                                                <label for="image{{ $data->id }}">Slider Image<span
                                                                        class="text-danger">*</span></label>
                                                                <span class="text-danger" style="font-size: 12px">(Image
                                                                    upload only PNG, JPG, JPEG and Image size less then
                                                                    1MB)</span>
                                                                <input type="file" class="form-control edit-image"
                                                                    id="image{{ $data->id }}" name="image"
                                                                    value="{{ $data->id }}">
                                                                <input type="hidden" class="form-control"
                                                                    id="old_image{{ $data->id }}" name="old_image"
                                                                    value="{{ $data->image }}">


                                                                @error('image')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 form-group">
                                                                <label for="desc{{ $data->id }}">Slider
                                                                    Description<span class="text-danger">*</span></label>
                                                                <textarea class="form-control" name="desc" id="desc{{ $data->id }}" cols="10" rows="3">{{ $data->desc }}</textarea>

                                                                @error('desc')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                                <img id="image-preview{{ $data->id }}"
                                                                    class="edit-image-preview"
                                                                    src="{{ asset('assets/img/user/slider/' . $data->image) }}"
                                                                    alt="Slider Preview"
                                                                    style=" max-width: 200px; max-height: 200px; border:2px solid rgb(199, 199, 199); padding:5px;" />
                                                            </div>

                                                            <div class="col-md-12 form-group text-end">
                                                                <input type="submit" class="btn btn-primary"
                                                                    value="Submit">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Page Bannar</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.banner') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (!empty($banner) && $banner->id)
                            @method('PUT')
                        @endif
                        <input type="hidden" name="banner_id" value="{{ !empty($banner) ? $banner->id : '' }}">

                        <div class="row align-items-end">
                            <div class="col-md-6 form-group">
                                <label for="banner">Slider Image<span class="text-danger">*</span></label>
                                <span class="text-danger" style="font-size: 12px">(Image
                                    upload only JPG, JPEG and Image size less then
                                    3MB and Width: 1920px, Height:780px)</span>

                                <input type="file" class="form-control" id="banner" name="image"
                                    placeholder="">

                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                @if ($banner && $banner->image)
                                    <img id="banner-preview"
                                        src="{{ asset('assets/img/user/banner/' . $banner->image) }}"
                                        alt="Slider Preview" class="w-50"
                                        style="max-height: 50px; border:2px solid rgb(199, 199, 199); padding:5px;" />
                                @else
                                    <img id="banner-preview" src="{{ asset('path/to/placeholder-image.jpg') }}"
                                        alt="No Image Available" class="w-50"
                                        style="max-height: 50px; border:2px solid rgb(199, 199, 199); padding:5px;" />
                                @endif
                            </div>

                            <div class="col-md-12 form-group text-end">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </form>
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


            $('.edit-image').on('change', function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.edit-image-preview').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('.edit-image-preview').hide();
                }
            });
        });

        $(document).ready(function() {
            $('#banner').on('change', function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#banner-preview').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#banner-preview').hide();
                }
            });
        });
    </script>
@endsection
