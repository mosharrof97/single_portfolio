@extends('backend.partial.layout')

@section('content')
    <div class="card" id="contantCard">
        <div class="card-header">
            <div class="card-title" style="">
                Academic Education
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
                        function initializeForm(Id) {
                            $(`#academic_view_${Id}`).show();
                            $(`#edit-tools_${Id}`).show();
                            $(`#academic_edit_${Id}`).hide().find('input, select, textarea').prop('disabled', true);
                        }

                        // Toggle sections based on education level
                        function toggleEducationSections(Id, education) {
                            const sections = [
                                `#upd_secondaryEduType_${Id}`, `#upd_higher_secondaryEduType_${Id}`,
                                `#upd_diplomaEduType_${Id}`, `#upd_honorsEduType_${Id}`, `#upd_masterEduType_${Id}`,
                                `#upd_inputdivEduType_${Id}`
                            ];

                            // Hide all sections and disable their inputs
                            sections.forEach(section => {
                                $(section).hide().find('input, select').prop('disabled', true);
                            });

                            // Show and enable the relevant section
                            if (education === 'Secondary') {
                                $(`#upd_secondaryEduType_${Id}`).show().find('input, select').prop('disabled', false);
                                $(`#upd_showBoard_${Id}`).show().find('input, select').prop('disabled', false);
                            } else if (education === 'Higher Secondary') {
                                $(`#upd_higher_secondaryEduType_${Id}`).show().find('input, select').prop('disabled', false);
                                $(`#upd_showBoard_${Id}`).show().find('input, select').prop('disabled', false);
                            } else if (['Diploma', 'Honors'].includes(education)) {
                                $(`#upd_${education.toLowerCase()}EduType_${Id}`).show().find('input, select').prop('disabled',
                                    false);
                                $(`#upd_showBoard_${Id}`).hide().find('input, select').prop('disabled', true);
                            } else if (education === 'Masters') {
                                $(`#upd_masterEduType_${Id}`).show().find('input, select').prop('disabled', false);
                                $(`#upd_showBoard_${Id}`).hide().find('input, select').prop('disabled', true);
                            } else if (education === 'PhD') {
                                $(`#upd_inputdivEduType_${Id}`).show().find('input, select').prop('disabled', false);
                                $(`#upd_showBoard_${Id}`).hide().find('input, select').prop('disabled', true);
                            }
                        }

                        // Toggle foreign institution fields
                        function toggleForeignInstitution(Id, isChecked) {
                            if (isChecked) {
                                $(`#upd_f_country_${Id}`).show().find('input, select').prop('disabled', false);
                            } else {
                                $(`#upd_f_country_${Id}`).hide().find('input, select').prop('disabled', true);
                            }
                        }

                        // Toggle result-related fields
                        function toggleResultFields(Id, result) {
                            const isDivision = ['First Division', 'Second Division', 'Third Division'].includes(result);
                            const isGrade = result === 'Grade';

                            $(`#upd_marks_div_${Id}`).toggle(isDivision).find('input, select').prop('disabled', !isDivision);
                            $(`#upd_CGPADiv_${Id}, #upd_scaleDiv_${Id}`).toggle(isGrade).find('input, select').prop('disabled',
                                !isGrade);
                        }

                        // Edit button click handler
                        $('.edit_btn').click(function() {
                            const Id = $(this).data('id');

                            $(`#academic_view_${Id}, #edit-tools_${Id}`).hide();
                            $(`#academic_edit_${Id}`).show().find('input, select, textarea').prop('disabled', false);

                            const education = $(`#upd_edu_level_${Id}`).val();
                            toggleEducationSections(Id, education);

                            const isForeign = $(`#upd_is_foreign_inst_${Id}`).is(':checked');
                            toggleForeignInstitution(Id, isForeign);

                            const result = $(`#upd_result_${Id}`).val();
                            toggleResultFields(Id, result);

                            // Event bindings for dynamic updates
                            $(`#upd_edu_level_${Id}`).change(function() {
                                toggleEducationSections(Id, $(this).val());
                            });

                            $(`#upd_is_foreign_inst_${Id}`).change(function() {
                                toggleForeignInstitution(Id, $(this).is(':checked'));
                            });

                            $(`#upd_result_${Id}`).change(function() {
                                toggleResultFields(Id, $(this).val());
                            });
                        });

                        // Cancel button click handler
                        $('.btn-cancel').click(function() {
                            const Id = $(this).data('id');
                            initializeForm(Id);
                        });
                    });
                </script>


                {{-- education.delete --}}
                @foreach ($educations as $key => $education)
                    <div class="education-view">
                        <div class="d-flex justify-content-between mt-3 mb-2">
                            <h3>Academic {{ $key + 1 }} </h3>
                            <div class="edit-tools" id="edit-tools_{{ $education->id }}" style="">
                                <button class="btn btn-primary edit_btn" id="upd_edit_btn_{{ $education->id }}"
                                    data-id="{{ $education->id }}" aria-label="Edit Academic"><i
                                        class="icon-pencil-o"></i>Edit</button>
                                <button class="btn btn-danger" aria-label="Delete Academic" data-bs-toggle="modal"
                                    data-bs-target="#deleteAcademic_{{ $education->id }}">Delete</button>
                            </div>
                        </div>
                        {{-- Delete Model --}}
                        <div class="modal fade" id="deleteAcademic_{{ $education->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteAcademicLabel_{{ $education->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body p-5">
                                        <h1 class="modal-title fs-4" id="deleteAcademicLabel_{{ $education->id }}"> <i
                                                class="fas fa-trash-alt fa-lg me-1" style="color: #ff1605;"></i>DELETE</h1>

                                        <p class="mt-3">Are you sure, you want to delete this record?</p>

                                        <div class="text-end">
                                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                                            <a href="{{ route('education.delete', $education->slug) }}"
                                                class="btn btn-danger">YES, DELETE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Delete Model End --}}
                        <div class="academic_view" id="academic_view_{{ $education->id }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="upd_edu_level">Level of Education </label>
                                            <p class="p">{{ $education->edu_level }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Exam/Degree Title</label>
                                            <p class="p">{{ $education->exam_title }}</p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6" id="">
                                            <label for="">Concentration/ Major/Group </label>
                                            <p class="p">{{ $education->major_group }}</p>
                                        </div>
                                        @if ($education->edu_level == 'Secondary' || $education->edu_level == 'Higher Secondary')
                                            <div class="col-md-6" id="" style="">
                                                <label for="">Board </label>
                                                <p class="p"> {{ $education->exam_board }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <fieldset>
                                                <legend for="" class="label">Institute Name </legend>
                                                <p class="p">{{ $education->institute_name }}
                                                    @if ($education->is_foreign_inst == true)
                                                        <span>, {{ $education->foreign_country }}</span>
                                                        <br>
                                                        <label class="checkbox-inline m-t-10 btn-form-control">
                                                            This is a foreign institute
                                                        </label>
                                                    @endif
                                                </p>


                                            </fieldset>
                                        </div>
                                    </div>
                                    @if ($education->foreign_country)
                                        <div class="row" id="" style="">
                                            <div class="col-md-12">
                                                <label for="">Country of Foreign University </label>
                                                <p class="p">{{ $education->foreign_country }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Result </label>
                                            <p class="p"> {{ $education->result }}</p>
                                        </div>
                                        @if (
                                            $education->result == 'First Division' ||
                                                $education->result == 'Second Division' ||
                                                $education->result == 'Third Division')
                                            <div class="col-md-6" id="upd_marksDiv">
                                                <label for="upd_marks" id=""> Marks (%) </label>
                                                <p class="p">{{ $education->marks }}</p>
                                            </div>
                                        @elseif($education->result == 'Grade')
                                            <div class="col-md-6" id="">
                                                <label for="">CGPA </label>
                                                <p class="p">{{ $education->CGPA }}</p>
                                            </div>
                                            <div class="col-md-6" id="">
                                                <label for="">Scale </label>
                                                <p class="p">{{ $education->scale }}</p>
                                            </div>
                                        @endif
                                        <div class="col-md-6">
                                            <label for="" id="">
                                                <span>Year of Passing</span></label>
                                            <p class="p">{{ $education->passing_year }}</p>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Duration <small>(Years)</small></label>
                                            <p class="p">{{ $education->edu_duration }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Achievement</label>
                                            <p class="p">{{ $education->achievement }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="academic_edit" id="academic_edit_{{ $education->id }}" style="display: none">
                            <form action="{{ route('education.update', $education->slug) }}" class="" id=""
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="upd_edu_level_{{ $education->id }}">Level of Education <span
                                                        class="text-danger">*</span>
                                                    @error('edu_level')
                                                        <span class="text-danger" id="">{{ $message }}</span>
                                                    @enderror
                                                </label>
                                                <select required="required" class="form-control" name="edu_level" disabled
                                                    id="upd_edu_level_{{ $education->id }}">
                                                        <option value="">select...</option>
                                                    @foreach ($degree as $deg)
                                                        <option value="{{ $deg->name }}">{{ $deg->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="education-type form-group col-md-6">
                                                <label for="exam_title">Exam/Degree Title<span title="Required"
                                                        class="text-dangre">*</span>
                                                </label>

                                                @error('exam_title')
                                                    <span class="text-danger" id="">{{ $message }}</span>
                                                @enderror
                                                <select required="required" class="form-control" name="exam_title"
                                                    id="exam_title">

                                                    <option value="">select...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6" id="upd_showSubject_{{ $education->id }}">
                                                <label for="upd_major_group_{{ $education->id }}">Concentration/ Major/Group
                                                    <span title="Required" class="text-dangre">*</span>
                                                    @error('major_group')
                                                        <span class="text-danger" id="">{{ $message }}</span>
                                                    @enderror
                                                </label>
                                                <input type="text" id="upd_major_group_{{ $education->id }}"
                                                    name="major_group" disabled class="form-control" placeholder=""
                                                    value="{{ $education->major_group }}">
                                            </div>
                                            <div class="form-group col-md-6" id="upd_showBoard_{{ $education->id }}"
                                                style="display: none">
                                                <label for="upd_exam_board_{{ $education->id }}">Board <span
                                                        title="Required" class="text-dangre">*</span>
                                                    @error('exam_board')
                                                        <span class="text-danger" id="">{{ $message }}</span>
                                                    @enderror
                                                </label>
                                                <select class="form-control" name="exam_board"
                                                    id="upd_exam_board_{{ $education->id }}" disabled>
                                                    <option value="">Select</option>
                                                    @foreach($boards as $key => $board)
                                                        <option value="{{ $board->name }}">{{ $board->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <fieldset>
                                                    <legend for="upd_institute_name_{{ $education->id }}" class="label">
                                                        Institute Name <span title="Required" class="text-dangre">*</span>
                                                        @error('institute_name')
                                                            <span class="text-danger" id="">{{ $message }}</span>
                                                        @enderror
                                                    </legend>
                                                    <input type="text" maxlength="100"
                                                        id="upd_institute_name_{{ $education->id }}" name="institute_name"
                                                        class="form-control autosuggest ui-autocomplete-input" placeholder=""
                                                        value="{{ $education->institute_name }}" disabled>
                                                    <label class="checkbox-inline m-t-10 btn-form-control">
                                                        <input type="checkbox" id="upd_is_foreign_inst_{{ $education->id }}"
                                                            name="is_foreign_inst" value="1"
                                                            @checked($education->is_foreign_inst)>
                                                        This is a foreign institute
                                                    </label>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="row" id="upd_f_country_{{ $education->id }}" style="display:none;">
                                            <div class="form-group col-md-12">
                                                <label for="upd_foreign_country_{{ $education->id }}">Country of Foreign
                                                    University
                                                    @error('foreign_country')
                                                        <span class="text-danger" id="">{{ $message }}</span>
                                                    @enderror
                                                </label>
                                                <input type="text" class="form-control" placeholder=""
                                                    value="{{ $education->foreign_country }}" name="foreign_country"
                                                    id="upd_foreign_country_{{ $education->id }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="upd_result_{{ $education->id }}">Result <span title="Required"
                                                        class="text-dangre">*</span>
                                                    @error('result')
                                                        <span class="text-danger" id="">{{ $message }}</span>
                                                    @enderror
                                                </label>
                                                <select class="form-control" name="result"
                                                    id="upd_result_{{ $education->id }}" disabled>
                                                    <option value="">Select</option>
                                                    <option value="First Division"
                                                        {{ $education->result == 'First Division' ? 'selected' : '' }}>First
                                                        Division/Class</option>
                                                    <option value="Second Division"
                                                        {{ $education->result == 'Second Division' ? 'selected' : '' }}>Second
                                                        Division/Class</option>
                                                    <option value="Third Division"
                                                        {{ $education->result == 'Third Division' ? 'selected' : '' }}>Third
                                                        Division/Class</option>
                                                    <option value="Grade"
                                                        {{ $education->result == 'Grade' ? 'selected' : '' }}>Grade</option>
                                                    <option value="Appeared"
                                                        {{ $education->result == 'Appeared' ? 'selected' : '' }}>Appeared
                                                    </option>
                                                    <option value="Enrolled"
                                                        {{ $education->result == 'Enrolled' ? 'selected' : '' }}>Enrolled
                                                    </option>
                                                    <option value="Awarded"
                                                        {{ $education->result == 'Awarded' ? 'selected' : '' }}>Awarded
                                                    </option>
                                                    <option value="Pass"
                                                        {{ $education->result == 'Pass' ? 'selected' : '' }}>Pass</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6" id="upd_marks_div_{{ $education->id }}">
                                                <label for="upd_marks" id="labMarks"> Marks (%) <span title="Required"
                                                        class="text-dangre">*</span>
                                                    @error('marks')
                                                        <span class="text-danger" id="">{{ $message }}</span>
                                                    @enderror
                                                </label>
                                                <input type="text" id="upd_marks_{{ $education->id }}" name="marks"
                                                    class="form-control" placeholder="" value="{{ $education->marks }}"
                                                    disabled>
                                            </div>
                                            <div class="form-group col-md-6" id="upd_CGPADiv_{{ $education->id }}">
                                                <label for="upd_CGPA_{{ $education->id }}">CGPA <span title="Required"
                                                        class="text-dangre">*</span>
                                                    @error('CGPA')
                                                        <span class="text-danger" id="">{{ $message }}</span>
                                                    @enderror
                                                </label>
                                                <input class="form-control" id="upd_CGPA_{{ $education->id }}"
                                                    name="CGPA" placeholder="" value="{{ $education->CGPA }}"
                                                    type="text" disabled>
                                            </div>
                                            <div class="form-group col-md-6" id="upd_scaleDiv_{{ $education->id }}">
                                                <label for="upd_scale_{{ $education->id }}">Scale <span title="Required"
                                                        class="text-dangre">*</span>
                                                    @error('scale')
                                                        <span class="text-danger" id="">{{ $message }}</span>
                                                    @enderror
                                                </label>
                                                <input class="form-control" id="upd_scale_{{ $education->id }}"
                                                    name="scale" placeholder="" value="{{ $education->scale }}"
                                                    type="text" disabled>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="upd_passing_year_{{ $education->id }}"
                                                    id="upd_yrsOfPass_{{ $education->id }}">
                                                    <span>Year of Passing</span>
                                                    <span title="Required" class="text-dangre">*</span>
                                                    @error('passing_year')
                                                        <span class="text-danger" id="">{{ $message }}</span>
                                                    @enderror
                                                </label>
                                                <select class="form-control" name="passing_year"
                                                    id="upd_passing_year_{{ $education->id }}" disabled>
                                                    <option value="">Year</option>
                                                    <option value="2030"
                                                        {{ $education->passing_year == '2030' ? 'selected' : '' }}>2030
                                                    </option>
                                                    <option value="2029"
                                                        {{ $education->passing_year == '2029' ? 'selected' : '' }}>2029
                                                    </option>
                                                    <option value="2028"
                                                        {{ $education->passing_year == '2028' ? 'selected' : '' }}>2028
                                                    </option>
                                                    <option value="2027"
                                                        {{ $education->passing_year == '2027' ? 'selected' : '' }}>2027
                                                    </option>
                                                    <option value="2026"
                                                        {{ $education->passing_year == '2026' ? 'selected' : '' }}>2026
                                                    </option>
                                                    <option value="2025"
                                                        {{ $education->passing_year == '2025' ? 'selected' : '' }}>2025
                                                    </option>
                                                    <option value="2024"
                                                        {{ $education->passing_year == '2024' ? 'selected' : '' }}>2024
                                                    </option>
                                                    <option value="2023"
                                                        {{ $education->passing_year == '2023' ? 'selected' : '' }}>2023
                                                    </option>
                                                    <option value="2022"
                                                        {{ $education->passing_year == '2022' ? 'selected' : '' }}>2022
                                                    </option>
                                                    <option value="2021"
                                                        {{ $education->passing_year == '2021' ? 'selected' : '' }}>2021
                                                    </option>
                                                    <option value="2020"
                                                        {{ $education->passing_year == '2020' ? 'selected' : '' }}>2020
                                                    </option>
                                                    <option value="2019"
                                                        {{ $education->passing_year == '2019' ? 'selected' : '' }}>2019
                                                    </option>
                                                    <option value="2018"
                                                        {{ $education->passing_year == '2018' ? 'selected' : '' }}>2018
                                                    </option>
                                                    <option value="2017"
                                                        {{ $education->passing_year == '1017' ? 'selected' : '' }}>2017
                                                    </option>
                                                    <option value="2016"
                                                        {{ $education->passing_year == '2016' ? 'selected' : '' }}>2016
                                                    </option>
                                                    <option value="2015"
                                                        {{ $education->passing_year == '2015' ? 'selected' : '' }}>2015
                                                    </option>
                                                    <option value="2014"
                                                        {{ $education->passing_year == '2030' ? 'selected' : '' }}>2014
                                                    </option>
                                                    <option value="2013"
                                                        {{ $education->passing_year == '2013' ? 'selected' : '' }}>2013
                                                    </option>
                                                    <option value="2012"
                                                        {{ $education->passing_year == '2012' ? 'selected' : '' }}>2012
                                                    </option>
                                                    <option value="2011"
                                                        {{ $education->passing_year == '2011' ? 'selected' : '' }}>2011
                                                    </option>
                                                    <option value="2010"
                                                        {{ $education->passing_year == '2010' ? 'selected' : '' }}>2010
                                                    </option>
                                                    <option value="2009"
                                                        {{ $education->passing_year == '2009' ? 'selected' : '' }}>2009
                                                    </option>
                                                    <option value="2008"
                                                        {{ $education->passing_year == '2008' ? 'selected' : '' }}>2008
                                                    </option>
                                                    <option value="2007"
                                                        {{ $education->passing_year == '2007' ? 'selected' : '' }}>2007
                                                    </option>
                                                    <option value="2006"
                                                        {{ $education->passing_year == '2006' ? 'selected' : '' }}>2006
                                                    </option>
                                                    <option value="2005"
                                                        {{ $education->passing_year == '2005' ? 'selected' : '' }}>2005
                                                    </option>
                                                    <option value="2004"
                                                        {{ $education->passing_year == '2004' ? 'selected' : '' }}>2004
                                                    </option>
                                                    <option value="2003"
                                                        {{ $education->passing_year == '2003' ? 'selected' : '' }}>2003
                                                    </option>
                                                    <option value="2002"
                                                        {{ $education->passing_year == '2002' ? 'selected' : '' }}>2002
                                                    </option>
                                                    <option value="2001"
                                                        {{ $education->passing_year == '2001' ? 'selected' : '' }}>2001
                                                    </option>
                                                    <option value="2000"
                                                        {{ $education->passing_year == '2000' ? 'selected' : '' }}>2000
                                                    </option>
                                                    <option value="1999"
                                                        {{ $education->passing_year == '1999' ? 'selected' : '' }}>1999
                                                    </option>
                                                    <option value="1998"
                                                        {{ $education->passing_year == '1998' ? 'selected' : '' }}>1998
                                                    </option>
                                                    <option value="1997"
                                                        {{ $education->passing_year == '1997' ? 'selected' : '' }}>1997
                                                    </option>
                                                    <option value="1996"
                                                        {{ $education->passing_year == '1996' ? 'selected' : '' }}>1996
                                                    </option>
                                                    <option value="1995"
                                                        {{ $education->passing_year == '1995' ? 'selected' : '' }}>1995
                                                    </option>
                                                    <option value="1994"
                                                        {{ $education->passing_year == '1994' ? 'selected' : '' }}>1994
                                                    </option>
                                                    <option value="1993"
                                                        {{ $education->passing_year == '1993' ? 'selected' : '' }}>1993
                                                    </option>
                                                    <option value="1992"
                                                        {{ $education->passing_year == '1992' ? 'selected' : '' }}>1992
                                                    </option>
                                                    <option value="1991"
                                                        {{ $education->passing_year == '1991' ? 'selected' : '' }}>1991
                                                    </option>
                                                    <option value="1990"
                                                        {{ $education->passing_year == '1990' ? 'selected' : '' }}>1990
                                                    </option>
                                                    <option value="1989"
                                                        {{ $education->passing_year == '1989' ? 'selected' : '' }}>1989
                                                    </option>
                                                    <option value="1988"
                                                        {{ $education->passing_year == '1988' ? 'selected' : '' }}>1988
                                                    </option>
                                                    <option value="1987"
                                                        {{ $education->passing_year == '1987' ? 'selected' : '' }}>1987
                                                    </option>
                                                    <option value="1986"
                                                        {{ $education->passing_year == '1986' ? 'selected' : '' }}>1986
                                                    </option>
                                                    <option value="1985"
                                                        {{ $education->passing_year == '1985' ? 'selected' : '' }}>1985
                                                    </option>
                                                    <option value="1984"
                                                        {{ $education->passing_year == '1984' ? 'selected' : '' }}>1984
                                                    </option>
                                                    <option value="1983"
                                                        {{ $education->passing_year == '1983' ? 'selected' : '' }}>1983
                                                    </option>
                                                    <option value="1982"
                                                        {{ $education->passing_year == '1982' ? 'selected' : '' }}>1982
                                                    </option>
                                                    <option value="1981"
                                                        {{ $education->passing_year == '1981' ? 'selected' : '' }}>1981
                                                    </option>
                                                    <option value="1980"
                                                        {{ $education->passing_year == '1980' ? 'selected' : '' }}>1980
                                                    </option>
                                                    <option value="1979"
                                                        {{ $education->passing_year == '1979' ? 'selected' : '' }}>1979
                                                    </option>
                                                    <option value="1978"
                                                        {{ $education->passing_year == '1978' ? 'selected' : '' }}>1978
                                                    </option>
                                                    <option value="1977"
                                                        {{ $education->passing_year == '1977' ? 'selected' : '' }}>1977
                                                    </option>
                                                    <option value="1976"
                                                        {{ $education->passing_year == '1976' ? 'selected' : '' }}>1976
                                                    </option>
                                                    <option value="1975"
                                                        {{ $education->passing_year == '1975' ? 'selected' : '' }}>1975
                                                    </option>
                                                    <option value="1974"
                                                        {{ $education->passing_year == '1974' ? 'selected' : '' }}>1974
                                                    </option>
                                                    <option value="1973"
                                                        {{ $education->passing_year == '1973' ? 'selected' : '' }}>1973
                                                    </option>
                                                    <option value="1972"
                                                        {{ $education->passing_year == '1972' ? 'selected' : '' }}>1972
                                                    </option>
                                                    <option value="1971"
                                                        {{ $education->passing_year == '1971' ? 'selected' : '' }}>1971
                                                    </option>
                                                    <option value="1970"
                                                        {{ $education->passing_year == '1970' ? 'selected' : '' }}>1970
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="upd_edu_duration_{{ $education->id }}">Duration
                                                    <small>(Years)</small>
                                                    @error('edu_duration')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </label>
                                                <input type="text" class="form-control" placeholder=""
                                                    value="{{ $education->edu_duration }}" name="edu_duration"
                                                    id="upd_edu_duration_{{ $education->id }}" disabled>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="upd_achievement_{{ $education->id }}">Achievement
                                                    @error('achievement')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </label>
                                                <input type="text" class="form-control" placeholder=""
                                                    value="{{ $education->achievement }}" name="achievement"
                                                    id="upd_achievement_{{ $education->id }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="text-end">
                                            <input type="submit" class="btn btn-primary"
                                                title="Save new Academic information" value="Save">

                                            <a class="btn btn-info btn-cancel" type="button" id="upd_btn-cancel"
                                                data-id="{{ $education->id }}"
                                                title="Click close to go back to edit resume without saving">Close</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-5" id="div_aca" style="display: none">
                <div class="">
                    <div class="sub-header">
                        <div id="alertDiv_aca"></div>
                        <h3>Academic </h3>
                        <div class="edit-tools" style="display: none;"><button class="btn edit-btn"
                                aria-label="Edit Academic"><i class="icon-pencil-o"></i>&nbsp;Edit</button><button
                                class="btn delete-btn" aria-label="Delete Academic">&nbsp;Delete</button></div>
                    </div>
                    <form action="{{ route('education') }}" class="" id="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="edu_level">Level of Education <span class="text-danger">*</span>
                                            @error('edu_level')
                                                <span class="text-danger" id="">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <select required="required" class="form-control" name="edu_level"
                                            id="edu_level">
                                            <option value="">select...</option>
                                            @foreach ($degree as $key => $deg)
                                                <option value="{{ $deg->name }}">{{ $deg->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="education-type form-group col-md-6">
                                        <label for="exam_title">Exam/Degree Title<span title="Required"
                                                class="text-dangre">*</span>
                                        </label>

                                        @error('exam_title')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                        <select required="required" class="form-control" name="exam_title"
                                            id="exam_title">

                                            <option value="">select...</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6" id="showSubject">
                                        <label for="major_group">Concentration/ Major/Group <span title="Required"
                                                class="text-dangre">*</span>
                                            @error('major_group')
                                                <span class="text-danger" id="">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input type="text" id="major_group" name="major_group" class="form-control"
                                            placeholder="" value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exam_board">Board <span title="Required" class="text-dangre">*</span>
                                            @error('exam_board')
                                                <span class="text-danger" id="">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <select class="form-control" name="exam_board" id="exam_board">
                                            <option value="">Select</option>
                                            @foreach ($boards as $key => $board)
                                                <option value="{{ $board->name }}">{{ $board->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <fieldset>
                                            <legend for="institute_name" class="label">Institute Name <span
                                                    title="Required" class="text-dangre">*</span>
                                                @error('institute_name')
                                                    <span class="text-danger" id="">{{ $message }}</span>
                                                @enderror
                                            </legend>
                                            <input type="text" maxlength="100" id="institute_name"
                                                name="institute_name"
                                                class="form-control autosuggest ui-autocomplete-input" placeholder=""
                                                value="">
                                            <label class="checkbox-inline m-t-10 btn-form-control">
                                                <input type="checkbox" id="is_foreign_inst" name="is_foreign_inst"
                                                    value="1">
                                                This is a foreign institute
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row" id="f_country" style="display:none;">
                                    <div class="form-group col-md-12">
                                        <label for="foreign_country">Country of Foreign University
                                            @error('foreign_country')
                                                <span class="text-danger" id="">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input type="text" class="form-control" placeholder="" value=""
                                            name="foreign_country" id="foreign_country">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="result">Result <span title="Required" class="text-dangre">*</span>
                                            @error('institute_name')
                                                <span class="text-danger" id="">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <select class="form-control" name="result" id="result">
                                            <option value="">Select</option>
                                            <option value="First Division">First Division/Class</option>
                                            <option value="Second Division">Second Division/Class</option>
                                            <option value="Third Division">Third Division/Class</option>
                                            <option value="Grade">Grade</option>
                                            <option value="Appeared">Appeared</option>
                                            <option value="Enrolled">Enrolled</option>
                                            <option value="Awarded">Awarded</option>
                                            <option value="Pass">Pass</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6" id="marksDiv">
                                        <label for="marks" id="labMarks"> Marks (%) <span title="Required"
                                                class="text-dangre">*</span>
                                            @error('institute_name')
                                                <span class="text-danger" id="">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input type="text" id="marks" name="marks" class="form-control"
                                            placeholder="" value="">
                                    </div>
                                    <div class="form-group col-md-6" id="CGPADiv">
                                        <label for="CGPA">CGPA <span title="Required" class="text-dangre">*</span>
                                            @error('CGPA')
                                                <span class="text-danger" id="">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input class="form-control" id="CGPA" name="CGPA" placeholder=""
                                            value="" type="text">
                                    </div>
                                    <div class="form-group col-md-6" id="scaleDiv">
                                        <label for="scale">Scale <span title="Required" class="text-dangre">*</span>
                                            @error('scale')
                                                <span class="text-danger" id="">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input class="form-control" id="scale" name="scale" placeholder=""
                                            value="" type="text">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="passing_year" id="yrsOfPass">
                                            <span>Year of Passing</span>
                                            <span title="Required" class="text-dangre">*</span>
                                            @error('passing_year')
                                                <span class="text-danger" id="">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <select class="form-control" name="passing_year" id="passing_year">
                                            <option value="">Year</option>
                                            <option value="2030">2030</option>
                                            <option value="2029">2029</option>
                                            <option value="2028">2028</option>
                                            <option value="2027">2027</option>
                                            <option value="2026">2026</option>
                                            <option value="2025">2025</option>
                                            <option value="2024">2024</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                            <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                            <option value="2009">2009</option>
                                            <option value="2008">2008</option>
                                            <option value="2007">2007</option>
                                            <option value="2006">2006</option>
                                            <option value="2005">2005</option>
                                            <option value="2004">2004</option>
                                            <option value="2003">2003</option>
                                            <option value="2002">2002</option>
                                            <option value="2001">2001</option>
                                            <option value="2000">2000</option>
                                            <option value="1999">1999</option>
                                            <option value="1998">1998</option>
                                            <option value="1997">1997</option>
                                            <option value="1996">1996</option>
                                            <option value="1995">1995</option>
                                            <option value="1994">1994</option>
                                            <option value="1993">1993</option>
                                            <option value="1992">1992</option>
                                            <option value="1991">1991</option>
                                            <option value="1990">1990</option>
                                            <option value="1989">1989</option>
                                            <option value="1988">1988</option>
                                            <option value="1987">1987</option>
                                            <option value="1986">1986</option>
                                            <option value="1985">1985</option>
                                            <option value="1984">1984</option>
                                            <option value="1983">1983</option>
                                            <option value="1982">1982</option>
                                            <option value="1981">1981</option>
                                            <option value="1980">1980</option>
                                            <option value="1979">1979</option>
                                            <option value="1978">1978</option>
                                            <option value="1977">1977</option>
                                            <option value="1976">1976</option>
                                            <option value="1975">1975</option>
                                            <option value="1974">1974</option>
                                            <option value="1973">1973</option>
                                            <option value="1972">1972</option>
                                            <option value="1971">1971</option>
                                            <option value="1970">1970</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="edu_duration">Duration <small>(Years)</small>
                                            @error('edu_duration')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input type="text" class="form-control" placeholder="" value=""
                                            name="edu_duration" id="edu_duration">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="achievement">Achievement
                                            @error('edu_duration')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input type="text" class="form-control" placeholder="" value=""
                                            name="achievement" id="achievement">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-end">
                                    <input type="submit" class="btn btn-primary" title="Save new Academic information"
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
                <button class="btn btn-success mt-5" id="btnAdd_aca"><i class="icon-plus"></i>&nbsp;Add Education (If
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

        $(document).ready(function() {

            $('#edu_level').on('change', function() {
                let degree = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: "{{ route('degree.api') }}",
                    data: {
                        degree: degree
                    },
                    success: function(response) {
                        console.log(response);

                        $('#exam_title').find("option").not(":first").remove();
                        $.each(response, function(index, element) {
                            $('#exam_title').append(
                                `<option value = "${element.name}">${element.name}</option>`
                            );
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('Failed to fetch exam. Please try again.');
                    }
                });
            });
        });

        $(document).ready(function() {
            if ($('#is_foreign_inst').is(':checked')) {
                $('#f_country').show().find('input, select').prop('disabled', false);
            } else {
                $('#f_country').hide().find('input, select').prop('disabled', true);
            }

            $('#is_foreign_inst').click(function() {
                if ($(this).is(':checked')) {
                    $('#f_country').show().find('input, select').prop('disabled', false);
                } else {
                    $('#f_country').hide().find('input, select').prop('disabled', true);
                }
            })
        });

        $(document).ready(function() {
            $('#CGPADiv, #scaleDiv').hide().find('input, select').prop('disabled', true);
            $('#marksDiv').show().find('input, select').prop('disabled', false);

            $('#result').change(function() {
                let result = $(this).val();
                console.log(result);

                if (result === 'First Division' || result === 'Second Division' || result ===
                    'Third Division') {
                    $('#marksDiv').show().find('input, select').prop('disabled', false);
                    $('#CGPADiv, #scaleDiv').hide().find('input, select').prop('disabled', true);
                } else if (result === 'Grade') {
                    $('#CGPADiv, #scaleDiv').show().find('input, select').prop('disabled', false);
                    $('#marksDiv').hide().find('input, select').prop('disabled', true);
                } else {
                    $('#marksDiv, #CGPADiv, #scaleDiv').hide().find('input, select').prop('disabled', true);
                }
            });
        });

        $(document).ready(function() {
            $('#present_district').on('change', function() {
                let district = $(this).val();

                console.log(district);

                $.ajax({
                    type: 'GET',
                    url: "{{ route('address.details.thana') }}",
                    data: {
                        district: district
                    },
                    success: function(response) {
                        console.log(response);

                        let thana = response['thana']

                        $('#present_thana').find("option").not(":first").remove();
                        $.each(thana, function(index, element) {
                            $('#present_thana').append(
                                `<option value = "${element.thana}">${element.thana}</option>`
                            );
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('Failed to fetch thana. Please try again.');
                    }
                });
            });

            $('#permanent_district').on('change', function() {
                let district = $(this).val();

                console.log(district);

                $.ajax({
                    type: 'GET',
                    url: "{{ route('address.details.thana') }}",
                    data: {
                        district: district
                    },
                    success: function(response) {
                        console.log(response);

                        let thana = response['thana']

                        $('#permanent_thana').find("option").not(":first").remove();
                        $.each(thana, function(index, element) {
                            $('#permanent_thana').append(
                                `<option value = "${element.thana}">${element.thana}</option>`
                            );
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('Failed to fetch thana. Please try again.');
                    }
                });
            });
        });
    </script>
@endsection
