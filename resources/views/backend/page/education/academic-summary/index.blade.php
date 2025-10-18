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
                                            <p class="p">{{ $education->institute_name }}</p>

                                            <label class="checkbox-inline m-t-10 btn-form-control">
                                                <input type="checkbox" id="upd_is_foreign_inst" name="is_foreign_inst"
                                                    value="1" @checked($education->is_foreign_inst)>
                                                This is a foreign institute
                                            </label>
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
                        <form action="{{ route('education.update', $education->slug) }}" class=""
                            id="" method="POST" enctype="multipart/form-data">
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
                                                <option value="Secondary"
                                                    {{ $education->edu_level == 'Secondary' ? 'selected' : '' }}>Secondary
                                                </option>
                                                <option value="Higher Secondary"
                                                    {{ $education->edu_level == 'Higher Secondary' ? 'selected' : '' }}>
                                                    Higher Secondary</option>
                                                <option value="Diploma"
                                                    {{ $education->edu_level == 'Diploma' ? 'selected' : '' }}>Diploma
                                                </option>
                                                <option value="Honors"
                                                    {{ $education->edu_level == 'Honors' ? 'selected' : '' }}>
                                                    Bachelor/Honors</option>
                                                <option value="Masters"
                                                    {{ $education->edu_level == 'Masters' ? 'selected' : '' }}>Masters
                                                </option>
                                                <option value="PhD"
                                                    {{ $education->edu_level == 'PhD' ? 'selected' : '' }}>PhD (Doctor of
                                                    Philosophy)</option>
                                            </select>

                                        </div>
                                        <div class="education-type form-group col-md-6">
                                            <label for="upd_exam_title_{{ $education->id }}">Exam/Degree Title<span
                                                    title="Required" class="text-dangre">*</span>
                                                @error('exam_title')
                                                    <span class="text-danger" id="">{{ $message }}</span>
                                                @enderror

                                            </label>
                                            <div class="row">
                                                <div class="col-md-12 form-group"
                                                    id="upd_secondaryEduType_{{ $education->id }}" style="display:none;">
                                                    <select class="form-control" name="exam_title"
                                                        id="upd_exam_title_{{ $education->id }}" disabled>
                                                        <option value="SSC"
                                                            {{ $education->exam_title == 'SSC' ? 'selected' : '' }}>SSC
                                                        </option>
                                                        <option value="O Level"
                                                            {{ $education->exam_title == 'O Level' ? 'selected' : '' }}>O
                                                            Level</option>
                                                        <option value="Dakhil (Madrasah)"
                                                            {{ $education->exam_title == 'Dakhil (Madrasah)' ? 'selected' : '' }}>
                                                            Dakhil (Madrasah)</option>
                                                        <option value="SSC (Vocational)"
                                                            {{ $education->exam_title == 'SSC (Vocational)' ? 'selected' : '' }}>
                                                            SSC (Vocational)</option>
                                                        <option value="others"
                                                            {{ $education->exam_title == 'others' ? 'selected' : '' }}>
                                                            Other</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-12 form-group"
                                                    id="upd_higher_secondaryEduType_{{ $education->id }}"
                                                    style="display:none;">
                                                    <select class="form-control" name="exam_title"
                                                        id="upd_exam_title_{{ $education->id }}" disabled>
                                                        <option value="HSC"
                                                            {{ $education->exam_title == 'HSC' ? 'selected' : '' }}>HSC
                                                        </option>
                                                        <option value="Alim (Madrasah)"
                                                            {{ $education->exam_title == 'Alim (Madrasah)' ? 'selected' : '' }}>
                                                            Alim (Madrasah)</option>
                                                        <option value="HSC (Vocational)"
                                                            {{ $education->exam_title == 'HSC (Vocational)' ? 'selected' : '' }}>
                                                            HSC (Vocational)</option>
                                                        <option value="others"
                                                            {{ $education->exam_title == 'others' ? 'selected' : '' }}>
                                                            Other</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-12 form-group"
                                                    id="upd_diplomaEduType_{{ $education->id }}" style="display:none;">
                                                    <select class="form-control" name="exam_title"
                                                        id="upd_exam_title_{{ $education->id }}" disabled>
                                                        <option value="Diploma in Engineering"
                                                            {{ $education->exam_title == 'Diploma in Engineering' ? 'selected' : '' }}>
                                                            Diploma in Engineering</option>
                                                        <option value="Diploma in Medical Technology"
                                                            {{ $education->exam_title == 'Diploma in Medical Technology' ? 'selected' : '' }}>
                                                            Diploma in Medical Technology</option>
                                                        <option value="Diploma in Nursing"
                                                            {{ $education->exam_title == 'Diploma in Nursing' ? 'selected' : '' }}>
                                                            Diploma in Nursing</option>
                                                        <option value="Diploma in Commerce"
                                                            {{ $education->exam_title == 'Diploma in Commerce' ? 'selected' : '' }}>
                                                            Diploma in Commerce</option>
                                                        <option value="Diploma in Business Studies"
                                                            {{ $education->exam_title == 'Diploma in Business Studies' ? 'selected' : '' }}>
                                                            Diploma in Business Studies</option>
                                                        <option value="Post Graduate Diploma (PGD)"
                                                            {{ $education->exam_title == 'Post Graduate Diploma (PGD)' ? 'selected' : '' }}>
                                                            Post Graduate Diploma (PGD)</option>
                                                        <option value="Diploma in Pathology"
                                                            {{ $education->exam_title == 'Diploma in Pathology' ? 'selected' : '' }}>
                                                            Diploma in Pathology</option>
                                                        <option value="Diploma (Vocational)"
                                                            {{ $education->exam_title == 'Diploma (Vocational)' ? 'selected' : '' }}>
                                                            Diploma (Vocational)</option>
                                                        <option value="Diploma in Hotel Management"
                                                            {{ $education->exam_title == 'Diploma in Hotel Management' ? 'selected' : '' }}>
                                                            Diploma in Hotel Management</option>
                                                        <option value="Diploma in Computer"
                                                            {{ $education->exam_title == 'Diploma in Computer' ? 'selected' : '' }}>
                                                            Diploma in Computer</option>
                                                        <option value="Diploma in Mechanical"
                                                            {{ $education->exam_title == 'Diploma in Mechanical' ? 'selected' : '' }}>
                                                            Diploma in Mechanical</option>
                                                        <option value="Diploma in Refrigeration and air Conditioning"
                                                            {{ $education->exam_title == 'Diploma in Refrigeration and air Conditioning' ? 'selected' : '' }}>
                                                            Diploma in Refrigeration and air Conditioning</option>
                                                        <option value="Diploma in Electrical"
                                                            {{ $education->exam_title == 'Diploma in Electrical' ? 'selected' : '' }}>
                                                            Diploma in Electrical</option>
                                                        <option value="Diploma in Automobile"
                                                            {{ $education->exam_title == 'Diploma in Automobile' ? 'selected' : '' }}>
                                                            Diploma in Automobile</option>
                                                        <option value="Diploma in Power"
                                                            {{ $education->exam_title == 'Diploma in Power' ? 'selected' : '' }}>
                                                            Diploma in Power</option>
                                                        <option value="Diploma in Electronics"
                                                            {{ $education->exam_title == 'Diploma in Electronics' ? 'selected' : '' }}>
                                                            Diploma in Electronics</option>
                                                        <option value="Diploma in Architecture"
                                                            {{ $education->exam_title == 'Diploma in Architecture' ? 'selected' : '' }}>
                                                            Diploma in Architecture</option>
                                                        <option value="Diploma in Electro medical"
                                                            {{ $education->exam_title == 'Diploma in Electro medical' ? 'selected' : '' }}>
                                                            Diploma in Electro medical</option>
                                                        <option value="Diploma in Civil"
                                                            {{ $education->exam_title == 'Diploma in Civil' ? 'selected' : '' }}>
                                                            Diploma in Civil</option>
                                                        <option value="Diploma in Marine Engineering"
                                                            {{ $education->exam_title == 'Diploma in Marine Engineering' ? 'selected' : '' }}>
                                                            Diploma in Marine Engineering</option>
                                                        <option value="Diploma in Medical"
                                                            {{ $education->exam_title == 'Diploma in Medical' ? 'selected' : '' }}>
                                                            Diploma in Medical</option>
                                                        <option value="Diploma in Midwifery"
                                                            {{ $education->exam_title == 'Diploma in Midwifery' ? 'selected' : '' }}>
                                                            Diploma in Midwifery</option>
                                                        <option value="Diploma in Medical Ultrasound"
                                                            {{ $education->exam_title == 'Diploma in Medical Ultrasound' ? 'selected' : '' }}>
                                                            Diploma in Medical Ultrasound</option>
                                                        <option value="Diploma in Health Technology and Services"
                                                            {{ $education->exam_title == 'Diploma in Health Technology and Services' ? 'selected' : '' }}>
                                                            Diploma in Health Technology and Services</option>
                                                        <option value="Diploma in Agriculture"
                                                            {{ $education->exam_title == 'Diploma in Agriculture' ? 'selected' : '' }}>
                                                            Diploma in Agriculture</option>
                                                        <option value="Diploma in Fisheries"
                                                            {{ $education->exam_title == 'Diploma in Fisheries' ? 'selected' : '' }}>
                                                            Diploma in Fisheries</option>
                                                        <option value="Diploma in Livestock"
                                                            {{ $education->exam_title == 'Diploma in Livestock' ? 'selected' : '' }}>
                                                            Diploma in Livestock</option>
                                                        <option value="Diploma in Forestry"
                                                            {{ $education->exam_title == 'Diploma in Forestry' ? 'selected' : '' }}>
                                                            Diploma in Forestry</option>
                                                        <option value="Diploma in Textile Engineering"
                                                            {{ $education->exam_title == 'Diploma in Textile Engineering' ? 'selected' : '' }}>
                                                            Diploma in Textile Engineering</option>
                                                        <option value="Certificate in Marine Trade"
                                                            {{ $education->exam_title == 'Certificate in Marine Trade' ? 'selected' : '' }}>
                                                            Certificate in Marine Trade</option>
                                                        <option value="Diploma in Medical Technology (Physiotherapy)"
                                                            {{ $education->exam_title == 'Diploma in Medical Technology (Physiotherapy)' ? 'selected' : '' }}>
                                                            Diploma in Medical Technology (Physiotherapy)</option>
                                                        <option value="others"
                                                            {{ $education->exam_title == 'others' ? 'selected' : '' }}>
                                                            Other</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-12 form-group"
                                                    id="upd_honorsEduType_{{ $education->id }}" style="display:none;">
                                                    <select class="form-control" name="exam_title"
                                                        id="upd_exam_title_{{ $education->id }}" disabled>
                                                        <option value="Bachelor of Science (BSc)"
                                                            {{ $education->exam_title == 'Bachelor of Science (BSc)' ? 'selected' : '' }}>
                                                            Bachelor of Science (BSc)</option>
                                                        <option value="Bachelor of Arts (BA)"
                                                            {{ $education->exam_title == 'Bachelor of Arts (BA)' ? 'selected' : '' }}>
                                                            Bachelor of Arts (BA)</option>
                                                        <option value="Bachelor of Commerce (BCom)"
                                                            {{ $education->exam_title == 'Bachelor of Commerce (BCom)' ? 'selected' : '' }}>
                                                            Bachelor of Commerce (BCom)</option>
                                                        <option value="Bachelor of Commerce (Pass)"
                                                            {{ $education->exam_title == 'Bachelor of Commerce (Pass)' ? 'selected' : '' }}>
                                                            Bachelor of Commerce (Pass)</option>
                                                        <option value="Bachelor of Business Administration (BBA)"
                                                            {{ $education->exam_title == 'Bachelor of Business Administration (BBA)' ? 'selected' : '' }}>
                                                            Bachelor of Business Administration (BBA)</option>
                                                        <option value="Bachelor of Medicine and Bachelor of Surgery(MBBS)"
                                                            {{ $education->exam_title == 'Bachelor of Medicine and Bachelor of Surgery(MBBS)' ? 'selected' : '' }}>
                                                            Bachelor of Medicine and Bachelor of Surgery(MBBS)</option>
                                                        <option value="Bachelor of Dental Surgery (BDS)"
                                                            {{ $education->exam_title == 'Bachelor of Dental Surgery (BDS)' ? 'selected' : '' }}>
                                                            Bachelor of Dental Surgery (BDS)</option>
                                                        <option value="Bachelor of Architecture (B.Arch)"
                                                            {{ $education->exam_title == 'Bachelor of Architecture (B.Arch)' ? 'selected' : '' }}>
                                                            Bachelor of Architecture (B.Arch)</option>
                                                        <option value="Bachelor of Pharmacy (B.Pharm)"
                                                            {{ $education->exam_title == 'Bachelor of Pharmacy (B.Pharm)' ? 'selected' : '' }}>
                                                            Bachelor of Pharmacy (B.Pharm)</option>
                                                        <option value="Bachelor of Education (B.Ed)"
                                                            {{ $education->exam_title == 'Bachelor of Education (B.Ed)' ? 'selected' : '' }}>
                                                            Bachelor of Education (B.Ed)</option>
                                                        <option value="Bachelor of Physical Education (BPEd)"
                                                            {{ $education->exam_title == 'Bachelor of Physical Education (BPEd)' ? 'selected' : '' }}>
                                                            Bachelor of Physical Education (BPEd)</option>
                                                        <option value="Bachelor of Law (LLB)"
                                                            {{ $education->exam_title == 'Bachelor of Law (LLB)' ? 'selected' : '' }}>
                                                            Bachelor of Law (LLB)</option>
                                                        <option value="Doctor of Veterinary Medicine (DVM)"
                                                            {{ $education->exam_title == 'Doctor of Veterinary Medicine (DVM)' ? 'selected' : '' }}>
                                                            Doctor of Veterinary Medicine (DVM)</option>
                                                        <option value="Bachelor of Social Science (BSS)"
                                                            {{ $education->exam_title == 'Bachelor of Social Science (BSS)' ? 'selected' : '' }}>
                                                            Bachelor of Social Science (BSS)</option>
                                                        <option value="Bachelor of Fine Arts (B.F.A)"
                                                            {{ $education->exam_title == 'Bachelor of Fine Arts (B.F.A)' ? 'selected' : '' }}>
                                                            Bachelor of Fine Arts (B.F.A)</option>
                                                        <option value="Bachelor of Business Studies (BBS)"
                                                            {{ $education->exam_title == 'Bachelor of Business Studies (BBS)' ? 'selected' : '' }}>
                                                            Bachelor of Business Studies (BBS)</option>
                                                        <option value="Bachelor of Computer Application (BCA)"
                                                            {{ $education->exam_title == 'Bachelor of Computer Application (BCA)' ? 'selected' : '' }}>
                                                            Bachelor of Computer Application (BCA)</option>
                                                        <option value="Fazil (Madrasah Hons.)"
                                                            {{ $education->exam_title == 'Fazil (Madrasah Hons.)' ? 'selected' : '' }}>
                                                            Fazil (Madrasah Hons.)</option>
                                                        <option value="Bachelor in Engineering (BEngg)"
                                                            {{ $education->exam_title == 'Bachelor in Engineering (BEngg)' ? 'selected' : '' }}>
                                                            Bachelor in Engineering (BEngg)</option>
                                                        <option value="Bachelor of Science (Pass)"
                                                            {{ $education->exam_title == 'Bachelor of Science (Pass)' ? 'selected' : '' }}>
                                                            Bachelor of Science (Pass)</option>
                                                        <option value="Bachelor of Arts (Pass)"
                                                            {{ $education->exam_title == 'Bachelor of Arts (Pass)' ? 'selected' : '' }}>
                                                            Bachelor of Arts (Pass)</option>
                                                        <option value="Bachelor of Law (Pass)"
                                                            {{ $education->exam_title == 'Bachelor of Law (Pass)' ? 'selected' : '' }}>
                                                            Bachelor of Law (Pass)</option>
                                                        <option value="Bachelor of Social Science (Pass)"
                                                            {{ $education->exam_title == 'Bachelor of Social Science (Pass)' ? 'selected' : '' }}>
                                                            Bachelor of Social Science (Pass)</option>
                                                        <option value="Bachelor of Business Studies (Pass)"
                                                            {{ $education->exam_title == 'Bachelor of Business Studies (Pass)"' ? 'selected' : '' }}>
                                                            Bachelor of Business Studies (Pass)</option>
                                                        <option value="Fazil (Madrasah Pass)"
                                                            {{ $education->exam_title == 'Fazil (Madrasah Pass)' ? 'selected' : '' }}>
                                                            Fazil (Madrasah Pass)</option>
                                                        <option value="Bachelor of Physiotherapy (BPT)"
                                                            {{ $education->exam_title == 'Bachelor of Physiotherapy (BPT)' ? 'selected' : '' }}>
                                                            Bachelor of Physiotherapy (BPT)</option>
                                                        <option value="others"
                                                            {{ $education->exam_title == 'others' ? 'selected' : '' }}>
                                                            Other</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-12 form-group"
                                                    id="upd_masterEduType_{{ $education->id }}" style="display:none;">
                                                    <select class="form-control" name="exam_title"
                                                        id="upd_exam_title_{{ $education->id }}" disabled>
                                                        <option value="Master of Science (MSc)"
                                                            {{ $education->exam_title == 'Master of Science (MSc)' ? 'selected' : '' }}>
                                                            Master of Science (MSc)</option>
                                                        <option value="Master of Arts (MA)"
                                                            {{ $education->exam_title == 'Master of Arts (MA)' ? 'selected' : '' }}>
                                                            Master of Arts (MA)</option>
                                                        <option value="Master of Commerce (MCom)"
                                                            {{ $education->exam_title == 'Master of Commerce (MCom)' ? 'selected' : '' }}>
                                                            Master of Commerce (MCom)</option>
                                                        <option value="Master of Business Administration (MBA)"
                                                            {{ $education->exam_title == 'Master of Business Administration (MBA)' ? 'selected' : '' }}>
                                                            Master of Business Administration (MBA)</option>
                                                        <option value="Master of Architecture (M.Arch)"
                                                            {{ $education->exam_title == 'Master of Architecture (M.Arch)' ? 'selected' : '' }}>
                                                            Master of Architecture (M.Arch)</option>
                                                        <option value="Master of Pharmacy (M.Pharm)"
                                                            {{ $education->exam_title == 'Master of Pharmacy (M.Pharm)' ? 'selected' : '' }}>
                                                            Master of Pharmacy (M.Pharm)</option>
                                                        <option value="Master of Education (M.Ed)"
                                                            {{ $education->exam_title == 'Master of Education (M.Ed)' ? 'selected' : '' }}>
                                                            Master of Education (M.Ed)</option>
                                                        <option value="Master of Law (LLM)"
                                                            {{ $education->exam_title == 'Master of Law (LLM)' ? 'selected' : '' }}>
                                                            Master of Law (LLM)</option>
                                                        <option value="Master of Social Science (MSS)"
                                                            {{ $education->exam_title == 'Master of Social Science (MSS)' ? 'selected' : '' }}>
                                                            Master of Social Science (MSS)</option>
                                                        <option value="Master of Fine Arts (M.F.A)"
                                                            {{ $education->exam_title == 'Master of Fine Arts (M.F.A)' ? 'selected' : '' }}>
                                                            Master of Fine Arts (M.F.A)</option>
                                                        <option value="Master of Philosophy (M.Phil)"
                                                            {{ $education->exam_title == 'Master of Philosophy (M.Phil)' ? 'selected' : '' }}>
                                                            Master of Philosophy (M.Phil)</option>
                                                        <option value="Master of Business Management (MBM)"
                                                            {{ $education->exam_title == 'Master of Business Management (MBM)' ? 'selected' : '' }}>
                                                            Master of Business Management (MBM)</option>
                                                        <option value="Master of Development Studies (MDS)"
                                                            {{ $education->exam_title == 'Master of Development Studies (MDS)' ? 'selected' : '' }}>
                                                            Master of Development Studies (MDS)</option>
                                                        <option value="Master of Business Studies (MBS)"
                                                            {{ $education->exam_title == 'Master of Business Studies (MBS)' ? 'selected' : '' }}>
                                                            Master of Business Studies (MBS)</option>
                                                        <option value="Masters in Computer Application (MCA)"
                                                            {{ $education->exam_title == 'Masters in Computer Application (MCA)' ? 'selected' : '' }}>
                                                            Masters in Computer Application (MCA)</option>
                                                        <option value="Executive Master of Business Administration (EMBA)"
                                                            {{ $education->exam_title == 'Executive Master of Business Administration (EMBA)' ? 'selected' : '' }}>
                                                            Executive Master of Business Administration (EMBA)</option>
                                                        <option
                                                            value="Fellowship of the College of Physicians and Surgeons (FCPS)"
                                                            {{ $education->exam_title == 'Fellowship of the College of Physicians and Surgeons (FCPS)' ? 'selected' : '' }}>
                                                            Fellowship of the College of Physicians and Surgeons (FCPS)
                                                        </option>
                                                        <option value="Kamil (Madrasah)"
                                                            {{ $education->exam_title == 'Kamil (Madrasah)' ? 'selected' : '' }}>
                                                            Kamil (Madrasah)</option>
                                                        <option value="Masters in Engineering (MEngg)"
                                                            {{ $education->exam_title == 'Masters in Engineering (MEngg)' ? 'selected' : '' }}>
                                                            Masters in Engineering (MEngg)</option>
                                                        <option value="Masters in Bank Management (MBM)"
                                                            {{ $education->exam_title == 'Masters in Bank Management (MBM)' ? 'selected' : '' }}>
                                                            Masters in Bank Management (MBM)</option>
                                                        <option value="Masters in Information Systems Security (MISS)"
                                                            {{ $education->exam_title == 'Masters in Information Systems Security (MISS)' ? 'selected' : '' }}>
                                                            Masters in Information Systems Security (MISS)</option>
                                                        <option
                                                            value="Master of Information & Communication Technology (MICT)"
                                                            {{ $education->exam_title == 'Master of Information & Communication Technology (MICT)' ? 'selected' : '' }}>
                                                            Master of Information &amp; Communication Technology (MICT)
                                                        </option>
                                                        <option
                                                            value="Master of Disability Management and Rehabilitation (MDMR)"
                                                            {{ $education->exam_title == 'Master of Disability Management and Rehabilitation (MDMR)' ? 'selected' : '' }}>
                                                            Master of Disability Management and Rehabilitation (MDMR)
                                                        </option>
                                                        <option value="Master of Physiotherapy (MPT)"
                                                            {{ $education->exam_title == 'Master of Physiotherapy (MPT)' ? 'selected' : '' }}>
                                                            Master of Physiotherapy (MPT)</option>
                                                        <option value="others"
                                                            {{ $education->exam_title == 'others' ? 'selected' : '' }}>
                                                            Other</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-12 form-group"
                                                    id="upd_inputdivEduType_{{ $education->id }}" style="display:none;">
                                                    <input type="text" class="form-control m-t-10" name="exam_title"
                                                        id="upd_exam_title_input_{{ $education->id }}"
                                                        placeholder="Type exam/degree title" disabled
                                                        value="{{ $education->exam_title }}">

                                                </div>
                                            </div>
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
                                                <option value="Barishal"
                                                    {{ $education->exam_board == 'Barishal' ? 'selected' : '' }}>Barishal
                                                </option>
                                                <option value="Chattogram"
                                                    {{ $education->exam_board == 'Chattogram' ? 'selected' : '' }}>
                                                    Chattogram</option>
                                                <option value="Cumilla"
                                                    {{ $education->exam_board == 'Cumilla' ? 'selected' : '' }}>Cumilla
                                                </option>
                                                <option value="Dhaka"
                                                    {{ $education->exam_board == 'Dhaka' ? 'selected' : '' }}>Dhaka
                                                </option>
                                                <option value="Dinajpur"
                                                    {{ $education->exam_board == 'Dinajpur' ? 'selected' : '' }}>Dinajpur
                                                </option>
                                                <option value="Jashore"
                                                    {{ $education->exam_board == 'Jashore' ? 'selected' : '' }}>Jashore
                                                </option>
                                                <option value="Mymensingh"
                                                    {{ $education->exam_board == 'Mymensingh' ? 'selected' : '' }}>
                                                    Mymensingh</option>
                                                <option value="Rajshahi"
                                                    {{ $education->exam_board == 'Rajshahi' ? 'selected' : '' }}>Rajshahi
                                                </option>
                                                <option value="Sylhet"
                                                    {{ $education->exam_board == 'Sylhet' ? 'selected' : '' }}>Sylhet
                                                </option>
                                                <option value="Madrasah"
                                                    {{ $education->exam_board == 'Madrasah' ? 'selected' : '' }}>Madrasah
                                                </option>
                                                <option value="Technical"
                                                    {{ $education->exam_board == 'Technical' ? 'selected' : '' }}>
                                                    Technical</option>
                                                <option value="BOU"
                                                    {{ $education->exam_board == 'BOU' ? 'selected' : '' }}>BOU</option>
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
                                            <option value="Secondary">Secondary</option>
                                            <option value="Higher Secondary">Higher Secondary</option>
                                            <option value="Diploma">Diploma</option>
                                            <option value="Honors">Bachelor/Honors</option>
                                            <option value="Masters">Masters</option>
                                            <option value="PhD">PhD (Doctor of Philosophy)</option>
                                        </select>

                                    </div>
                                    <div class="education-type form-group col-md-6">
                                        <label for="exam_title">Exam/Degree Title<span title="Required"
                                                class="text-dangre">*</span>                                            
                                        </label>
                                        @error('exam_title')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                        <div class="row">
                                            <div class="col-md-12" id="secondaryEduType" style="display:none;">
                                                <select class="form-control" name="exam_title" disabled>
                                                    <option value="SSC">SSC</option>
                                                    <option value="O Level">O Level</option>
                                                    <option value="Dakhil (Madrasah)">Dakhil (Madrasah)</option>
                                                    <option value="SSC (Vocational)">SSC (Vocational)</option>
                                                    <option value="others">Other</option>
                                                </select>
                                            </div>

                                            <div class="col-md-12" id="higher_secondaryEduType" style="display:none;">
                                                <select class="form-control" name="exam_title" disabled>
                                                    <option value="HSC">HSC</option>
                                                    <option value="Alim (Madrasah)">Alim (Madrasah)</option>
                                                    <option value="HSC (Vocational)">HSC (Vocational)</option>
                                                    <option value="others">Other</option>
                                                </select>
                                            </div>

                                            <div class="" id="diplomaEduType" style="display:none;">
                                                <select class="form-control" name="exam_title"
                                                    onchange="DisableOtherEduType();" disabled>
                                                    <option value="Diploma in Engineering">Diploma in Engineering</option>
                                                    <option value="Diploma in Medical Technology">Diploma in Medical
                                                        Technology</option>
                                                    <option value="Diploma in Nursing">Diploma in Nursing</option>
                                                    <option value="Diploma in Commerce">Diploma in Commerce</option>
                                                    <option value="Diploma in Business Studies">Diploma in Business Studies
                                                    </option>
                                                    <option value="Post Graduate Diploma (PGD)">Post Graduate Diploma (PGD)
                                                    </option>
                                                    <option value="Diploma in Pathology">Diploma in Pathology</option>
                                                    <option value="Diploma (Vocational)">Diploma (Vocational)</option>
                                                    <option value="Diploma in Hotel Management">Diploma in Hotel Management
                                                    </option>
                                                    <option value="Diploma in Computer">Diploma in Computer</option>
                                                    <option value="Diploma in Mechanical">Diploma in Mechanical</option>
                                                    <option value="Diploma in Refrigeration and air Conditioning">Diploma
                                                        in Refrigeration and air Conditioning</option>
                                                    <option value="Diploma in Electrical">Diploma in Electrical</option>
                                                    <option value="Diploma in Automobile">Diploma in Automobile</option>
                                                    <option value="Diploma in Power">Diploma in Power</option>
                                                    <option value="Diploma in Electronics">Diploma in Electronics</option>
                                                    <option value="Diploma in Architecture">Diploma in Architecture
                                                    </option>
                                                    <option value="Diploma in Electro medical">Diploma in Electro medical
                                                    </option>
                                                    <option value="Diploma in Civil">Diploma in Civil</option>
                                                    <option value="Diploma in Marine Engineering">Diploma in Marine
                                                        Engineering</option>
                                                    <option value="Diploma in Medical">Diploma in Medical</option>
                                                    <option value="Diploma in Midwifery">Diploma in Midwifery</option>
                                                    <option value="Diploma in Medical Ultrasound">Diploma in Medical
                                                        Ultrasound</option>
                                                    <option value="Diploma in Health Technology and Services">Diploma in
                                                        Health Technology and Services</option>
                                                    <option value="Diploma in Agriculture">Diploma in Agriculture</option>
                                                    <option value="Diploma in Fisheries">Diploma in Fisheries</option>
                                                    <option value="Diploma in Livestock">Diploma in Livestock</option>
                                                    <option value="Diploma in Forestry">Diploma in Forestry</option>
                                                    <option value="Diploma in Textile Engineering">Diploma in Textile
                                                        Engineering</option>
                                                    <option value="Certificate in Marine Trade">Certificate in Marine Trade
                                                    </option>
                                                    <option value="Diploma in Medical Technology (Physiotherapy)">Diploma
                                                        in Medical Technology (Physiotherapy)</option>
                                                    <option value="others" undefined="">Other</option>
                                                </select>
                                            </div>

                                            <div class="" id="honorsEduType" style="display:none;">
                                                <select class="form-control" name="exam_title" disabled>
                                                    <option value="Bachelor of Science (BSc)">Bachelor of Science (BSc)
                                                    </option>
                                                    <option value="Bachelor of Arts (BA)">Bachelor of Arts (BA)</option>
                                                    <option value="Bachelor of Commerce (BCom)">Bachelor of Commerce (BCom)
                                                    </option>
                                                    <option value="Bachelor of Commerce (Pass)">Bachelor of Commerce (Pass)
                                                    </option>
                                                    <option value="Bachelor of Business Administration (BBA)">Bachelor of
                                                        Business Administration (BBA)</option>
                                                    <option value="Bachelor of Medicine and Bachelor of Surgery(MBBS)">
                                                        Bachelor of Medicine and Bachelor of Surgery(MBBS)</option>
                                                    <option value="Bachelor of Dental Surgery (BDS)">Bachelor of Dental
                                                        Surgery (BDS)</option>
                                                    <option value="Bachelor of Architecture (B.Arch)">Bachelor of
                                                        Architecture (B.Arch)</option>
                                                    <option value="Bachelor of Pharmacy (B.Pharm)">Bachelor of Pharmacy
                                                        (B.Pharm)</option>
                                                    <option value="Bachelor of Education (B.Ed)">Bachelor of Education
                                                        (B.Ed)</option>
                                                    <option value="Bachelor of Physical Education (BPEd)">Bachelor of
                                                        Physical Education (BPEd)</option>
                                                    <option value="Bachelor of Law (LLB)">Bachelor of Law (LLB)</option>
                                                    <option value="Doctor of Veterinary Medicine (DVM)">Doctor of
                                                        Veterinary Medicine (DVM)</option>
                                                    <option value="Bachelor of Social Science (BSS)">Bachelor of Social
                                                        Science (BSS)</option>
                                                    <option value="Bachelor of Fine Arts (B.F.A)">Bachelor of Fine Arts
                                                        (B.F.A)</option>
                                                    <option value="Bachelor of Business Studies (BBS)">Bachelor of Business
                                                        Studies (BBS)</option>
                                                    <option value="Bachelor of Computer Application (BCA)">Bachelor of
                                                        Computer Application (BCA)</option>
                                                    <option value="Fazil (Madrasah Hons.)">Fazil (Madrasah Hons.)</option>
                                                    <option value="Bachelor in Engineering (BEngg)">Bachelor in Engineering
                                                        (BEngg)</option>
                                                    <option value="Bachelor of Science (Pass)">Bachelor of Science (Pass)
                                                    </option>
                                                    <option value="Bachelor of Arts (Pass)">Bachelor of Arts (Pass)
                                                    </option>
                                                    <option value="Bachelor of Law (Pass)">Bachelor of Law (Pass)</option>
                                                    <option value="Bachelor of Social Science (Pass)">Bachelor of Social
                                                        Science (Pass)</option>
                                                    <option value="Bachelor of Business Studies (Pass)">Bachelor of
                                                        Business Studies (Pass)</option>
                                                    <option value="Fazil (Madrasah Pass)">Fazil (Madrasah Pass)</option>
                                                    <option value="Bachelor of Physiotherapy (BPT)">Bachelor of
                                                        Physiotherapy (BPT)</option>
                                                    <option value="others" undefined="">Other</option>
                                                </select>
                                            </div>

                                            <div class="col-md-12" id="masterEduType" style="display:none;">
                                                <select class="form-control" name="exam_title" disabled>
                                                    <option value="Master of Science (MSc)">Master of Science (MSc)
                                                    </option>
                                                    <option value="Master of Arts (MA)">Master of Arts (MA)</option>
                                                    <option value="Master of Commerce (MCom)">Master of Commerce (MCom)
                                                    </option>
                                                    <option value="Master of Business Administration (MBA)">Master of
                                                        Business Administration (MBA)</option>
                                                    <option value="Master of Architecture (M.Arch)">Master of Architecture
                                                        (M.Arch)</option>
                                                    <option value="Master of Pharmacy (M.Pharm)">Master of Pharmacy
                                                        (M.Pharm)</option>
                                                    <option value="Master of Education (M.Ed)">Master of Education (M.Ed)
                                                    </option>
                                                    <option value="Master of Law (LLM)">Master of Law (LLM)</option>
                                                    <option value="Master of Social Science (MSS)">Master of Social Science
                                                        (MSS)</option>
                                                    <option value="Master of Fine Arts (M.F.A)">Master of Fine Arts (M.F.A)
                                                    </option>
                                                    <option value="Master of Philosophy (M.Phil)">Master of Philosophy
                                                        (M.Phil)</option>
                                                    <option value="Master of Business Management (MBM)">Master of Business
                                                        Management (MBM)</option>
                                                    <option value="Master of Development Studies (MDS)">Master of
                                                        Development Studies (MDS)</option>
                                                    <option value="Master of Business Studies (MBS)">Master of Business
                                                        Studies (MBS)</option>
                                                    <option value="Masters in Computer Application (MCA)">Masters in
                                                        Computer Application (MCA)</option>
                                                    <option value="Executive Master of Business Administration (EMBA)">
                                                        Executive Master of Business Administration (EMBA)</option>
                                                    <option
                                                        value="Fellowship of the College of Physicians and Surgeons (FCPS)">
                                                        Fellowship of the College of Physicians and Surgeons (FCPS)</option>
                                                    <option value="Kamil (Madrasah)">Kamil (Madrasah)</option>
                                                    <option value="Masters in Engineering (MEngg)">Masters in Engineering
                                                        (MEngg)</option>
                                                    <option value="Masters in Bank Management (MBM)">Masters in Bank
                                                        Management (MBM)</option>
                                                    <option value="Masters in Information Systems Security (MISS)">Masters
                                                        in Information Systems Security (MISS)</option>
                                                    <option
                                                        value="Master of Information &amp; Communication Technology (MICT)">
                                                        Master of Information &amp; Communication Technology (MICT)</option>
                                                    <option
                                                        value="Master of Disability Management and Rehabilitation (MDMR)">
                                                        Master of Disability Management and Rehabilitation (MDMR)</option>
                                                    <option value="Master of Physiotherapy (MPT)">Master of Physiotherapy
                                                        (MPT)</option>
                                                    <option value="others" undefined="">Other</option>
                                                </select>
                                            </div>

                                            <div class="col-md-12" id="inputdivEduType" style="display:none;">
                                                <input type="text" class="form-control m-t-10" name="exam_title"
                                                    id="exam_title_input" placeholder="Type exam/degree title"
                                                    value="" disabled>

                                            </div>
                                        </div>
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
                                    <div class="form-group col-md-6" id="showBoard" style="display: none">
                                        <label for="exam_board">Board <span title="Required" class="text-dangre">*</span>
                                            @error('exam_board')
                                                <span class="text-danger" id="">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <select class="form-control" name="exam_board" id="exam_board">
                                            <option value="">Select</option>
                                            <option value="Barishal">Barishal</option>
                                            <option value="Chattogram">Chattogram</option>
                                            <option value="Cumilla">Cumilla</option>
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Dinajpur">Dinajpur</option>
                                            <option value="Jashore">Jashore</option>
                                            <option value="Mymensingh">Mymensingh</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Sylhet">Sylhet</option>
                                            <option value="Madrasah">Madrasah</option>
                                            <option value="Technical">Technical</option>
                                            <option value="BOU">BOU</option>
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
            $('#higher_secondaryEduType, #diplomaEduType, #honorsEduType, #masterEduType, #inputdivEduType').hide()
                .find('input, select')
                .prop('disabled', true);
            $('#secondaryEduType').show().find('input, select').prop('disabled', false);
            $('#showBoard').show().find('input, select').prop('disabled', false);
            $('#edu_level').change(function() {
                let edu_level = $(this).val();

                $('#secondaryEduType, #higher_secondaryEduType, #diplomaEduType, #honorsEduType, #masterEduType, #inputdivEduType')
                    .hide().find('input, select').prop('disabled', true);
                $('#showBoard').hide().find('input, select').prop('disabled', true);

                if (edu_level === 'Secondary') {
                    $('#secondaryEduType').show().find('input, select').prop('disabled', false);
                    $('#showBoard').show().find('input, select').prop('disabled', false);
                } else if (edu_level === 'Higher Secondary') {.
                    $('#higher_secondaryEduType').show().find('input, select').prop('disabled', false);
                    $('#showBoard').show().find('input, select').prop('disabled', false);
                } else if (edu_level === 'Diploma') {
                    $('#diplomaEduType').show().find('input, select').prop('disabled', false);
                } else if (edu_level === 'Honors') {
                    $('#honorsEduType').show().find('input, select').prop('disabled', false);
                } else if (edu_level === 'Masters') {
                    $('#masterEduType').show().find('input, select').prop('disabled', false);
                } else {
                    $('#inputdivEduType').show().find('input, select').prop('disabled', false);
                }
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
