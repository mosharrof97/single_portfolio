@extends('user.backend.partial.layout')

@section('content')
<div class="card" id="imageCard" style="display:none;">
    <div class="card-header d-flex justify-content-between">
        <div class="card-title" style="">
            Personal Details
        </div>
        <a href="{{ route('user.personal.details') }}" class="btn btn-primary">Back</a>

    </div>
    <div class="card-body">
        <div class="">
            <div class="m-t-20">
                <form id="" action="{{ route('user.personal.details.update.image') }}" class="form-inline" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('put')
                    <div class="row" id="inputDiv" style="display:none">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" tabindex="0" class="form-control" id="imageUpdate" name="image" value="" aria-label="" title="Select File for Upload">
                            </div>
                        </div>
                    </div>
                    <div class="" style="padding-top: 50px;">
                        <div class="user-photo text-center" id="changeImage">
                            <img class="userImg" id="userImg" src="{{ $personalDetails == null ? asset('assets/img/personal/personal.png') : asset('assets/img/personal/'.$personalDetails->image) }}" alt="Photo for my resume">
                        </div>
                    </div>
                    <div id="noData" style="display:none;">
                        <p>You don't have any photo, Please upload photo </p>
                    </div>
                    <div id="ErrorMassage"></div>

                    <div class="row">
                        <div class="col-md-12 text-center" style="margin-top: 16px;">
                            <button class="btn btn-primary grey" id="changePhoto" type="button">Change Photo</button>

                            <button class="btn btn-primary btn-upload" id="uploadPhoto" type="submit" style="display:none"><i class="icon-upload">&nbsp;</i>Upload Photo</button>
                            @if ($personalDetails && $personalDetails->image)
                            <button type="button" class="btn btn-danger" id="btnDelete" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Photo </button>
                            @else
                            <a href="{{ route('user.personal.details') }}" class="btn btn-default" id="" style="">Cancel</a>
                            @endif
                        </div>
                    </div>
                </form>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete!</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure, you want to remove your photograph?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('user.personal.details.delete.image') }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="userId" value="{{ $personalDetails ? $personalDetails->id :'' }}">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card" id="contantCard">
    <div class="card-header">
        <div class="card-title" style="">
            Personal Details
        </div>
    </div>
    <style>
        label {
            font-weight: 600 !important;
            color: #1a1a1a !important;
        }

        .container-img {
            position: relative;
            width: 120px;
            height: 120px;
            margin-top: 20px;
        }

        .userImg {
            width: 120px;
            height: 120px;
            border: 1px solid #757575;
            border-radius: 4px;
        }

        .img-btn {
            position: absolute;
            padding: 6px 12px 6px 12px !important;
            left: 19%;
            top: 83%;
            width: 100%;
            transform: translate(-10%, -5%);
            border-radius: 0 0 4px 4px;
            z-index: 3;
            background: #3277B3;
            color: white;
            white-space: nowrap;
            font-size: 14px;
            font-style: normal;
            font-weight: 500;
            border: none;
            text-decoration: none
        }

        .img-btn:hover {
            background: #257cc9;
            color: rgb(255, 255, 255);
        }

    </style>
    @if (!empty($personalDetails))

    <div class="card-body">
        <div class="container-img">
            <div class="form-group uppic">
                <!--    user-photo should use-->
                <img class="userImg" id="userImg" src="{{ $personalDetails->image == null ? asset('assets/img/personal/personal.png') : asset('assets/img/personal/'.$personalDetails->image) }}" alt="Photo for my resume">
                <button type="button" class="img-btn" id="img_btn">Change Photo</button>
            </div>
        </div>

        <div class="row" id="PersonalDetailsView">
            <div class="col-md-12">
                <div class="text-end">
                    <button class="btn btn-primary" id="details_edit" aria-label="Click on Edit to fill up personal details"><i class="icon-pencil-o"></i>&nbsp;Edit</button>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row mt-4">
                    <div class="col-md-6">
                        <p class="m-0"><b>First Name</b></p>
                        <p class="m-0">{{ $personalDetails->first_name ? $personalDetails->first_name : 'N/A' }}</p>
                    </div>

                    <div class="col-md-6">
                        <p class="m-0"><b>Last Name</b></p>
                        <p class="m-0">{{ $personalDetails->last_name ? $personalDetails->last_name : '' }}</p>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <p class="m-0"><b>Father's Name</b></p>
                        <p class="m-0">{{ $personalDetails->f_name ? $personalDetails->f_name : 'N/A' }}</p>
                    </div>

                    <div class="col-md-6">
                        <p class="m-0"><b>Mother's Name</b></p>
                        <p class="m-0">{{ $personalDetails->m_name ? $personalDetails->m_name : 'N/A' }}</p>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <p class="m-0"><b>Date of Birth</b></p>
                        <p class="m-0">{{ $personalDetails->date_of_birth ? $personalDetails->date_of_birth->format('d-M-Y') : 'N/A'}}</p>
                    </div>

                    <div class="col-md-6">
                        <p class="m-0"><b>Gender</b></p>
                        <p class="m-0">{{ $personalDetails->gender ? $personalDetails->gender : 'N/A' }}</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <p class="m-0"><b>Religion</b></p>
                        <p class="m-0">{{ $personalDetails->religion ? $personalDetails->religion : 'N/A' }}</p>
                    </div>

                    <div class="col-md-6">
                        <p class="m-0"><b>Marital Status</b></p>
                        <p class="m-0">{{ $personalDetails->married_status ? $personalDetails->married_status : 'N/A' }}</p>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <p class="m-0"><b>Nationality</b></p>
                        <p class="m-0">{{ $personalDetails->nationality ? $personalDetails->nationality : '' }}</p>
                    </div>

                    <div class="col-md-6">
                        <p class="m-0"><b>National Id</b></p>
                        <p class="m-0">{{ $personalDetails->national_id ? $personalDetails->national_id : 'N/A' }}</p>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <p class="m-0"><b>Passport Number</b></p>
                        <p class="m-0">{{ $personalDetails->passport_no ? $personalDetails->passport_no : 'N/A' }}</p>
                    </div>

                    <div class="col-md-6">
                        <p class="m-0"><b>Passport Issue Date</b></p>
                        <p class="m-0">{{ $personalDetails->issue_date ? $personalDetails->issue_date->format('d-M-Y') : 'N/A'}}</p>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <p class="m-0"><b>Primary Mobile</b></p>
                        <p class="m-0">{{ $personalDetails->mobile ? $personalDetails->mobile : 'N/A'}}</p>
                    </div>

                    <div class="col-md-6">
                        <p class="m-0"><b>Secondary Mobile</b></p>
                        <p class="m-0">{{ $personalDetails->mobile_home ? $personalDetails->mobile_home : 'N/A' }}</p>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <p class="m-0"><b>Emergency Contact</b></p>
                        <p class="m-0">{{ $personalDetails->mobile_office ? $personalDetails->mobile_office : 'N/A' }}</p>
                    </div>

                    <div class="col-md-6">
                        <p class="m-0"><b>Primary Email</b></p>
                        <p class="m-0">{{ $personalDetails->email }}</p>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <p class="m-0"><b>Alternate Email</b></p>
                        <p class="m-0">{{ $personalDetails->extra_email ? $personalDetails->extra_email : 'N/A' }}</p>
                    </div>

                    <div class="col-md-6">
                        <p class="m-0"><b>Blood Group</b></p>
                        <p class="m-0">{{ $personalDetails->blood_group ? $personalDetails->blood_group : '' }}</p>
                    </div>
                </div>

                <div class="row mt-4">

                    <div class="col-md-6">
                        <p class="m-0"><b>Height</b></p>
                        <p class="m-0">{{ $personalDetails->height ? $personalDetails->height : 'N/A'}}</p>
                    </div>

                    <div class="col-md-6">
                        <p class="m-0"><b>Weight</b></p>
                        <p class="m-0">{{ $personalDetails->weight ? $personalDetails->weight : 'N/A'}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="" id="PersonalDetailsEdit" style="display:none">
            <form action="{{ route('user.personal.details.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" placeholder="first name" value="{{ $personalDetails->first_name }}" name="first_name" id="first_name" maxlength="50">

                                @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" placeholder="last name" value="{{ $personalDetails->last_name }}" name="last_name" id="last_name" maxlength="50">

                                @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="f_name">Father's Name
                                    <span class="help-block" id="fhrErrorMsg"></span>
                                </label>
                                <input type="text" class="form-control" placeholder="Father's Name" value="{{ $personalDetails->f_name }}" name="f_name" id="f_name" maxlength="50">

                                @error('f_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="m_name">Mother's Name
                                    <span class="help-block" id="mhrErrorMsg"></span>
                                </label>
                                <input type="text" class="form-control" placeholder="Mother's Name" value="{{ $personalDetails->m_name }}" name="m_name" id="m_name" maxlength="50">

                                @error('m_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="date_of_birth">Date of Birth
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control" placeholder="MM/DD/YYYY" value="{{ $personalDetails->date_of_birth->format('Y-m-d') }}" name="date_of_birth" id="date_of_birth" aria-autocomplete="none" style="min-width: 7em;">
                                @error('date_of_birth')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender">Gender<span class="text-danger">*</span> </label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Male" {{ $personalDetails->gender == 'Male' ? 'selected':'' }}>Male</option>
                                    <option value="Female" {{ $personalDetails->gender == 'Female' ? 'selected':'' }}>Female</option>
                                    <option value="Other" {{ $personalDetails->gender == 'Other' ? 'selected':'' }}>Others</option>
                                </select>

                                @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="religion">Religion<span class="text-danger">*</span></label>

                                <select name="religion" id="religion" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Islam" {{ $personalDetails->religion == 'Islam' ? 'selected':'' }}>Islam</option>
                                    <option value="Buddhism" {{ $personalDetails->religion == 'Buddhism' ? 'selected':'' }}>Buddhism</option>
                                    <option value="Christianity" {{ $personalDetails->religion == 'Christianity' ? 'selected':'' }}>Christianity</option>
                                    <option value="Hinduism" {{ $personalDetails->religion == 'Hinduism' ? 'selected':'' }}>Hinduism</option>
                                    <option value="Jainism" {{ $personalDetails->religion == 'Jainism' ? 'selected':'' }}>Jainism</option>
                                    <option value="Judaism" {{ $personalDetails->religion == 'Judaism' ? 'selected':'' }}>Judaism</option>
                                    <option value="Sikhism" {{ $personalDetails->religion == 'Sikhism' ? 'selected':'' }}>Sikhism</option>
                                    <option value="Others" {{ $personalDetails->religion == 'Others' ? 'selected':'' }}>Others</option>
                                </select>

                                @error('religion')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="married_status">Marital Status<span class="text-danger">*</span></label>

                                <select name="married_status" id="married_status" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Unmarried" {{ $personalDetails->married_status == 'Unmarried' ? 'selected':'' }}>Unmarried</option>
                                    <option value="Married" {{ $personalDetails->married_status == 'Married' ? 'selected':'' }}> Married </option>
                                    <option value="Single" {{ $personalDetails->married_status == 'Single' ? 'selected':'' }}> Single </option>
                                    <option value="Divorced" {{ $personalDetails->married_status == 'Divorced' ? 'selected':'' }}> Divorced </option>
                                </select>

                                @error('married_status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- Start Nationality -->
                            <div class="form-group col-md-6">
                                <label for="nationality">Nationality<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" aria-label="Nationality" id="nationality" name="nationality" placeholder="nationality" value="{{ $personalDetails->nationality }}">


                                @error('nationality')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End Nationality -->

                            <div class="form-group col-md-6">
                                <label for="national_id">National Id<span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" placeholder="00000000000" value="{{ $personalDetails->national_id }}" name="national_id" id="national_id" maxlength="17">

                                @error('national_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="passport_no">Passport Number</label>
                                <input type="text" class="form-control" placeholder="Passport Number" value="{{ $personalDetails->passport_no }}" name="passport_no" id="passport_no" maxlength="20">

                                @error('passport_no')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="issue_date">Passport Issue Date</label>

                                <input type="date" class="form-control" value="{{  $personalDetails->issue_date ? $personalDetails->issue_date->format('Y-m-d') : '' }}" name="issue_date" id="issue_date" aria-autocomplete="none" style="min-width: 7em;">

                                @error('issue_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="mobile" class="sui">Primary Mobile
                                    <span class="text-danger">*</span>
                                    <small class="btn-form-control"> (Provide at least one Phone Number)</small>
                                </label>
                                <input type="tel" class="form-control" @disabled(true) placeholder="01892309361" id="mobile" name="mobile" value="{{ $personalDetails->mobile }}" maxlength="15" autocomplete="off">

                                @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="mobile_home">Secondary Mobile
                                </label>
                                <input type="tel" class="form-control" placeholder="" value="{{ $personalDetails->mobile_home }}" name="mobile_home" id="mobile_home" maxlength="15">

                                @error('mobile_home')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="mobile_office">Emergency Contact </label>
                                <input type="tel" class="form-control" placeholder="" value="{{ $personalDetails->mobile_office }}" name="mobile_office" id="mobile_office" maxlength="15">

                                @error('mobile_office')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email" class="sui">Primary Email
                                    <span class="text-danger">*</span>
                                    <small class="btn-form-control color-green">(Do not enter/provide more than one e-mail address in either of the fields)</small>
                                </label>
                                <input type="email" class="form-control" placeholder="test@gmail.com" value="{{ $personalDetails->email }}" name="email" id="email" maxlength="50" @disabled(true)>

                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="extra_email">Alternate Email </label>
                                <input type="email" class="form-control" placeholder="" value="{{ $personalDetails->extra_email }}" name="extra_email" id="extra_email" maxlength="50">

                                @error('extra_email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="blood_group">Blood Group </label>
                                <select name="blood_group" id="blood_group" class="form-control">
                                    <option value="">Select</option>
                                    <option value="A+" {{ $personalDetails->blood_group == 'A+' ? 'selected':'' }}>A(+ve)</option>
                                    <option value="A-" {{ $personalDetails->blood_group == 'A-' ? 'selected':'' }}>A(-ve)</option>
                                    <option value="B+" {{ $personalDetails->blood_group == 'B+' ? 'selected':'' }}>B(+ve)</option>
                                    <option value="B-" {{ $personalDetails->blood_group == 'B-' ? 'selected':'' }}>B(-ve)</option>
                                    <option value="O+" {{ $personalDetails->blood_group == 'O+' ? 'selected':'' }}>O(+ve)</option>
                                    <option value="O-" {{ $personalDetails->blood_group == 'O-' ? 'selected':'' }}>O(-ve)</option>
                                    <option value="AB+" {{ $personalDetails->blood_group == 'AB+' ? 'selected':'' }}>AB(+ve)</option>
                                    <option value="AB-" {{ $personalDetails->blood_group == 'AB-' ? 'selected':'' }}>AB(-ve)</option>
                                </select>

                                @error('blood_group')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="height">height (meters)</label>
                                <input type="text" class="form-control" placeholder="0.00" value="{{ $personalDetails->height }}" aria-label="Type height in meters" name="height" id="height" maxlength="7">

                                @error('height')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="weight">Weight (kg)</label>
                                <input type="text" aria-label="Type weight in kg" class="form-control" placeholder="00" value="{{ $personalDetails->weight }}" name="weight" id="weight" maxlength="6">

                                @error('weight')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="">
                            <button type="submit" class="btn btn-primary" aria-label="CLick to save personal details information">Save</button>
                            <a href="" aria-label="Click close to go back to edit resume without saving" class="btn btn-default btn-cancel">Close</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @else

    <div class="card-body">
        <form action="{{ route('user.personal.details') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="first_name">First Name
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" placeholder="first name" value="{{ old('first_name') }}" name="first_name" id="first_name" maxlength="50">


                            @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="last_name">Last Name
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" placeholder="last name" value="{{ old('last_name') }}" name="last_name" id="last_name" maxlength="50">

                            @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="f_name">Father's Name
                                <span class="help-block" id="fhrErrorMsg"></span>
                            </label>
                            <input type="text" class="form-control" placeholder="Father's Name" value="{{ old('f_name') }}" name="f_name" id="f_name" maxlength="50">

                            @error('f_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="m_name">Mother's Name
                                <span class="help-block" id="mhrErrorMsg"></span>
                            </label>
                            <input type="text" class="form-control" placeholder="Mother's Name" value="{{ old('m_name') }}" name="m_name" id="m_name" maxlength="50">

                            @error('m_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="date_of_birth">Date of Birth
                                <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control" placeholder="MM/DD/YYYY" value="{{ old('date_of_birth') }}" name="date_of_birth" id="date_of_birth" aria-autocomplete="none" style="min-width: 7em;">
                            @error('date_of_birth')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Gender<span class="text-danger">*</span> </label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Select</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected':'' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected':'' }}>Female</option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected':'' }}>Others</option>
                            </select>

                            @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="religion">Religion<span class="text-danger">*</span></label>

                            <select name="religion" id="religion" class="form-control">
                                <option value="">Select</option>
                                <option value="Islam" {{ old('religion') == 'Islam' ? 'selected':'' }}>Islam</option>
                                <option value="Buddhism" {{ old('religion') == 'Buddhism' ? 'selected':'' }}>Buddhism</option>
                                <option value="Christianity" {{ old('religion') == 'Christianity' ? 'selected':'' }}>Christianity</option>
                                <option value="Hinduism" {{ old('religion') == 'Hinduism' ? 'selected':'' }}>Hinduism</option>
                                <option value="Jainism" {{ old('religion') == 'Jainism' ? 'selected':'' }}>Jainism</option>
                                <option value="Judaism" {{ old('religion') == 'Judaism' ? 'selected':'' }}>Judaism</option>
                                <option value="Sikhism" {{ old('religion') == 'Sikhism' ? 'selected':'' }}>Sikhism</option>
                                <option value="Others" {{ old('religion') == 'Others' ? 'selected':'' }}>Others</option>
                            </select>

                            @error('religion')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="married_status">Marital Status<span class="text-danger">*</span></label>

                            <select name="married_status" id="married_status" class="form-control">
                                <option value="">Select</option>
                                <option value="Unmarried" {{ old('married_status')== 'Unmarried' ? 'selected':'' }}>Unmarried</option>
                                <option value="Married" {{ old('married_status')== 'Married' ? 'selected':'' }}> Married </option>
                                <option value="Single" {{ old('married_status')== 'Single' ? 'selected':'' }}> Single </option>
                                <option value="Divorced" {{ old('married_status')== 'Divorced' ? 'selected':'' }}> Divorced </option>
                            </select>

                            @error('married_status')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Start Nationality -->
                        <div class="form-group col-md-6">
                            <label for="nationality">Nationality<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" aria-label="Nationality" id="nationality" name="nationality" placeholder="nationality" value="{{ old('nationality') }}">


                            @error('nationality')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- End Nationality -->

                        <div class="form-group col-md-6">
                            <label for="national_id">National Id<span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" placeholder="00000000000" value="{{ old('national_id') }}" name="national_id" id="national_id" maxlength="17">

                            @error('national_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="passport_no">Passport Number</label>
                            <input type="text" class="form-control" placeholder="Passport Number" value="{{ old('passport_no') }}" name="passport_no" id="passport_no" maxlength="20">

                            @error('passport_no')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="issue_date">Passport Issue Date</label>

                            <input type="date" class="form-control" value="{{ old('issue_date') }}" name="issue_date" id="issue_date" aria-autocomplete="none" style="min-width: 7em;">

                            @error('issue_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="mobile" class="sui">Primary Mobile
                                <span class="text-danger">*</span>
                                <small class="btn-form-control"> (Provide at least one Phone Number)</small>
                            </label>
                            <input type="tel" class="form-control" placeholder="01892309361" id="mobile" name="mobile" value="{{ old('mobile') }}" maxlength="15" autocomplete="off">

                            {{-- <div class="row">
                                <div class="col-sm-6 cl-pr" id="country">
                                    <select aria-label="select country" name="txtCountryCode" id="txtCountryCode" required="required" class="form-control from-control-login">
                                        <option value="93">Afghanistan (93)</option>
                                        <option value="355">Albania (355)</option>
                                        <option value="213">Algeria (213)</option>
                                        <option value="376">Andorra (376)</option>
                                        <option value="244">Angola (244)</option>
                                        <option value="264">Anguilla (264)</option>
                                        <option value="672">Antarctica (672)</option>
                                        <option value="268">Antigua (268)</option>
                                        <option value="54">Argentina (54)</option>
                                        <option value="374">Armenia (374)</option>
                                        <option value="297">Aruba (297)</option>
                                        <option value="61">Australia (61)</option>
                                        <option value="43">Austria (43)</option>
                                        <option value="994">Azerbaijan (994)</option>
                                        <option value="242">Bahamas (242)</option>
                                        <option value="973">Bahrain (973)</option>
                                        <option value="88" selected="">Bangladesh (88)</option>
                                        <option value="246">Barbados (246)</option>
                                        <option value="375">Belarus (375)</option>
                                        <option value="32">Belgium (32)</option>
                                        <option value="501">Belize (501)</option>
                                        <option value="229">Benin (229)</option>
                                        <option value="441">Bermuda (441)</option>
                                        <option value="975">Bhutan (975)</option>
                                        <option value="591">Bolivia (591)</option>
                                        <option value="387">Bosnia and Herzegovina (387)</option>
                                        <option value="267">Botswana (267)</option>
                                        <option value="55">Brazil (55)</option>
                                        <option value="284">British Virgin Islands (284)</option>
                                        <option value="673">Brunei (673)</option>
                                        <option value="359">Bulgaria (359)</option>
                                        <option value="226">Burkina Faso (226)</option>
                                        <option value="257">Burundi (257)</option>
                                        <option value="855">Cambodia (855)</option>
                                        <option value="237">Cameroon (237)</option>
                                        <option value="1">Canada (1)</option>
                                        <option value="238">Cape Verde (238)</option>
                                        <option value="236">Central African Republic (236)</option>
                                        <option value="235">Chad (235)</option>
                                        <option value="56">Chile (56)</option>
                                        <option value="86">China (86)</option>
                                        <option value="57">Colombia (57)</option>
                                        <option value="269">Comoros (269)</option>
                                        <option value="242">Congo (242)</option>
                                        <option value="243">Congo (Zaire) (243)</option>
                                        <option value="682">Cook Islands (682)</option>
                                        <option value="506">Costa Rica (506)</option>
                                        <option value="225">Cote d'Ivoire (Ivory Coast) (225)</option>
                                        <option value="385">Croatia (385)</option>
                                        <option value="53">Cuba (53)</option>
                                        <option value="357">Cyprus (357)</option>
                                        <option value="420">Czech Republic (420)</option>
                                        <option value="45">Denmark (45)</option>
                                        <option value="253">Djibouti (253)</option>
                                        <option value="767">Dominica (767)</option>
                                        <option value="809">Dominican Republic (809)</option>
                                        <option value="670">East Timor (670)</option>
                                        <option value="593">Ecuador (593)</option>
                                        <option value="20">Egypt (20)</option>
                                        <option value="503">El Salvador (503)</option>
                                        <option value="240">Equatorial Guinea (240)</option>
                                        <option value="291">Eritrea (291)</option>
                                        <option value="372">Estonia (372)</option>
                                        <option value="251">Ethiopia (251)</option>
                                        <option value="500">Falkland Islands (500)</option>
                                        <option value="691">Federated States of Micronesia (691)</option>
                                        <option value="679">Fiji (679)</option>
                                        <option value="358">Finland (358)</option>
                                        <option value="33">France (33)</option>
                                        <option value="594">French Guiana (594)</option>
                                        <option value="689">French Polynesia (689)</option>
                                        <option value="241">Gabon (241)</option>
                                        <option value="995">Georgia (995)</option>
                                        <option value="49">Germany (49)</option>
                                        <option value="233">Ghana (233)</option>
                                        <option value="350">Gibraltar (350)</option>
                                        <option value="30">Greece (30)</option>
                                        <option value="299">Greenland (299)</option>
                                        <option value="473">Grenada (473)</option>
                                        <option value="590">Guadeloupe (590)</option>
                                        <option value="502">Guatemala (502)</option>
                                        <option value="224">Guinea (224)</option>
                                        <option value="245">Guinea-Bissau (245)</option>
                                        <option value="592">Guyana (592)</option>
                                        <option value="509">Haiti (509)</option>
                                        <option value="504">Honduras (504)</option>
                                        <option value="852">Hong Kong (852)</option>
                                        <option value="36">Hungary (36)</option>
                                        <option value="354">Iceland (354)</option>
                                        <option value="91">India (91)</option>
                                        <option value="62">Indonesia (62)</option>
                                        <option value="98">Iran (98)</option>
                                        <option value="964">Iraq (964)</option>
                                        <option value="353">Ireland (353)</option>
                                        <option value="972">Israel (972)</option>
                                        <option value="39">Italy (39)</option>
                                        <option value="876">Jamaica (876)</option>
                                        <option value="81">Japan (81)</option>
                                        <option value="962">Jordan (962)</option>
                                        <option value="7">Kazakhstan (7)</option>
                                        <option value="254">Kenya (254)</option>
                                        <option value="686">Kiribati (686)</option>
                                        <option value="965">Kuwait (965)</option>
                                        <option value="996">Kyrgyzstan (996)</option>
                                        <option value="856">Laos (856)</option>
                                        <option value="371">Latvia (371)</option>
                                        <option value="961">Lebanon (961)</option>
                                        <option value="266">Lesotho (266)</option>
                                        <option value="231">Liberia (231)</option>
                                        <option value="218">Libya (218)</option>
                                        <option value="423">Liechtenstein (423)</option>
                                        <option value="370">Lithuania (370)</option>
                                        <option value="352">Luxembourg (352)</option>
                                        <option value="853">Macau (853)</option>
                                        <option value="389">Macedonia (389)</option>
                                        <option value="261">Madagascar (261)</option>
                                        <option value="265">Malawi (265)</option>
                                        <option value="60">Malaysia (60)</option>
                                        <option value="960">Maldives (960)</option>
                                        <option value="223">Mali (223)</option>
                                        <option value="356">Malta (356)</option>
                                        <option value="692">Marshall Islands (692)</option>
                                        <option value="596">Martinique (596)</option>
                                        <option value="222">Mauritania (222)</option>
                                        <option value="230">Mauritius (230)</option>
                                        <option value="262">Mayotte (262)</option>
                                        <option value="52">Mexico (52)</option>
                                        <option value="373">Moldova (373)</option>
                                        <option value="377">Monaco (377)</option>
                                        <option value="976">Mongolia (976)</option>
                                        <option value="382">Montenegro (382)</option>
                                        <option value="664">Montserrat (664)</option>
                                        <option value="212">Morocco (212)</option>
                                        <option value="258">Mozambique (258)</option>
                                        <option value="95">Myanmar (95)</option>
                                        <option value="264">Namibia (264)</option>
                                        <option value="674">Nauru (674)</option>
                                        <option value="977">Nepal (977)</option>
                                        <option value="31">Netherlands (31)</option>
                                        <option value="599">Netherlands Antilles (599)</option>
                                        <option value="687">New Caledonia (687)</option>
                                        <option value="64">New Zealand (64)</option>
                                        <option value="505">Nicaragua (505)</option>
                                        <option value="227">Niger (227)</option>
                                        <option value="234">Nigeria (234)</option>
                                        <option value="850">North Korea (850)</option>
                                        <option value="47">Norway (47)</option>
                                        <option value="968">Oman (968)</option>
                                        <option value="92">Pakistan (92)</option>
                                        <option value="680">Palau (680)</option>
                                        <option value="507">Panama (507)</option>
                                        <option value="675">Papua New Guinea (675)</option>
                                        <option value="595">Paraguay (595)</option>
                                        <option value="51">Peru (51)</option>
                                        <option value="63">Philippines (63)</option>
                                        <option value="48">Poland (48)</option>
                                        <option value="351">Portugal (351)</option>
                                        <option value="974">Qatar (974)</option>
                                        <option value="383">Republic of Kosovo (383)</option>
                                        <option value="40">Romania (40)</option>
                                        <option value="7">Russia (7)</option>
                                        <option value="250">Rwanda (250)</option>
                                        <option value="869">Saint Kitts and Nevis (869)</option>
                                        <option value="758">Saint Lucia (758)</option>
                                        <option value="508">Saint Pierre and Miquelon (508)</option>
                                        <option value="784">Saint Vincent and the Grenadines (784)</option>
                                        <option value="685">Samoa (685)</option>
                                        <option value="378">San Marino (378)</option>
                                        <option value="239">Sao Tome and Principe (239)</option>
                                        <option value="966">Saudi Arabia (966)</option>
                                        <option value="221">Senegal (221)</option>
                                        <option value="381">Serbia (381)</option>
                                        <option value="248">Seychelles (248)</option>
                                        <option value="232">Sierra Leone (232)</option>
                                        <option value="65">Singapore (65)</option>
                                        <option value="421">Slovakia (421)</option>
                                        <option value="386">Slovenia (386)</option>
                                        <option value="677">Solomon Islands (677)</option>
                                        <option value="252">Somalia (252)</option>
                                        <option value="27">South Africa (27)</option>
                                        <option value="82">South Korea (82)</option>
                                        <option value="2011">South Sudan (2011)</option>
                                        <option value="34">Spain (34)</option>
                                        <option value="94">Sri Lanka (94)</option>
                                        <option value="249">Sudan (249)</option>
                                        <option value="597">Suriname (597)</option>
                                        <option value="268">Swaziland (268)</option>
                                        <option value="46">Sweden (46)</option>
                                        <option value="41">Switzerland (41)</option>
                                        <option value="963">Syria (963)</option>
                                        <option value="886">Taiwan (886)</option>
                                        <option value="992">Tajikistan (992)</option>
                                        <option value="255">Tanzania (255)</option>
                                        <option value="66">Thailand (66)</option>
                                        <option value="220">The Gambia (220)</option>
                                        <option value="228">Togo (228)</option>
                                        <option value="676">Tonga (676)</option>
                                        <option value="868">Trinidad and Tobago (868)</option>
                                        <option value="216">Tunisia (216)</option>
                                        <option value="90">Turkey (90)</option>
                                        <option value="993">Turkmenistan (993)</option>
                                        <option value="649">Turks and Caicos Islands (649)</option>
                                        <option value="688">Tuvalu (688)</option>
                                        <option value="256">Uganda (256)</option>
                                        <option value="380">Ukraine (380)</option>
                                        <option value="971">United Arab Emirates (971)</option>
                                        <option value="44">United Kingdom (44)</option>
                                        <option value="1">United States (1)</option>
                                        <option value="598">Uruguay (598)</option>
                                        <option value="998">Uzbekistan (998)</option>
                                        <option value="678">Vanuatu (678)</option>
                                        <option value="58">Venezuela (58)</option>
                                        <option value="84">Vietnam (84)</option>
                                        <option value="967">Yemen (967)</option>
                                        <option value="260">Zambia (260)</option>
                                        <option value="263">Zimbabwe (263)</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 voffset-s">
                                    <input type="tel" class="form-control from-control-login" placeholder="" id="txtMobile" name="txtMobile" value="01892309361" maxlength="15" autocomplete="off">
                                </div>
                            </div> --}}
                            @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="mobile_home">Secondary Mobile
                            </label>
                            <input type="tel" class="form-control" placeholder="" value="{{ old('mobile_home') }}" name="mobile_home" id="mobile_home" maxlength="15">

                            @error('mobile_home')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="mobile_office">Emergency Contact </label>
                            <input type="tel" class="form-control" placeholder="" value="{{ old('mobile_office') }}" name="mobile_office" id="mobile_office" maxlength="15">

                            @error('mobile_office')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="sui">Primary Email
                                <span class="text-danger">*</span>
                                <small class="btn-form-control color-green">(Do not enter/provide more than one e-mail address in either of the fields)</small>
                            </label>
                            <input type="email" class="form-control" placeholder="test@gmail.com" value="{{ old('email') }}" name="email" id="email" maxlength="50">

                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="extra_email">Alternate Email </label>
                            <input type="email" class="form-control" placeholder="" value="{{ old('extra_email') }}" name="extra_email" id="extra_email" maxlength="50">

                            @error('extra_email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="blood_group">Blood Group </label>
                            <select name="blood_group" id="blood_group" class="form-control">
                                <option value="">Select</option>
                                <option value="A+" {{ old('blood_group') == 'A+' ? 'selected':'' }}>A(+ve)</option>
                                <option value="A-" {{ old('blood_group') == 'A-' ? 'selected':'' }}>A(-ve)</option>
                                <option value="B+" {{ old('blood_group') == 'B+' ? 'selected':'' }}>B(+ve)</option>
                                <option value="B-" {{ old('blood_group') == 'B-' ? 'selected':'' }}>B(-ve)</option>
                                <option value="O+" {{ old('blood_group') == 'O+' ? 'selected':'' }}>O(+ve)</option>
                                <option value="O-" {{ old('blood_group') == 'O-' ? 'selected':'' }}>O(-ve)</option>
                                <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected':'' }}>AB(+ve)</option>
                                <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected':'' }}>AB(-ve)</option>
                            </select>

                            @error('blood_group')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="height">height (meters)</label>
                            <input type="text" class="form-control" placeholder="0.00" value="{{ old('height') }}" aria-label="Type height in meters" name="height" id="height" maxlength="7">

                            @error('height')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="weight">Weight (kg)</label>
                            <input type="text" aria-label="Type weight in kg" class="form-control" placeholder="00" value="{{ old('weight') }}" name="weight" id="weight" maxlength="6">

                            @error('weight')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="">
                        <button type="submit" class="btn btn-primary" aria-label="CLick to save personal details information">Save</button>
                        <a href="" aria-label="Click close to go back to edit resume without saving" class="btn btn-default btn-cancel">Close</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @endif
</div>

<script>
    $(document).ready(function() {
        $('#imageCard').hide();
        $('#contantCard').show();
        $('#img_btn').click(function() {
            $('#imageCard').show();
            $('#contantCard').hide();
        })
    })

</script>
<script>
    $(document).ready(function() {
        $('#inputDiv').hide();
        $('#uploadPhoto').hide();
        $('#noData').hide();

        $('#changePhoto').click(function() {
            $('#inputDiv').show();
            $('#uploadPhoto').show();
            $('#changePhoto').hide();
            $('#noData').hide();
        });

        $('#imageUpdate').change(function() {
            var file = $(this)[0].files[0];
            var fileType = file.type;
            if (fileType !== "image/jpeg" && fileType !== "image/jpg") {
                alert("Please upload a JPG or JPEG image.");
                $('#imageUpdate').val('');
            }

            var image = this.files[0];
            if (image) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#userImg').attr('src', e.target.result);
                };
                reader.readAsDataURL(image);
            }
        });

    });

    function UploadImage() {
        alert("Image uploaded!");
        return false;
    }

    function confirmation(imageUrl) {
        var confirmDelete = confirm("Are you sure you want to delete the photo?");
        if (confirmDelete) {
            alert("Photo deleted!");
        }
        return false;
    }

</script>

<script>
    $(document).ready(function() {
        $('#PersonalDetailsEdit').css('display', 'none'); // Initially hide the edit form
        $('#details_edit').click(function() { // Use .click() for event binding
            $('#PersonalDetailsView').css('display', 'none'); // Hide the view form
            $('#PersonalDetailsEdit').css('display', 'block'); // Show the edit form
        });
    });

</script>
@endsection
