@extends('user.backend.partial.layout')

@section('content')

<div class="card" id="">
    <style>
        .label {
            font-size: 16px;
            font-weight: 600;
            color: #000000;
        }

        .p {
            font-size: 14px;
        }

    </style>
    <div class="card-header">
        <h4> Career and Application Information </h4>
    </div>
    @if($careerApplication)
    <div class="card-body">
        <div class="" id="applicationView">
            <div class="row">
                <div class="col-12 text-end">
                    <button class="btn" style="color: #0391e4; font-size: 16px;" id="applicationEditButton" title="Click on Edit to fill up career and application information"><i class="icon-pencil-o"></i>Edit</button>
                </div>

                <div class="col-12">
                    <label class="label">Objective</label>
                    <p class="p">{{ $careerApplication->objective }}</p>
                </div>

                <div class="col-md-6">
                    <label class="label">Present Salary</label>
                    <p class="p">{{ $careerApplication->present_salary }}</p>
                </div>

                <div class="col-md-6">
                    <label class="label">Expected Salary</label>
                    <p class="p">{{ $careerApplication->expected_salary }}</p>
                </div>

                <div class="col-md-6">
                    <label class="label">Looking for (Job Level)</label>
                    <p class="p">{{ $careerApplication->opt_level }}</p>
                </div>

                <div class="col-md-6">
                    <label class="label">Available for (Job Nature)</label>
                    <p class="p">{{ $careerApplication->opt_avail }}</p>
                </div>
            </div>
        </div>
        <div class="" id="applicationEdit" style="display: none;">
            <form class="form" action="{{ route('user.career.application.update') }}" id="" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label class="label" for="objective">Objective
                            <abbr title="Required" class="required"></abbr>
                        </label>
                        <textarea name="objective" id="objective" cols="10" rows="3" class="form-control">{{ $careerApplication->objective }}</textarea>

                        @error('objective')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="label" for="present_salary">Present Salary
                                    @error('present_salary')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" class="form-control" placeholder="0.00" value="{{ $careerApplication->present_salary }}" name="present_salary" id="present_salary" maxlength="10">
                                <span class="input-note btn-form-control">TK/ Month</span>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="label" for="expected_salary">Expected Salary
                                    @error('expected_salary')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" class="form-control" placeholder="0.00" value="{{ $careerApplication->expected_salary }}" name="expected_salary" id="expected_salary" maxlength="10">
                                <span class="input-note btn-form-control">TK/ Month</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="label" for="lookForView">Looking for (Job Level)</label>
                                <div class="btn-form-control">
                                    <fieldset>
                                        <label aria-label="entry level" class="radio-inline">
                                            <input type="radio" name="opt_level" id="levelRadio" value="Entry Level Job" {{ $careerApplication->opt_level == 'Entry Level Job' ? 'checked': '' }}> Entry Level
                                        </label>
                                        <label aria-label="mid level" class="radio-inline">
                                            <input type="radio" name="opt_level" id="levelRadio" value="Mid Level Job" {{ $careerApplication->opt_level == 'Mid Level Job' ? 'checked': '' }}> Mid Level
                                        </label>

                                        <label aria-label="top level" class="radio-inline">
                                            <input type="radio" name="opt_level" id="levelRadio" value="Top Level Job" {{ $careerApplication->opt_level == 'Top Level Job' ? 'checked': '' }}> Top Level
                                        </label>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <label class="label" for="" id="availForInfo">Available for (Job Nature)</label>
                                <div class="btn-form-control">
                                    <div>
                                        <fieldset>
                                            <label class="radio-inline">
                                                <input type="radio" name="opt_avail" id="avaiRadio" aria-describedby="availForInfo" value="Full Time" {{ $careerApplication->opt_avail == 'Full Time' ? 'checked': '' }}> Full time
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="opt_avail" id="avaiRadio" aria-describedby="availForInfo" value="Part Time" {{ $careerApplication->opt_avail == 'Part Time' ? 'checked': '' }}> Part time
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="opt_avail" id="avaiRadio" aria-describedby="availForInfo" value="Contract" {{ $careerApplication->opt_avail == 'Contract' ? 'checked': '' }}> Contract
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="opt_avail" id="avaiRadio" aria-describedby="availForInfo" value="Internship" {{ $careerApplication->opt_avail == 'Internship' ? 'checked': '' }}> Internship
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="opt_avail" id="avaiRadio" aria-describedby="availForInfo" value="Freelance" {{ $careerApplication->opt_avail == 'Freelance' ? 'checked': '' }}> Freelance
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="btn-form-control">
                            <input type="submit" title="CLick to save information Application Information" class="btn btn-primary" value="Submit">
                            <button title="Click close to go back to edit resume without saving" class="btn" id="editClose" style="color: #0391e4; font-size: 16px;">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @else
    <div class="card-body">
        <div class="">
            <form class="form" action="{{ route('user.career.application.update') }}" id="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label class="label" for="Objective">Objective
                            <abbr title="Required" class="required"></abbr>
                        </label>
                        <textarea name="objective" id="Objective" cols="10" rows="3" class="form-control"></textarea>

                        @error('objective')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="label" for="present_salary">Present Salary
                                    @error('present_salary')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" class="form-control" placeholder="0.00" value="" name="present_salary" id="present_salary" maxlength="10">
                                <span class="input-note btn-form-control">TK/ Month</span>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="label" for="expected_salary">Expected Salary
                                    @error('expected_salary')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" class="form-control" placeholder="0.00" value="" name="expected_salary" id="expected_salary" maxlength="10">
                                <span class="input-note btn-form-control">TK/ Month</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="label" for="lookForView">Looking for (Job Level)</label>
                                <div class="btn-form-control">
                                    <fieldset>
                                        <legend class="sr-only">Looking for (Job Level)</legend>
                                        <label aria-label="entry level" class="radio-inline">
                                            <input type="radio" name="opt_level" id="levelRadio" value="Entry Level Job"> Entry Level
                                        </label>
                                        <label aria-label="mid level" class="radio-inline">
                                            <input type="radio" name="opt_level" id="levelRadio" value="Mid Level Job"> Mid Level
                                        </label>

                                        <label aria-label="top level" class="radio-inline">
                                            <input type="radio" name="opt_level" id="levelRadio" value="Top Level Job"> Top Level
                                        </label>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <label class="label" for="" id="availForInfo">Available for (Job Nature)</label>
                                <div class="btn-form-control">
                                    <div>
                                        <fieldset>
                                            <label class="radio-inline">
                                                <input type="radio" name="opt_avail" id="avaiRadio" aria-describedby="availForInfo" value="Full Time"> Full time
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="opt_avail" id="avaiRadio" aria-describedby="availForInfo" value="Part Time"> Part time
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="opt_avail" id="avaiRadio" aria-describedby="availForInfo" value="Contract"> Contract
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="opt_avail" id="avaiRadio" aria-describedby="availForInfo" value="Internship"> Internship
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="opt_avail" id="avaiRadio" aria-describedby="availForInfo" value="Freelance"> Freelance
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="btn-form-control">
                            <input type="submit" title="CLick to save information Application Information" class="btn btn-primary" value="Submit">
                            <a href="#" title="Click close to go back to edit resume without saving" class="btn btn-default btn-cancel">Close</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>

<script>
    $(document).ready(function() {
        $('#present_salary, #expected_salary').on('input', function() {
            this.value = this.value.replace(/[^0-9.]/g, '');
        });

        $('#present_salary, #expected_salary').on('blur', function() {
            const value = this.value;
            const dotCount = (value.match(/\./g) || []).length;
            if (dotCount > 1) {
                this.value = value.substring(0, value.lastIndexOf('.'));
            }
        });
    });

    $(document).ready(function() {
        $('#applicationView').show();
        $('#applicationEdit').hide().find('input, textarea').prop('disabled', true);

        $('#applicationEditButton').on('click', function() {
            $('#applicationView').hide();
            $('#applicationEdit').show().find('input, textarea').prop('disabled', false);
        });

        $('#editClose').on('click', function() {
            $('#applicationView').show();
            $('#applicationEdit').hide().find('input, textarea').prop('disabled', true);
        })
    });

</script>
@endsection
