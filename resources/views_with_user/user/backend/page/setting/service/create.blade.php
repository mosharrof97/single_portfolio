@extends('user.backend.partial.layout')

@section('title')
    <span>Our Service</span>
@endsection
@section('content')
    <style>

    </style>

    <div class="page-body page-content">
        <div class="container-xl">
            <form action="{{ route('user.service.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="gap-3 col-md-9">
                        <div class="card mb-2">
                            <div class="card-body">
                                <h4>Create service Post</h4>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="form-body">
                                    <div class="mb-3 position-relative">
                                        <label for="name" class="form-label required">Title</label>
                                        <input class="form-control" placeholder="Post title" required="required"
                                            name="name" value="" type="text" id="name">

                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 position-relative">
                                        <label for="desc" class="form-label required">Description</label>

                                        <textarea class="form-control" cols="10" rows="8" placeholder="Write your description" required="required"
                                            id="desc" name="desc" cols="50" aria-required="true" style=""></textarea>

                                        @error('desc')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 gap-3 d-flex flex-column-reverse flex-md-column mb-md-0 mb-5">
                        <div class="card mb-2">
                            <div class="card-header">
                                <h4 class="card-title">
                                    Publish
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="btn-list">
                                    <button class="btn btn-primary" type="submit" value="apply" name="submitter">
                                        <i class="far fa-save me-1" style="font-size: 17px"></i>
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-2">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <label for="status" class="form-label required">Status</label>
                                </h4>
                            </div>
                            <div class=" card-body">
                                <select class="form-control form-select" required="required" id="status" name="status"
                                    aria-required="true">
                                    <option value="2">Published </option>
                                    <option value="0">Draft</option>
                                    <option value="1">Unpublished
                                    </option>
                                </select>

                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <label for="icon" class="form-label">Image</label>
                                </h4>
                            </div>
                            <div class=" card-body">
                                <div class="">
                                    <input type="file" id="icon" name="icon" class="form-control mb-2">

                                    @error('icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div style="width: 8rem" class=" mb-1">
                                    <div id="" style="">
                                        <img style="width: 100%;" id="image_preview" src="" alt="Preview image">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Content --}}
    {{-- <script>
        $(document).ready(function() {
            const maxLength = 2000;
    
            ClassicEditor.create(document.querySelector('#content'), {
                toolbar: [
                    // 'heading',
                    'undo', 
                    'redo', 
                    // 'bold', 
                    // 'italic', 
                    // 'underline',
                    // 'strikethrough', 
                    // 'superscript', 
                    // 'subscript', 
                    // 'fontColor', 
                    // 'fontBackgroundColor', 
                    // 'alignment', 
                    // 'blockQuote', 
                    // 'link', 
                ]
            })
            .then(editor => {
                
            })
            .catch(error => {
                console.error(error); 
            });
        });
    </script> --}}
    {{-- Content End --}}
    {{-- Image --}}
    <script>
        $(document).ready(function() {
            $("#image").change(function() {
                const file = this.files[0];
                if (this.files[0].size > 100000) {

                    Swal.fire(
                        'Warning', 'Please upload jpg or jpeg image less than 100kb!', 'Warning'
                    );
                    $(this).val('');
                    return false;
                }
                var val = $(this).val();
                var validfile = 0;
                switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
                    case 'jpg':
                    case 'jpeg':
                        validfile = 1;
                        break;
                    default:
                        validfile = 2;
                        break;
                }
                if (validfile == 2) {
                    Swal.fire(
                        'Warning', 'Please upload jpg or jpeg image format!', 'Warning'
                    );
                    $(this).val('');
                    return false;
                }
                if (file && validfile != 0 && validfile != 2) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#image_preview")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        })
    </script>
    {{-- Image --}}
@endsection
