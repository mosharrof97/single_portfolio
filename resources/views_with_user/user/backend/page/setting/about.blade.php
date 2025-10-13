@extends('Admin-panel.Partial.Layout')
@section('title')
    About Us
@endsection
@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">About form</h4> 
                </div>
                <div class="card-body">
                    @include('components.message')
                    <form action="{{ route('admin.about') }}" id="form" method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($about)
                            @method('PUT')
                        @endif
                        <input type="hidden" name="about_id" value="{{ $about ? $about->id : '' }}">
                        <div class="row  p-3 align-items-end">
                            <div class="col-md-12 form-group">
                                <label for="title">About Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{ $about ? $about->title : '' }}">
                                
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="row align-items-end">
                                    <div class="col-xxl-9 col-md-8 form-group">
                                        <label for="image">About Image<span class="text-danger">*</span> </label>
                                        <span class="text-danger">( Image upload only JPG, JPEG and Image size less then
                                            3MB and Width: 800px, Height:800px )</span>
                                        <input type="file" class="form-control" id="image" name="image" placeholder="">
                                        <input type="hidden" name="old_image" value="{{ $about ? $about->image : ''}}">
                                        
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xxl-3 col-md-4 form-group">
                                        <img id="image-preview" src="{{ asset($about && $about->image ? 'assets/img/admin/about/'.$about->image : '') }}" alt="Preview"
                                                        style=" max-width: 100px; max-height: 100px; border:2px solid rgb(199, 199, 199); padding:5px;" />
                                    </div>
                                </div>  
                            </div>  
                            
                            <style>
                                #sub_title_Count, #charCount {
                                    font-weight: bold;
                                    color: green;
                                }

                                .exceeded {
                                    color: red;
                                }
                            </style>

                            <div class="col-md-12 form-group">
                                <label for="sub_title">About sub title</label>
                                <textarea name="sub_title" class="form-control" id="sub_title" cols="30" rows="10">{{ $about ? $about->sub_title : '' }}</textarea>
                                <div>
                                    <span id="sub_title_Count">0</span>/100 characters
                                </div>
                                @error('sub_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="desc">About Desc</label>
                                <textarea name="desc" class="form-control" id="desc" cols="30" rows="10">{{ $about ? $about->desc : '' }}</textarea>
                                <div>
                                    <span id="charCount">0</span>/2000 characters
                                </div>
                                @error('desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="submit" id="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script> --}}
<script>
    // Image 1
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
    });

</script>

{{-- CK Editor start--}}
<script>
    $(document).ready(function() {
        const maxLength = 2000;

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
            const initialCharCount = editor.getData().replace(/<[^>]*>/g, '').length;
            $('#charCount').text(initialCharCount); 

            editor.model.document.on('change:data', function() {
                const charCount = editor.getData().replace(/<[^>]*>/g, '').length;
                $('#charCount').text(charCount); 

                console.log(charCount); 

             
                if (charCount > maxLength) {
                    let content = editor.getData().replace(/<[^>]*>/g, '').substring(0, maxLength); 
                    editor.setData(content); 
                    $('#charCount').text(maxLength); 
                }

                if (charCount > maxLength) {
                    $('#charCount').addClass('exceeded');
                } else {
                    $('#charCount').removeClass('exceeded');
                }
            });
        })
        .catch(error => {
            console.error(error); 
        });
    });
</script>

<script>
    $(document).ready(function() {
        const maxLength = 100;

        ClassicEditor.create(document.querySelector('#sub_title'), {
            toolbar: [
                'heading',
                'bold', 
                'italic', 
                'underline',
                'strikethrough', 
                'superscript', 
                'subscript', 
                'fontColor', 
                'fontBackgroundColor', 
                'alignment', 
                'blockQuote', 
                'link', 
            ]
        })
        .then(editor => {
            const initialSubTitleCount = editor.getData().replace(/<[^>]*>/g, '').length;
            $('#sub_title_Count').text(initialSubTitleCount); 
            
            editor.model.document.on('change:data', function() {
                const sub_title_Count = editor.getData().replace(/<[^>]*>/g, '').length;
                $('#sub_title_Count').text(sub_title_Count); 

                console.log(sub_title_Count); 
                
                if (sub_title_Count > maxLength) {
                    let content = editor.getData().replace(/<[^>]*>/g, '').substring(0, maxLength); 
                    editor.setData(content); 
                    // editor.execute('undo'); 
                    $('#sub_title_Count').text(maxLength); 
                }

                if (sub_title_Count > maxLength) {
                    $('#sub_title_Count').addClass('exceeded');
                } else {
                    $('#sub_title_Count').removeClass('exceeded');
                }
            });
        })
        .catch(error => {
            console.error(error); 
        });
    });
</script>

{{-- CK Editor start--}}

<script>
    $(document).ready(function() {
        $('#submit').on('click', function(){
            $('#submit').props('disabled', true);
        })
    })
</script>


@endsection