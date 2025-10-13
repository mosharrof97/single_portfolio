@extends('backend.partial.layout')

@section('content')
    <div class="card" id="contantCard">
        <div class="card-header">
            <div class="card-title" style="">
                language
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
                            $(`#language_view_${Id}`).show();
                            $(`#edit-tools_${Id}`).show();
                            $(`#language_edit_${Id}`).hide().find('input, select, textarea').prop('disabled', true);
                        }

                        // Edit button click handler
                        $('.edit_btn').click(function() {
                            const Id = $(this).data('id');

                            $(`#language_view_${Id}, #edit-tools_${Id}`).hide();
                            $(`#language_edit_${Id}`).show().find('input, select, textarea').prop('disabled', false);

                        });

                        // Cancel button click handler
                        $('.btn-cancel').click(function() {
                            const Id = $(this).data('id');
                            initializeForm(Id);
                        });
                    });
                </script>

                @foreach ($languages as $key => $data)
                    <div class="d-flex justify-content-between mt-3 mb-2">
                        <h3>Language {{ $key + 1 }} </h3>
                        <div class="edit-tools" id="edit-tools_{{ $data->id }}" style="">
                            <button class="btn btn-primary edit_btn" id="upd_edit_btn_{{ $data->id }}"
                                data-id="{{ $data->id }}" aria-label="Edit language"><i
                                    class="icon-pencil-o"></i>Edit</button>
                            <button class="btn btn-danger" aria-label="Delete language" data-bs-toggle="modal"
                                data-bs-target="#deletelanguage_{{ $data->id }}">Delete</button>
                        </div>
                    </div>

                    <div class="modal fade" id="deletelanguage_{{ $data->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="deletelanguageLabel_{{ $data->id }}"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-5">
                                    <h1 class="modal-title fs-4" id="deletelanguageLabel_{{ $data->id }}"> <i
                                            class="fas fa-trash-alt fa-lg me-1" style="color: #ff1605;"></i>DELETE</h1>

                                    <p class="mt-3">Are you sure, you want to delete this record?</p>

                                    <div class="text-end">
                                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                                        <a href="{{ route('language.delete', $data->slug) }}"
                                            class="btn btn-danger">YES,
                                            DELETE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="language_view" id="language_view_{{ $data->id }}">
                        <div class="row">

                            <div class="col-md-6">
                                <label>Language </label>
                                <p class="p">{{ $data->language }}</p>
                            </div>

                            <div class="col-md-6">
                                <label>Reading </label>
                                <p class="p">{{ $data->reading }}</p>
                            </div>

                            <div class="col-md-6">
                                <label>Writing </label>
                                <p class="p">{{ $data->writing }}</p>
                            </div>

                            <div class="col-md-6">
                                <label>Speaking </label>
                                <p class="p">{{ $data->speaking }}</p>
                            </div>


                        </div>
                    </div>

                    <div class="language_edit" id="language_edit_{{ $data->id }}" style="display: none">
                        <form action="{{ route('language.update', $data->slug) }}" class="" id=""
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="language">language<span class="text-danger">*</span>
                                        @error('language')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" required="required" class="form-control" name="language"
                                        id="language" value="{{ $data->language }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="reading">Reading<span class="text-danger">*</span>
                                        @error('reading')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <select required="required" class="form-control" name="reading" id="reading">
                                        <option value="">Select</option>
                                        <option value="High" {{ $data->reading == 'High' ? 'selected' : '' }}>High
                                        </option>
                                        <option value="Medium" {{ $data->reading == 'Medium' ? 'selected' : '' }}>Medium
                                        </option>
                                        <option value="Low" {{ $data->reading == 'Low' ? 'selected' : '' }}>Low</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="writing">Writing<span class="text-danger">*</span>
                                        @error('writing')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <select required="required" class="form-control" name="writing" id="writing">
                                        <option value="">Select</option>
                                        <option value="High" {{ $data->writing == 'High' ? 'selected' : '' }}>High
                                        </option>
                                        <option value="Medium" {{ $data->writing == 'Medium' ? 'selected' : '' }}>Medium
                                        </option>
                                        <option value="Low" {{ $data->writing == 'Low' ? 'selected' : '' }}>Low</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="speaking">Speaking<span class="text-danger">*</span>
                                        @error('speaking')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <select required="required" class="form-control" name="speaking" id="speaking">
                                        <option value="">Select</option>
                                        <option value="High" {{ $data->speaking == 'High' ? 'selected' : '' }}>High
                                        </option>
                                        <option value="Medium" {{ $data->speaking == 'Medium' ? 'selected' : '' }}>Medium
                                        </option>
                                        <option value="Low" {{ $data->speaking == 'Low' ? 'selected' : '' }}>Low
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <div class="text-end">
                                        <input type="submit" class="btn btn-primary"
                                            title="Save new language information" value="Save">

                                        <button type="button" class="btn btn-warning btn-cancel"
                                            id="upd_cancel_btn_{{ $data->id }}" data-id="{{ $data->id }}"
                                            title="Click close to go back to edit resume without saving">Close</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>

            @if (count($languages) < 3)
                <div class="mt-5" id="div_aca" style="display: none">
                    <div class="">
                        <div class="sub-header">
                            <div id="alertDiv_aca"></div>
                            <h3>Language </h3>
                            <div class="edit-tools" style="display: none;"><button class="btn edit-btn"
                                    aria-label="Edit language"><i class="icon-pencil-o"></i>&nbsp;Edit</button><button
                                    class="btn delete-btn" aria-label="Delete language">&nbsp;Delete</button></div>
                        </div>
                        <form action="{{ route('language') }}" class="" id="" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="language">language<span class="text-danger">*</span>
                                        @error('language')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" required="required" class="form-control" name="language"
                                        id="language" value="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="reading">Reading<span class="text-danger">*</span>
                                        @error('reading')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <select required="required" class="form-control" name="reading" id="reading">
                                        <option value="">Select</option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="writing">Writing<span class="text-danger">*</span>
                                        @error('writing')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <select required="required" class="form-control" name="writing" id="writing">
                                        <option value="">Select</option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="speaking">Speaking<span class="text-danger">*</span>
                                        @error('speaking')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <select required="required" class="form-control" name="speaking" id="speaking">
                                        <option value="">Select</option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <div class="text-end">
                                        <input type="submit" class="btn btn-primary"
                                            title="Save new language information" value="Save">

                                        <button type="button" class="btn btn-warning" id="btnRemove_aca"
                                            title="Click close to go back to edit resume without saving">Close</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="div_acaa">
                    <button class="btn btn-success mt-5" id="btnAdd_aca"><i class="icon-plus"></i>&nbsp;Add data (If
                        Required)</button>
                </div>
            @endif
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
                $('#div_aca').css('display', 'none').hide().find('input, select, textarea').prop('disabled',
                    true);
                $('#btnAdd_aca').prop('disabled', false);
            });
        });
    </script>
@endsection
