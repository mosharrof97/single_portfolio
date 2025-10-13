@extends('backend.partial.layout')

@section('content')
    <div class="card" id="contantCard">
        <div class="card-header">
            <div class="card-title" style="">
                Address Details
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
                            $(`#experience_view_${Id}`).show();
                            $(`#edit-tools_${Id}`).show();
                            $(`#experience_edit_${Id}`).hide().find('input, select, textarea').prop('disabled', true);
                        }

                        // Edit button click handler
                        $('.edit_btn').click(function() {
                            const Id = $(this).data('id');

                            $(`#experience_view_${Id}, #edit-tools_${Id}`).hide();
                            $(`#experience_edit_${Id}`).show().find('input, select, textarea').prop('disabled', false);

                        });

                        // Cancel button click handler
                        $('.btn-cancel').click(function() {
                            const Id = $(this).data('id');
                            initializeForm(Id);
                        });
                    });
                </script>

                <script>
                    $(document).ready(function() {
                        let Id = $('input[name="from_date"]').data('id');
                        let currentDate = new Date();
                        currentDate.setDate(currentDate.getDate() + 1);
                        let formattedDate = currentDate.toISOString().split('T')[0];

                        $('#to_date_' + Id).show().prop('disabled', false);
                        $('#current_date_' + Id).hide().prop('disabled', true);

                        if ($('#is_continue_' + Id).is(':checked')) {
                            $('#to_date_' + Id).hide().prop('disabled', true);
                            $('#current_date_' + Id).show().prop('disabled', false);
                            $('#current_date_' + Id).val(formattedDate)
                        } else {
                            $('#to_date_' + Id).show().prop('disabled', false);
                            $('#current_date_' + Id).hide().prop('disabled', true);
                        }

                        $('#is_continue_' + Id).click(function() {
                            if ($('#is_continue_' + Id).is(':checked')) {
                                $('#to_date_' + Id).hide().prop('disabled', true);
                                $('#current_date_' + Id).show().prop('disabled', false);
                                $('#current_date_' + Id).val(formattedDate)
                            } else {
                                $('#to_date_' + Id).show().prop('disabled', false);
                                $('#current_date_' + Id).hide().prop('disabled', true);
                            }
                        })


                        $('input[name="from_date"], input[name="is_continue"]').on('change', function() {
                            let fromDate = $('input[name="from_date"]').val();
                            let toDate = $('input[name="to_date"]').val();

                            if (fromDate) {
                                let startDate = new Date(fromDate);
                                let endDate;

                                if (toDate) {
                                    endDate = new Date(toDate);
                                } else {
                                    let currentDate = new Date();
                                    currentDate.setDate(currentDate.getDate() + 1);
                                    endDate = currentDate;
                                }

                                let yearsDifference = endDate.getFullYear() - startDate.getFullYear();
                                let monthsDifference = endDate.getMonth() - startDate.getMonth();

                                let totalMonths = yearsDifference * 12 + monthsDifference;

                                if (totalMonths < 0) {
                                    totalMonths = 0;
                                }
                                $('#exp_area_year_' + Id).val(totalMonths);
                            }
                        });

                        $('input[name="to_date"]').on('change', function() {
                            let fromDate = $('input[name="from_date"]').val();
                            let toDate = $('input[name="to_date"]').val();

                            if (fromDate && toDate) {
                                let startDate = new Date(fromDate);
                                let endDate = new Date(toDate);

                                let yearsDifference = endDate.getFullYear() - startDate.getFullYear();
                                let monthsDifference = endDate.getMonth() - startDate.getMonth();

                                let totalMonths = yearsDifference * 12 + monthsDifference;

                                if (totalMonths < 0) {
                                    totalMonths = 0;
                                }
                                $('#exp_area_year_' + Id).val(totalMonths);
                            }
                        });

                        $('input[name="is_continue"]').on('change', function() {
                            var isChecked = $(this).is(':checked');

                            let fromDate = $('input[name="from_date"]').val();
                            let toDate = $('input[name="to_date"]').val();
                            if (isChecked) {
                                if (fromDate) {
                                    let startDate = new Date(fromDate);

                                    let currentDate = new Date();
                                    currentDate.setDate(currentDate.getDate() + 1);
                                    let endDate = currentDate;


                                    let yearsDifference = endDate.getFullYear() - startDate.getFullYear();
                                    let monthsDifference = endDate.getMonth() - startDate.getMonth();

                                    let totalMonths = yearsDifference * 12 + monthsDifference;

                                    if (totalMonths < 0) {
                                        totalMonths = 0;
                                    }
                                    $('#exp_area_year_' + Id).val(totalMonths);
                                }
                            } else {
                                if (fromDate && toDate) {
                                    let startDate = new Date(fromDate);
                                    let endDate = new Date(toDate);

                                    let yearsDifference = endDate.getFullYear() - startDate.getFullYear();
                                    let monthsDifference = endDate.getMonth() - startDate.getMonth();

                                    let totalMonths = yearsDifference * 12 + monthsDifference;

                                    if (totalMonths < 0) {
                                        totalMonths = 0;
                                    }
                                    $('#exp_area_year_' + Id).val(totalMonths);
                                }
                            }

                        });

                    });
                </script>


                @foreach ($experience as $key => $data)
                    <div class="d-flex justify-content-between mt-3 mb-2">
                        <h3>experience {{ $key + 1 }} </h3>
                        <div class="edit-tools" id="edit-tools_{{ $data->id }}" style="">
                            <button class="btn btn-primary edit_btn" id="upd_edit_btn_{{ $data->id }}"
                                data-id="{{ $data->id }}" aria-label="Edit experience"><i
                                    class="icon-pencil-o"></i>Edit</button>
                            <button class="btn btn-danger" aria-label="Delete experience" data-bs-toggle="modal"
                                data-bs-target="#deleteexperience_{{ $data->id }}">Delete</button>
                        </div>
                    </div>

                    <div class="modal fade" id="deleteexperience_{{ $data->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteexperienceLabel_{{ $data->id }}"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-5">
                                    <h1 class="modal-title fs-4" id="deleteexperienceLabel_{{ $data->id }}"> <i
                                            class="fas fa-trash-alt fa-lg me-1" style="color: #ff1605;"></i>DELETE</h1>

                                    <p class="mt-3">Are you sure, you want to delete this record?</p>

                                    <div class="text-end">
                                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                                        <a href="{{ route('employment.delete', $data->slug) }}"
                                            class="btn btn-danger">YES, DELETE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="experience_view" id="experience_view_{{ $data->id }}">
                        <div class="row">

                            <div class="col-md-6">
                                <label>Job title </label>
                                <p class="p">{{ $data->title }}</p>
                            </div>

                            <div class="col-md-6">
                                <label for="">Company name</label>
                                <p class="p">{{ $data->company }}</p>
                            </div>

                            <div class="col-md-6" id="">
                                <label for="">Company business </label>
                                <p class="p">{{ $data->business }}</p>
                            </div>

                            <div class="col-md-6" id="">
                                <label for="">Designation </label>
                                <p class="p">{{ $data->position }}</p>
                            </div>

                            <div class="col-md-6" id="">
                                <label for="">Department </label>
                                <p class="p">{{ $data->department }}</p>
                            </div>

                            <div class="col-md-6" id="">
                                <label for="">Employment Period </label>
                                <p class="p">{{ $data->from_date->format('d-M-Y') }} <span class="mx-4">To</span>
                                    {{ $data->is_continue == false ? $data->to_date->format('d-M-Y') : 'Continuing' }} </p>
                            </div>

                            <div class="col-md-6" id="">
                                <label for="">Area of Expertise </label>
                                <p class="p">{{ $data->exp_area }} ({{ $data->exp_area_year }} Month)</p>
                            </div>

                            <div class="col-md-6" id="">
                                <label for="">Location </label>
                                <p class="p">{{ $data->location }}</p>
                            </div>

                            <div class="col-md-12" id="">
                                <label for="">Responsibilities </label>
                                <p class="p">{{ $data->responsibilities }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="experience_edit" id="experience_edit_{{ $data->id }}" style="display: none">
                        <form action="{{ route('employment.update', $data->slug) }}" class="" id=""
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="title">Job title <span class="text-danger">*</span>
                                        @error('title')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" required="required" class="form-control" name="title"
                                        id="title" value="{{ $data->title }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="company">company name<span title="Required" class="text-danger">*</span>
                                        @error('company')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror

                                    </label>
                                    <input type="text" name="company" id="company" class="form-control"
                                        value="{{ $data->company }}" required>
                                </div>

                                <div class="form-group col-md-6" id="">
                                    <label for="business">Company business
                                        @error('business')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" id="business" name="business" class="form-control"
                                        placeholder="" value="{{ $data->business }}">
                                </div>

                                <div class="form-group col-md-6" id="">
                                    <label for="position">Designation<span class="text-danger">*</span>
                                        @error('position')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" id="position" name="position" class="form-control"
                                        placeholder="" value="{{ $data->position }}">
                                </div>

                                <div class="form-group col-md-6" id="" style="">
                                    <label for="department">Department
                                        @error('department')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" class="form-control" name="department" id="department"
                                        placeholder="" value="{{ $data->department }}">

                                </div>

                                <div class="form-group col-md-6">
                                    <label for="from_date">Employment Period<span class="text-danger">*</span> </label>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" name="from_date"
                                                id="from_date_{{ $data->id }}" data-id="{{ $data->id }}"
                                                value="{{ $data->from_date->format('Y-m-d') }}">

                                            @error('from_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <input type="date" class="form-control" name="to_date"
                                                id="to_date_{{ $data->id }}" data-id="{{ $data->id }}"
                                                value="{{ $data->to_date->format('Y-m-d') }}">
                                            <input type="date" class="form-control" name="to_date"
                                                id="current_date_{{ $data->id }}" data-id="{{ $data->id }}"
                                                value="" disabled readonly>

                                            @error('to_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="checkbox-inline m-t-10 btn-form-control">
                                        <input type="checkbox" id="is_continue_{{ $data->id }}"
                                            data-id="{{ $data->id }}" name="is_continue" value="1"
                                            @checked($data->is_continue)>
                                        Currently Working
                                    </label>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exp_area">Area of Expertise <span class="text-danger">*</span>

                                    </label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="exp_area" id="exp_area"
                                                value="{{ $data->exp_area }}">

                                            @error('exp_area')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="exp_area_year"
                                                id="exp_area_year" value="{{ $data->exp_area_year }}" readonly>

                                            @error('exp_area_year')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="location">Location
                                        @error('location')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" class="form-control" name="location" id="location"
                                        value="{{ $data->location }}">
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="responsibilities">Responsibilities
                                        @error('responsibilities')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <textarea type="text" class="form-control" name="responsibilities" id="responsibilities">{{ $data->responsibilities }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <div class="text-end">
                                        <input type="submit" class="btn btn-primary"
                                            title="Save new experience information" value="Save">

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
                        <h3>experience Summary </h3>
                        <div class="edit-tools" style="display: none;"><button class="btn edit-btn"
                                aria-label="Edit experience"><i class="icon-pencil-o"></i>&nbsp;Edit</button><button
                                class="btn delete-btn" aria-label="Delete experience">&nbsp;Delete</button></div>
                    </div>
                    <form action="{{ route('employment') }}" class="" id="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="title">Job title <span class="text-danger">*</span>
                                    @error('title')
                                        <span class="text-danger" id="">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" required="required" class="form-control" name="title"
                                    id="title" value="">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="company">company name<span title="Required" class="text-danger">*</span>
                                    @error('company')
                                        <span class="text-danger" id="">{{ $message }}</span>
                                    @enderror

                                </label>
                                <input type="text" name="company" id="company" class="form-control" value=""
                                    required>
                            </div>

                            <div class="form-group col-md-6" id="">
                                <label for="business">Company business
                                    @error('business')
                                        <span class="text-danger" id="">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" id="business" name="business" class="form-control"
                                    placeholder="" value="">
                            </div>

                            <div class="form-group col-md-6" id="">
                                <label for="position">Designation<span class="text-danger">*</span>
                                    @error('position')
                                        <span class="text-danger" id="">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" id="position" name="position" class="form-control"
                                    placeholder="" value="">
                            </div>

                            <div class="form-group col-md-6" id="" style="">
                                <label for="department">Department
                                    @error('department')
                                        <span class="text-danger" id="">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" class="form-control" name="department" id="department"
                                    placeholder="" value="">

                            </div>

                            <div class="form-group col-md-6">
                                <label for="from_date">Employment Period<span class="text-danger">*</span> </label>

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="from_date" id="from_date"
                                            value="">

                                        @error('from_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6" id="">
                                        <input type="date" class="form-control" name="to_date" id="to_date"
                                            value="">
                                        <input type="date" class="form-control" name="to_date" id="current_date"
                                            value="" disabled readonly>

                                        @error('to_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="checkbox-inline m-t-10 btn-form-control">
                                    <input type="checkbox" id="is_continue" name="is_continue" value="0">
                                    Currently Working
                                </label>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exp_area">Area of Expertise <span class="text-danger">*</span>

                                </label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="exp_area" id="exp_area"
                                            value="">

                                        @error('exp_area')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="exp_area_year"
                                                id="exp_area_year" placeholder="0" aria-describedby="exp_area_month"
                                                readonly>
                                            <span class="input-group-text" for="exp_area_year"
                                                id="exp_area_month">Month</span>
                                        </div>

                                        @error('exp_area_year')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="location">Location
                                    @error('location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" class="form-control" name="location" id="location"
                                    value="">
                            </div>


                            <div class="form-group col-md-12">
                                <label for="responsibilities">Responsibilities
                                    @error('responsibilities')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <textarea type="text" class="form-control" name="responsibilities" id="responsibilities"></textarea>
                            </div>
                            <div class="col-md-12">
                                <div class="text-end">
                                    <input type="submit" class="btn btn-primary" title="Save new experience information"
                                        value="Save">

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


            let currentDate = new Date();
            currentDate.setDate(currentDate.getDate() + 1);
            let formattedDate = currentDate.toISOString().split('T')[0];

            $('#to_date').show().prop('disabled', false);
            $('#current_date').hide().prop('disabled', true);

            $('#is_continue').click(function() {
                if ($('#is_continue').is(':checked')) {
                    $('#to_date').hide().prop('disabled', true);
                    $('#current_date').show().prop('disabled', false);
                    $('#current_date').val(formattedDate)
                } else {
                    $('#to_date').show().prop('disabled', false);
                    $('#current_date').hide().prop('disabled', true);
                }
            })


            $('input[name="from_date"], input[name="is_continue"]').on('change', function() {
                let fromDate = $('input[name="from_date"]').val();
                let toDate = $('input[name="to_date"]').val();

                if (fromDate) {
                    let startDate = new Date(fromDate);
                    let endDate;

                    if (toDate) {
                        endDate = new Date(toDate);
                    } else {
                        let currentDate = new Date();
                        currentDate.setDate(currentDate.getDate() + 1);
                        endDate = currentDate;
                    }

                    let yearsDifference = endDate.getFullYear() - startDate.getFullYear();
                    let monthsDifference = endDate.getMonth() - startDate.getMonth();

                    let totalMonths = yearsDifference * 12 + monthsDifference;

                    if (totalMonths < 0) {
                        totalMonths = 0;
                    }
                    $('#exp_area_year').val(totalMonths);
                }
            });

            $('input[name="to_date"]').on('change', function() {
                let fromDate = $('input[name="from_date"]').val();
                let toDate = $('input[name="to_date"]').val();

                if (fromDate && toDate) {
                    let startDate = new Date(fromDate);
                    let endDate = new Date(toDate);

                    let yearsDifference = endDate.getFullYear() - startDate.getFullYear();
                    let monthsDifference = endDate.getMonth() - startDate.getMonth();

                    let totalMonths = yearsDifference * 12 + monthsDifference;

                    if (totalMonths < 0) {
                        totalMonths = 0;
                    }
                    $('#exp_area_year').val(totalMonths);
                }
            });

            $('input[name="is_continue"]').on('change', function() {
                var isChecked = $(this).is(':checked');
                let fromDate = $('input[name="from_date"]').val();
                let toDate = $('input[name="to_date"]').val();
                if (isChecked) {
                    if (fromDate) {
                        let startDate = new Date(fromDate);

                        let currentDate = new Date();
                        currentDate.setDate(currentDate.getDate() + 1);
                        let endDate = currentDate;


                        let yearsDifference = endDate.getFullYear() - startDate.getFullYear();
                        let monthsDifference = endDate.getMonth() - startDate.getMonth();

                        let totalMonths = yearsDifference * 12 + monthsDifference;

                        if (totalMonths < 0) {
                            totalMonths = 0;
                        }
                        $('#exp_area_year').val(totalMonths);
                    }
                } else {
                    if (fromDate && toDate) {
                        let startDate = new Date(fromDate);
                        let endDate = new Date(toDate);

                        let yearsDifference = endDate.getFullYear() - startDate.getFullYear();
                        let monthsDifference = endDate.getMonth() - startDate.getMonth();

                        let totalMonths = yearsDifference * 12 + monthsDifference;

                        if (totalMonths < 0) {
                            totalMonths = 0;
                        }
                        $('#exp_area_year').val(totalMonths);
                    }
                }

            });



        });
    </script>
@endsection
