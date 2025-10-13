@extends('backend.partial.layout')

@section('content')
    <div class="card" id="contantCard">
        <div class="card-header">
            <div class="card-certification" style="">
                Professional Certification Summary
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
                            $(`#certification_view_${Id}`).show();
                            $(`#edit-tools_${Id}`).show();
                            $(`#certification_edit_${Id}`).hide().find('input, select, textarea').prop('disabled', true);
                        }

                        // Edit button click handler
                        $('.edit_btn').click(function() {
                            const Id = $(this).data('id');

                            $(`#certification_view_${Id}, #edit-tools_${Id}`).hide();
                            $(`#certification_edit_${Id}`).show().find('input, select, textarea').prop('disabled',
                                false);

                        });

                        // Cancel button click handler
                        $('.btn-cancel').click(function() {
                            const Id = $(this).data('id');
                            initializeForm(Id);
                        });
                    });
                </script>


                @foreach ($certification as $key => $data)
                    <div class="d-flex justify-content-between mt-3 mb-2">
                        <h3>certification {{ $key + 1 }} </h3>
                        <div class="edit-tools" id="edit-tools_{{ $data->id }}" style="">
                            <button class="btn btn-primary edit_btn" id="upd_edit_btn_{{ $data->id }}"
                                data-id="{{ $data->id }}" aria-label="Edit certification"><i
                                    class="icon-pencil-o"></i>Edit</button>
                            <button class="btn btn-danger" aria-label="Delete certification" data-bs-toggle="modal"
                                data-bs-target="#deletecertification_{{ $data->id }}">Delete</button>
                        </div>
                    </div>

                    <div class="modal fade" id="deletecertification_{{ $data->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="deletecertificationLabel_{{ $data->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-5">
                                    <h1 class="modal-certification fs-4" id="deletecertificationLabel_{{ $data->id }}">
                                        <i class="fas fa-trash-alt fa-lg me-1" style="color: #ff1605;"></i>DELETE</h1>

                                    <p class="mt-3">Are you sure, you want to delete this record?</p>

                                    <div class="text-end">
                                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                                        <a href="{{ route('certification.delete', $data->slug) }}"
                                            class="btn btn-danger">YES, DELETE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="certification_view" id="certification_view_{{ $data->id }}">
                        <div class="row">

                            <div class="col-md-6">
                                <label>Certification </label>
                                <p class="p">{{ $data->certification }}</p>
                            </div>

                            <div class="col-md-6">
                                <label for="">Institute</label>
                                <p class="p">{{ $data->institute }}</p>
                            </div>



                            <div class="col-md-6" id="">
                                <label for="">Location </label>
                                <p class="p">{{ $data->location }}</p>
                            </div>

                            <div class="col-md-6" id="">
                                <label for="">Duration </label>
                                <p class="p">{{ $data->start_date->format('d-M-Y') }} <span class="mx-4">to</span>
                                    {{ $data->end_date->format('d-M-Y') }}</p>

                            </div>

                            <div class="col-md-12">
                                <label for="">Desc</label>
                                <p class="p">{{ $data->desc }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="certification_edit" id="certification_edit_{{ $data->id }}" style="display: none">
                        <form action="{{ route('certification.update', $data->slug) }}" class="" id=""
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="certification">certification Title <span class="text-danger">*</span>
                                        @error('certification')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" required="required" class="form-control" name="certification"
                                        id="certification" value="{{ $data->certification }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="institute">Institute<span Required="Required" class="text-danger">*</span>
                                        @error('institute')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror

                                    </label>
                                    <input type="text" name="institute" id="institute" class="form-control"
                                        value="{{ $data->institute }}" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="desc">Desc </label>
                                    @error('desc')
                                        <span class="text-danger" id="">{{ $message }}</span>
                                    @enderror

                                    <textarea name="desc" id="desc" class="form-control" cols="10" rows="3" required>{{ $data->desc }}</textarea>

                                </div>

                                <div class="form-group col-md-6" id="">
                                    <label for="location">Location
                                        @error('location')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" id="location" name="location" class="form-control"
                                        placeholder="" value="{{ $data->location }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="country" id="yrsOfPass">
                                        <span>Country</span>
                                        <span Required="Required" class="text-danger">*</span>
                                        @error('country')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" id="country" name="country" class="form-control"
                                        placeholder="" value="{{ $data->country }}">

                                </div>

                                <div class="form-group col-md-6" id="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="start_date">start_date <span certification="Required"
                                                    class="text-danger">*</span>
                                                @error('start_date')
                                                    <span class="text-danger" id="">{{ $message }}</span>
                                                @enderror
                                            </label>
                                            <input type="date" class="form-control" name="start_date" id="start_date"
                                                placeholder="" value="{{ $data->start_date }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="end_date">end_date <span certification="Required"
                                                    class="text-danger">*</span>
                                                @error('end_date')
                                                    <span class="text-danger" id="">{{ $message }}</span>
                                                @enderror
                                            </label>
                                            <input type="date" class="form-control" name="end_date" id="end_date"
                                                placeholder="" value="{{ $data->end_date }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="text-end">
                                        <input type="submit" class="btn btn-primary"
                                            title="Save new certification information" value="Save">

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

            <div class="mt-5" id="div_aca" style="display: none">
                <div class="">
                    <div class="sub-header">
                        <div id="alertDiv_aca"></div>
                        <h3>certification Summary </h3>
                        <div class="edit-tools" style="display: none;"><button class="btn edit-btn"
                                aria-label="Edit certification"><i class="icon-pencil-o"></i>&nbsp;Edit</button><button
                                class="btn delete-btn" aria-label="Delete certification">&nbsp;Delete</button></div>
                    </div>
                    <form action="{{ route('certification') }}" class="" id="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="certification">certification Title <span class="text-danger">*</span>
                                    @error('certification')
                                        <span class="text-danger" id="">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" required="required" class="form-control" name="certification"
                                    id="certification" value="">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="institute">Institute<span Required="Required" class="text-danger">*</span>
                                    @error('institute')
                                        <span class="text-danger" id="">{{ $message }}</span>
                                    @enderror

                                </label>
                                <input type="text" name="institute" id="institute" class="form-control"
                                    value="" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="desc">Desc </label>

                                @error('desc')
                                    <span class="text-danger" id="">{{ $message }}</span>
                                @enderror

                                <textarea name="desc" id="desc" class="form-control" cols="10" rows="3" required></textarea>

                            </div>

                            <div class="form-group col-md-6" id="">
                                <label for="location">Location
                                    @error('location')
                                        <span class="text-danger" id="">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" id="location" name="location" class="form-control"
                                    placeholder="" value="">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="country" id="yrsOfPass">
                                    <span>Country</span>
                                    <span Required="Required" class="text-danger">*</span>
                                    @error('country')
                                        <span class="text-danger" id="">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" id="country" name="country" class="form-control" placeholder=""
                                    value="">

                            </div>

                            <div class="form-group col-md-6" id="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="start_date">start_date <span Required="Required"
                                                class="text-danger">*</span>
                                            @error('start_date')
                                                <span class="text-danger" id="">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input type="date" class="form-control" name="start_date" id="start_date"
                                            placeholder="" value="">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="end_date">end_date <span Required="Required"
                                                class="text-danger">*</span>
                                            @error('end_date')
                                                <span class="text-danger" id="">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input type="date" class="form-control" name="end_date" id="end_date"
                                            placeholder="" value="">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="text-end">
                                    <input type="submit" class="btn btn-primary"
                                        title="Save new certification information" value="Save">

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
            <!--</div>-->
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
