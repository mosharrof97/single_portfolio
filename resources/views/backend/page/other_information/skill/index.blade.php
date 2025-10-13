@extends('backend.partial.layout')

@section('content')
    <div class="card" id="contantCard">
        <div class="card-header">
            <div class="card-title" style="">
                Skill
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
                            $(`#skill_view_${Id}`).show();
                            $(`#edit-tools_${Id}`).show();
                            $(`#skill_edit_${Id}`).hide().find('input, select, textarea').prop('disabled', true);
                        }

                        // Edit button click handler
                        $('.edit_btn').click(function() {
                            const Id = $(this).data('id');

                            $(`#skill_view_${Id}, #edit-tools_${Id}`).hide();
                            $(`#skill_edit_${Id}`).show().find('input, select, textarea').prop('disabled', false);

                        });

                        // Cancel button click handler
                        $('.btn-cancel').click(function() {
                            const Id = $(this).data('id');
                            initializeForm(Id);
                        });
                    });
                </script>




                @foreach ($skills as $key => $data)
                    <div class="d-flex justify-content-between mt-3 mb-2">
                        <h3>skill {{ $key + 1 }} </h3>
                        <div class="edit-tools" id="edit-tools_{{ $data->id }}" style="">
                            <button class="btn btn-primary edit_btn" id="upd_edit_btn_{{ $data->id }}"
                                data-id="{{ $data->id }}" aria-label="Edit skill"><i
                                    class="icon-pencil-o"></i>Edit</button>
                            <button class="btn btn-danger" aria-label="Delete skill" data-bs-toggle="modal"
                                data-bs-target="#deleteskill_{{ $data->id }}">Delete</button>
                        </div>
                    </div>

                    <div class="modal fade" id="deleteskill_{{ $data->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteskillLabel_{{ $data->id }}"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-5">
                                    <h1 class="modal-title fs-4" id="deleteskillLabel_{{ $data->id }}"> <i
                                            class="fas fa-trash-alt fa-lg me-1" style="color: #ff1605;"></i>DELETE</h1>

                                    <p class="mt-3">Are you sure, you want to delete this record?</p>

                                    <div class="text-end">
                                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                                        <a href="{{ route('skill.delete', $data->slug) }}" class="btn btn-danger">YES,
                                            DELETE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="skill_view" id="skill_view_{{ $data->id }}">
                        <div class="row">

                            <div class="col-md-6">
                                <label>Skill </label>
                                <p class="p">{{ $data->skill }}</p>
                            </div>
                            <div class="col-md-6">
                                <label>Progress </label>
                                <p class="p">{{ $data->progress }}%</p>
                            </div>

                            <div class="col-md-12 ">
                                <span class="m-0 p">{{ $data->self !== null ? $data->self . ',' : '' }} </span>
                                <span class="m-0 p">{{ $data->service !== null ? $data->service . ',' : '' }} </span>
                                <span class="m-0 p">{{ $data->education !== null ? $data->education . ',' : '' }} </span>
                                <span class="m-0 p">{{ $data->training !== null ? $data->training . ',' : '' }} </span>
                            </div>
                        </div>
                    </div>

                    <div class="skill_edit" id="skill_edit_{{ $data->id }}" style="display: none">
                        <form action="{{ route('skill.update', $data->slug) }}" class="" id=""
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="skill">Skill<span class="text-danger">*</span>
                                        @error('skill')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" required="required" class="form-control" name="skill"
                                        id="skill" value="{{ $data->skill }}">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="progress">progress (%)<span class="text-danger">*</span>
                                        @error('progress')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="number" required="required" class="form-control" name="progress"
                                        id="progress" value="{{ $data->progress }}">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="">How did you learn the skill?<span title="Required"
                                            class="text-danger">*</span>
                                        @error('skill')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <div class="">
                                        <input type="checkbox" name="self" id="self{{ $data->id }}" class=""
                                            value="{{ $data->self ? $data->self : 'self' }}" @checked($data->self)>
                                        <label for="self{{ $data->id }}" class="me-2">Self</label>

                                        <input type="checkbox" name="service" id="service{{ $data->id }}"
                                            class="" value="{{ $data->service ? $data->service : 'service' }}"
                                            @checked($data->service)>
                                        <label for="service{{ $data->id }}" class="me-2">Service</label>

                                        <input type="checkbox" name="education" id="education{{ $data->id }}"
                                            class=""
                                            value="{{ $data->education ? $data->education : 'education' }}"
                                            @checked($data->education)>
                                        <label for="education{{ $data->id }}" class="me-2">Education</label>

                                        <input type="checkbox" name="training" id="training{{ $data->id }}"
                                            class="" value="{{ $data->training ? $data->training : 'training' }}"
                                            @checked($data->training)>
                                        <label for="training{{ $data->id }}" class="me-2">training</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="text-end">
                                        <input type="submit" class="btn btn-primary" title="Save new skill information"
                                            value="Save">

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

            @if (count($skills) < 10)
                <div class="mt-5" id="div_aca" style="display: none">
                    <div class="">
                        <div class="sub-header">
                            <div id="alertDiv_aca"></div>
                            <h3>skill </h3>
                            <div class="edit-tools" style="display: none;"><button class="btn edit-btn"
                                    aria-label="Edit skill"><i class="icon-pencil-o"></i>&nbsp;Edit</button><button
                                    class="btn delete-btn" aria-label="Delete skill">&nbsp;Delete</button></div>
                        </div>
                        <form action="{{ route('skill') }}" class="" id="" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="skill">Skill<span class="text-danger">*</span>
                                        @error('skill')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" required="required" class="form-control" name="skill"
                                        id="skill" value="">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="progress">progress (%)<span class="text-danger">*</span>
                                        @error('progress')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="number" required="required" class="form-control" name="progress"
                                        id="progress" value="">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="">How did you learn the skill?<span title="Required"
                                            class="text-danger">*</span>
                                        @error('skill')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <div class="">
                                        <input type="checkbox" name="self" id="self" class=""
                                            value="self">
                                        <label for="self" class="me-2">Self</label>

                                        <input type="checkbox" name="service" id="service" class=""
                                            value="service">
                                        <label for="service" class="me-2">Service</label>

                                        <input type="checkbox" name="education" id="education" class=""
                                            value="education">
                                        <label for="education" class="me-2">Education</label>

                                        <input type="checkbox" name="training" id="training" class=""
                                            value="training">
                                        <label for="training" class="me-2">training</label>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="text-end">
                                        <input type="submit" class="btn btn-primary" title="Save new skill information"
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
            @endif

            {{-- --- Skill Description --- --}}
            <div class="">
                <div class="mt-5" id="div_desc_view" style="">
                    @if (!empty($skillDesc))
                        <div class="d-flex justify-content-between">
                            <h3>Skill Description </h3>
                            <div class="desc-edit-tools" id="desc-edit-tools" style="">
                                <button class="btn btn-primary" id="desc-edit" aria-label="Skill Description"><i
                                        class="icon-pencil-o"></i>&nbsp;Edit</button>
                            </div>
                        </div>
                        <div class="">
                            <div class="p">{{ $skillDesc->description }}</div>
                        </div>
                    @endif
                </div>

                <div class="mt-5" id="div_skill_desc" style="display: none">
                    <div class="">
                        <div class="sub-header">
                            <div id="alertDiv_skill_desc"></div>
                            <h3>Skill Description </h3>
                        </div>

                        <form action="{{ route('skill.desc') }}" class="" id="" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @if ($skillDesc)
                                @method('PUT')
                            @endif
                            <input type="hidden" name="descId" value="{{ $skillDesc ? $skillDesc->id : '' }}">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <textarea name="description" id="skill_desc" class="form-control" cols="30" rows="5"
                                        placeholder="Enter description here...">{{ $skillDesc ? $skillDesc->description : '' }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <div class="text-end">
                                        <input type="submit" class="btn btn-primary" title="Save new skill information"
                                            value="Save">
                                        @if (empty($skillDesc))
                                            <button type="button" class="btn btn-warning" id="btnRemove_skill_desc"
                                                title="Click close to go back to edit resume without saving">Close</button>
                                        @else
                                            <button type="button" class="btn btn-warning" id="btncancel_skill_desc"
                                                title="Click close to go back to edit resume without saving">Close</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if (empty($skillDesc))
                    <div id="div_skill_desc" class="text-center">
                        <button class="btn btn-success mt-5" id="btnAdd_skill_desc"><i class="icon-plus"></i>Add skill
                            description</button>
                    </div>
                @endif
            </div>

            {{-- --- activities --- --}}
            <div class="">
                <div class="mt-5" id="div_activities_view" style="">
                    @if (!empty($activities))
                        <div class="d-flex justify-content-between">
                            <h3>Extracurricular Activities </h3>
                            <div class="activities-edit-tools" id="activities-edit-tools" style="">
                                <button class="btn btn-primary" id="activities-edit"
                                    aria-label="Extracurricular Activities"><i
                                        class="icon-pencil-o"></i>&nbsp;Edit</button>
                            </div>
                        </div>
                        <div class="">
                            <div class="p">{{ $activities->activities }}</div>
                        </div>
                    @endif
                </div>

                <div class="mt-5" id="div_activities" style="display: none">
                    <div class="">
                        <div class="sub-header">
                            <div id="alertDiv_activities"></div>
                            <h3>Extracurricular Activities </h3>
                        </div>

                        <form action="{{ route('activities') }}" class="" id="" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @if ($activities)
                                @method('PUT')
                            @endif
                            <input type="hidden" name="activitiesId" value="{{ $activities ? $activities->id : '' }}">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <textarea name="activities" id="activities_desc" class="form-control" cols="30" rows="5"
                                        placeholder="Enter activities here...">{{ $activities ? $activities->activities : '' }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <div class="text-end">
                                        <input type="submit" class="btn btn-primary"
                                            title="Save new activities information" value="Save">
                                        @if (empty($activities))
                                            <button type="button" class="btn btn-warning" id="btnRemove_activities"
                                                title="Click close to go back to edit resume without saving">Close</button>
                                        @else
                                            <button type="button" class="btn btn-warning" id="btncancel_activities"
                                                title="Click close to go back to edit resume without saving">Close</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if (empty($activities))
                    <div id="div_btnActivities" class="text-center">

                        <button class="btn btn-success mt-5" id="btnAdd_activities"><i class="icon-plus"></i> Add
                            Extracurricular Activities </button>
                    </div>
                @endif
            </div>
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

        /*----------- Skill Description -----------*/
        $(document).ready(function() {
            $('#div_skill_desc').css('display', 'none').hide().find('input, select, textarea').prop('disabled',
                true);
            $('#btnAdd_skill_desc').click(function() {
                $('#div_skill_desc').css('display', 'block').show().find('input, select, textarea').prop(
                    'disabled', false);
                $('#btnAdd_skill_desc').hide().prop('disabled', true);
            });

            $('#btnRemove_skill_desc').click(function() {
                $('#div_skill_desc').css('display', 'none').hide().find('input, select, textarea').prop(
                    'disabled', true);
                $('#btnAdd_skill_desc').show().prop('disabled', false);
            });

            /*------- Edit Skill Description -------*/
            // Initially show/hide elements
            $('#div_desc_view').show();
            $('#desc-edit-tools').show();
            $('#div_skill_desc').hide().find('input, select, textarea').prop('disabled', true);

            // Edit button click handler
            $(document).on('click', '#desc-edit', function() {
                $('#div_desc_view, #desc-edit-tools').hide();
                $('#div_skill_desc').show().find('input, select, textarea').prop('disabled', false);
            });

            // Cancel button click handler
            $(document).on('click', '#btncancel_skill_desc', function() {
                $('#div_desc_view, #desc-edit-tools').show();
                $('#div_skill_desc').hide().find('input, select, textarea').prop('disabled', true);
            });
        });

        /*----------- Activities -----------*/
        $(document).ready(function() {
            $('#div_activities').css('display', 'none').hide().find('input, select, textarea').prop('disabled',
                true);
            $('#btnAdd_activities').click(function() {
                $('#div_activities').css('display', 'block').show().find('input, select, textarea').prop(
                    'disabled', false);
                $('#btnAdd_activities').hide().prop('disabled', true);
            });

            $('#btnRemove_activities').click(function() {
                $('#div_activities').css('display', 'none').hide().find('input, select, textarea').prop(
                    'disabled', true);
                $('#btnAdd_activities').show().prop('disabled', false);
            });

            /*------- Edit activities -------*/
            // Initially show/hide elements
            $('#div_activities_view').show();
            $('#activities-edit-tools').show();
            $('#div_activities').hide().find('input, select, textarea').prop('disabled', true);

            // Edit button click handler
            $(document).on('click', '#activities-edit', function() {
                $('#div_activities_view, #activities-edit-tools').hide();
                $('#div_activities').show().find('input, select, textarea').prop('disabled', false);
            });

            // Cancel button click handler
            $(document).on('click', '#btncancel_activities', function() {
                $('#div_activities_view, #activities-edit-tools').show();
                $('#div_activities').hide().find('input, select, textarea').prop('disabled', true);
            });
        });
    </script>
@endsection
