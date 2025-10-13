@extends('backend.partial.layout')

@section('content')
    <div class="card" id="contantCard">
        <div class="card-header">
            <div class="card-title" style="">
                Project
            </div>
        </div>
        <style>
            label {
                font-weight: 600 !important;
                color: #1a1a1a !important;
            }
        </style>

        <div class="card-body">
            <div id="commonForm_aca">


                <script>
                    $(document).ready(function() {
                        // Initialize form: Set default view and disable edit mode
                        function initializeForm(Id) {
                            $(`#project_view_${Id}`).show();
                            $(`#edit-tools_${Id}`).show();
                            $(`#project_edit_${Id}`).hide().find('input, select, textarea').prop('disabled', true);
                        }

                        // let oldurl = @json(old('url'));
                        // if(oldurl){
                        //     const Id = $('.edit_btn').data('id');
                        //     $(`#project_view_${Id}, #edit-tools_${Id}`).hide();
                        //     $(`#project_edit_${Id}`).show().find('input, select, textarea').prop('disabled', false);
                        // }

                        // Edit button click handler
                        $('.edit_btn').click(function() {
                            const Id = $(this).data('id');

                            $(`#project_view_${Id}, #edit-tools_${Id}`).hide();
                            $(`#project_edit_${Id}`).show().find('input, select, textarea').prop('disabled', false);

                        });

                        // Cancel button click handler
                        $('.btn-cancel').click(function() {
                            const Id = $(this).data('id');
                            initializeForm(Id);
                        });
                    });
                </script>

                @foreach ($projects as $key => $data)
                    <div class="modal fade" id="deleteproject_{{ $data->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteprojectLabel_{{ $data->id }}"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-5">
                                    <h1 class="modal-title fs-4" id="deleteprojectLabel_{{ $data->id }}"> <i
                                            class="fas fa-trash-alt fa-lg me-1" style="color: #ff1605;"></i>DELETE</h1>

                                    <p class="mt-3">Are you sure, you want to delete this record?</p>

                                    <div class="text-end">
                                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                                        <a href="{{ route('project.delete', $data->slug) }}"
                                            class="btn btn-danger">YES,
                                            DELETE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="project_view" id="project_view_{{ $data->id }}">
                        <div class="d-flex align-items-start mt-3 mb-2">
                            <h4 class="num-span me-1">{{ $key + 1 }}.</h4>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-between">
                                                <h4>{{ $data->title }} </h4>
                                                <div class="edit-tools" id="edit-tools_{{ $data->id }}" style="">
                                                    <button class="btn btn-primary edit_btn m-1"
                                                        id="upd_edit_btn_{{ $data->id }}" data-id="{{ $data->id }}"
                                                        aria-label="Edit project"><i class="icon-pencil-o"></i>Edit</button>
                                                    <button class="btn btn-danger m-1" aria-label="Delete project"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteproject_{{ $data->id }}">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-xl-2 col-sm-4 mb-4">
                                                    <img src="{{ asset('assets/img/user/project/' . $data->image) }}"
                                                        class="w-75" alt="">
                                                </div>

                                                <div class="col-xl-10 col-sm-8">
                                                    @if (!empty($data->date))
                                                        <div class="">
                                                            <p class="m-0"><b>Issued On: </b>
                                                                {{ $data->date->format('d-M-Y') }}</p>
                                                        </div>
                                                    @endif

                                                    @if (!empty($data->url))
                                                        <div class="">
                                                            <p class="m-0"><b>URL: </b> <a href="{{ $data->url }}"
                                                                    target="_blank" rel="noopener noreferrer"
                                                                    title="Open url another tab">{{ $data->url }}</a>
                                                            </p>
                                                        </div>
                                                    @endif

                                                    <div class="">
                                                        <span class="m-0">{{ $data->desc }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="project_edit" id="project_edit_{{ $data->id }}" style="display: none">
                        <form action="{{ route('project.update', $data->slug) }}" class="" id=""
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">

                                <div class="form-group col-md-12">
                                    <label for="title_{{ $data->id }}">Title<span class="text-danger">*</span>
                                        @error('title')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" class="form-control" name="title"
                                        id="title_{{ $data->id }}" value="{{ $data->title }}">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="date_{{ $data->id }}">Issued On
                                        @error('date')
                                            <span class="text-danger" id=""> {{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="date" class="form-control" name="date" id="date_{{ $data->id }}"
                                        value="{{ $data->date ? $data->date->format('Y-m-d') : '' }}">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="url_{{ $data->id }}">URL
                                        @error('url')
                                            <span class="text-danger" id=""> {{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" class="form-control" name="url"
                                        id="url_{{ $data->id }}" value="{{ $data->url }}">
                                </div>

                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="image_{{ $data->id }}">Image
                                                @error('image')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </label>
                                            <input type="file" class="form-control image-input" name="image"
                                                id="image_{{ $data->id }}">
                                            <input type="hidden" name="old_image" value="{{ $data->image }}">
                                        </div>
                                        <div class="col-md-4" id="image_preview_{{ $data->id }}">
                                            <img src="{{ asset($data->image ?? 'assets/img/about.jpg') }}" alt="No Image"
                                                width="100" id="preview_img_{{ $data->id }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="desc_{{ $data->id }}">Description<span class="text-danger">*</span>
                                        @error('desc')
                                            <span class="text-danger" id=""> {{ $message }}</span>
                                        @enderror
                                    </label>

                                    <textarea class="form-control" name="desc" id="desc_{{ $data->id }}" cols="10" rows="3">{{ $data->desc }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <div class="text-end">
                                        <input type="submit" class="btn btn-primary"
                                            title="Save new project information" value="Save">

                                        <button type="button" class="btn btn-warning btn-cancel"
                                            id="upd_cancel_btn_{{ $data->id }}" data-id="{{ $data->id }}"
                                            title="Click close to go back to edit resume without saving">Close</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <hr class="my-5" style="color:#a5a5a5;">

                    <script>
                        $(document).ready(function() {
                            $(".image-input").change(function(event) {
                                let input = event.target;
                                let reader = new FileReader();

                                reader.onload = function() {
                                    let imgId = "#preview_img_" + input.id.split('_')[1]; // Dynamic ID handling
                                    $(imgId).attr("src", reader.result).css("display", "block");
                                };

                                if (input.files && input.files[0]) {
                                    reader.readAsDataURL(input.files[0]);
                                }
                            });
                        });
                    </script>
                @endforeach
            </div>

            @if (count($projects) < 5)
                <div class="mt-5" id="div_aca" style="display: none">
                    <div class="">
                        <div class="sub-header">
                            <div id="alertDiv_aca"></div>
                            <h4>Project <b class="fst-italic" style="color:#525252;">(Max 5)</b></h4>
                            <div class="edit-tools" style="display: none;"><button class="btn edit-btn"
                                    aria-label="Edit project"><i class="icon-pencil-o"></i>&nbsp;Edit</button><button
                                    class="btn delete-btn" aria-label="Delete project">&nbsp;Delete</button></div>
                        </div>
                        <form action="{{ route('project') }}" class="" id="" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="form-group col-md-12">
                                    <label for="title">Title<span class="text-danger">*</span>
                                        @error('title')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="{{ old('title') }}">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="date">Issued On
                                        @error('date')
                                            <span class="text-danger" id=""> {{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="date" class="form-control" name="date" id="date"
                                        value="{{ old('date') ? \Carbon\Carbon::parse(old('date'))->format('Y-m-d') : '' }}">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="url">URL
                                        @error('url')
                                            <span class="text-danger" id=""> {{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" class="form-control" name="url" id="url"
                                        value="{{ old('url') }}">
                                </div>

                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="image">Image
                                                @error('image')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </label>
                                            <input type="file" class="form-control image-input" name="image"
                                                id="image">
                                        </div>
                                        <div class="col-md-4" id="image_preview">
                                            <img src="{{ asset('assets/img/about.jpg') }}" alt="No Image" width="100"
                                                id="preview_img">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="desc">Description<span class="text-danger">*</span>
                                        @error('desc')
                                            <span class="text-danger" id=""> {{ $message }}</span>
                                        @enderror
                                    </label>
                                    <textarea class="form-control" name="desc" id="desc" cols="10" rows="3">{{ old('desc') }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <div class="text-end">
                                        <input type="submit" class="btn btn-primary"
                                            title="Save new project information" value="Save">

                                        <button type="button" class="btn btn-warning" id="btnRemove_aca"
                                            title="Click close to go back to edit resume without saving">Close</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="div_acaa">
                    <button class="btn btn-success mt-3" id="btnAdd_aca"><i class="icon-plus"></i>&nbsp;Add data (If
                        Required)</button>
                </div>
            @endif
        </div>
    </div>



    <script>
        $(document).ready(function() {

            // // let oldName = @json(old('name'));
            // let oldName = $('#name');
            // if ($('#name').val().trim() !== '') {
            //     $('#div_aca').show().find('input, select, textarea').prop('disabled', false);
            //     $('#btnAdd_aca').prop('disabled', true);
            // } else {
            //     $('#div_aca').hide().find('input, select, textarea').prop('disabled', true);
            // }
            $('#div_aca').css('display', 'none').hide().find('input, select, textarea').prop('disabled', true);
            $('#btnAdd_aca').click(function() {
                $('#div_aca').css('display', 'block').show().find('input, select, textarea').prop(
                    'disabled', false);
                $('#btnAdd_aca').hide().prop('disabled', true);
            });

            $('#btnRemove_aca').click(function() {
                $('#div_aca').css('display', 'none').hide().find('input, select, textarea').prop('disabled',
                    true);
                $('#btnAdd_aca').show().prop('disabled', false);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".image-input").change(function(event) {
                let input = event.target;
                let reader = new FileReader();

                reader.onload = function() {
                    let imgId = "#preview_img";
                    $(imgId).attr("src", reader.result).css("display", "block");
                };

                if (input.files && input.files[0]) {
                    reader.readAsDataURL(input.files[0]);
                }
            });
        });
    </script>
@endsection
