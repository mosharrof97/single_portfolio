@extends('user.backend.partial.layout')

@section('content')
<div class="card" id="contantCard">
    <div class="card-header">
        <div class="card-title" style="">
            Category
        </div>
    </div>
    <style>
        label {
            font-weight: 600 !important;
            color: #1a1a1a !important;
        }

        .p {
            font-size: 13px;
        }

    </style>

    <div class="card-body">
        <div id="commonForm_aca">
            <script>
                $(document).ready(function() {
                    // Initialize form: Set default view and disable edit mode
                    function initializeForm(Id) {
                        $(`#category_view_${Id}`).show();
                        $(`#edit-tools_${Id}`).show();
                        $(`#category_edit_${Id}`).hide().find('input, select, textarea').prop('disabled', true);
                    }

                    // Edit button click handler
                    $('.edit_btn').click(function() {
                        const Id = $(this).data('id');

                        $(`#category_view_${Id}, #edit-tools_${Id}`).hide();
                        $(`#category_edit_${Id}`).show().find('input, select, textarea').prop('disabled', false);

                    });

                    // Cancel button click handler
                    $('.btn-cancel').click(function() {
                        const Id = $(this).data('id');
                        initializeForm(Id);
                    });
                });

            </script>

            @foreach ($categorys as $key => $data)
            <div class="d-flex justify-content-between mt-3 mb-2">
                <h3>category {{ $key + 1 }} </h3>
                <div class="edit-tools" id="edit-tools_{{ $data->id }}" style="">
                    <button class="btn btn-primary edit_btn" id="upd_edit_btn_{{ $data->id }}" data-id="{{ $data->id }}" aria-label="Edit category"><i class="icon-pencil-o"></i>Edit</button>
                    <button class="btn btn-danger" aria-label="Delete category" data-bs-toggle="modal" data-bs-target="#deletecategory_{{ $data->id }}">Delete</button>
                </div>
            </div>

            <div class="modal fade" id="deletecategory_{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deletecategoryLabel_{{ $data->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-5">
                            <h1 class="modal-title fs-4" id="deletecategoryLabel_{{ $data->id }}"> <i class="fas fa-trash-alt fa-lg me-1" style="color: #ff1605;"></i>DELETE</h1>

                            <p class="mt-3">Are you sure, you want to delete this record?</p>

                            <div class="text-end">
                                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                                <a href="{{ route('user.category.delete', $data->slug) }}" class="btn btn-danger">YES,
                                    DELETE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="category_view" id="category_view_{{ $data->id }}">
                <div class="row">

                    <div class="col-md-6">
                        <label>category </label>
                        <p class="p">{{ $data->category }}</p>
                    </div>
                    <div class="col-md-6">
                        <label>Total Blogs </label>
                        <p class="p">{{ $data->blog->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="category_edit" id="category_edit_{{ $data->id }}" style="display: none">
                <form action="{{ route('user.category.update', $data->slug) }}" class="" id="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="category">category<span class="text-danger">*</span>
                                @error('category')
                                <span class="text-danger" id="">{{ $message }}</span>
                                @enderror
                            </label>
                            <input type="text" required="required" class="form-control" name="category" id="category" value="{{ $data->category }}">
                        </div>

                        <div class="col-md-12">
                            <div class="text-end">
                                <input type="submit" class="btn btn-primary" title="Save new category information" value="Save">

                                <button type="button" class="btn btn-warning btn-cancel" id="upd_cancel_btn_{{ $data->id }}" data-id="{{ $data->id }}" title="Click close to go back to edit resume without saving">Close</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @endforeach
        </div>

        {{-- @if (count($categorys)) --}}
        <div class="mt-5" id="div_aca" style="display: none">
            <div class="">
                <div class="sub-header">
                    <div id="alertDiv_aca"></div>
                    <h3>category </h3>
                    <div class="edit-tools" style="display: none;">
                        <button class="btn edit-btn" aria-label="Edit category"><i class="icon-pencil-o"></i>&nbsp;Edit</button>
                        <button class="btn delete-btn" aria-label="Delete category">&nbsp;Delete</button>
                    </div>
                </div>
                <form action="{{ route('user.category') }}" class="" id="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="category">category<span class="text-danger">*</span>
                                @error('category')
                                <span class="text-danger" id="">{{ $message }}</span>
                                @enderror
                            </label>
                            <input type="text" required="required" class="form-control" name="category" id="category" value="">
                        </div>

                        <div class="col-md-12">
                            <div class="text-end">
                                <input type="submit" class="btn btn-primary" title="Save new category information" value="Save">

                                <button type="button" class="btn btn-warning" id="btnRemove_aca" title="Click close to go back to edit resume without saving">Close</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div id="div_acaa">
            <button class="btn btn-success mt-5" id="btnAdd_aca"><i class="icon-plus"></i>&nbsp;Add data (If Required)</button>
        </div>
        {{-- @endif --}}
    </div>
</div>



<script>
    $(document).ready(function() {
        $('#div_aca').css('display', 'none').hide().find('input, select, textarea').prop('disabled', true);
        $('#btnAdd_aca').click(function() {
            $('#div_aca').css('display', 'block').show().find('input, select, textarea').prop(
                'disabled', false);
            $('#btnAdd_aca').prop('disabled', true);
        });

        $('#btnRemove_aca').click(function() {
            $('#div_aca').css('display', 'none').hide().find('input, select, textarea').prop('disabled'
                , true);
            $('#btnAdd_aca').prop('disabled', false);
        });
    });

</script>
@endsection
