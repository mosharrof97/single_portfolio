@extends('user.backend.partial.layout')

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

    </style>
    @if (!empty($addressDetails))

    <div class="card-body">

        <div class="row" id="addressDetailsView">
            <div class="col-md-12">
                <div class="text-end">
                    <button class="btn btn-primary" id="details_edit" aria-label="Click on Edit to fill up address details"><i class="icon-pencil-o"></i>&nbsp;Edit</button>
                </div>
            </div>
            <div class="col-md-12">
                <p class="m-0"><b>Present Address</b></p>
                <p class="m-0">
                    <span>{{ $addressDetails->present_village }}</span>
                    @if ($addressDetails->present_office)
                    <span>{{ $addressDetails->present_office }},</span>
                    @endif
                    <span>{{ $addressDetails->present_thana }}</span>
                    <span>{{ $addressDetails->present_district }}</span>
                </p>
            </div>

            <div class="col-md-12 mt-3">
                <p class="m-0"><b>Permanent Address</b></p>
                <p class="m-0">
                    <p class="m-0">
                        <span>{{ $addressDetails->permanent_village }}</span>
                        @if ($addressDetails->permanent_office)
                        <span>{{ $addressDetails->permanent_office }},</span>
                        @endif
                        <span>{{ $addressDetails->permanent_thana }}</span>
                        <span>{{ $addressDetails->permanent_district }}</span>
                    </p>
                </p>
            </div>
        </div>


        <div class="" id="addressDetailsEdit" style="display:none">
            <form action="{{ route('user.address.details.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-12">
                        <label class="">Present Address </label>
                    </div>

                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-sm-4 pr-control btn-form-control">
                                <div class="form-group">
                                    <select class="form-control district" aria-label="Present district" id="present_district" name="present_district">
                                        <option value="" selected="">Select District</option>
                                        @foreach ($districts as $value)
                                        <option value="{{ $value->district }}" {{ $value->district == $addressDetails->present_district ? 'selected' : '' }}>{{ $value->district }}</option>
                                        @endforeach
                                    </select>

                                    @error('present_district')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 p-control btn-form-control">
                                <div class="form-group" id="present_thanaLocation">
                                    <select aria-label="present thana" class="form-control" id="present_thana" name="present_thana" onchange="GetLoadLocations(1,'present','EN','addressForm');" aria-describedby="presenttxtThanaErrorMsg">
                                        <option value="{{ $addressDetails->present_thana }}">{{ $addressDetails->present_thana }}</option>
                                    </select>

                                    @error('present_thana')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 pl-control btn-form-control">
                                <div class="form-group" id="present_POLocation">
                                    <input type="text" name="present_office" id="present_office" aria-label="present post office" class="form-control" value="{{ $addressDetails->present_office }}" placeholder="Type your post office">

                                    @error('present_office')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group btn-form-control">
                            <input type="text" class="form-control" id="present_village" name="present_village" aria-label="present Village" value="{{ $addressDetails->present_village }}" placeholder="Type your House No/Road/Village" maxlength="150">

                            @error('present_village')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="d-flex justify-content-between">
                            <label class="">Permanent Address </label>
                            <div class="checkbox btn-form-control">
                                <label><input type="checkbox" class="same-address" name="same_address" id="same_address">Same as Present Address</label>
                            </div>
                        </div>
                        <div class="">


                            <div class="row">
                                <div class="col-sm-4 pr-control btn-form-control">
                                    <div class="form-group">
                                        <select aria-label="permanent district" class="form-control district" id="permanent_district" name="permanent_district">
                                            <option value="" selected="">Select District</option>
                                            @foreach ($districts as $value)
                                            <option value="{{ $value->district }}" {{ $value->district == $addressDetails->permanent_district ? 'selected' : ''  }}>{{ $value->district }}</option>
                                            @endforeach
                                        </select>

                                        @error('permanent_district')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4 p-control btn-form-control">
                                    <div class="form-group" id="permanent_thanaLocation">
                                        <select aria-label="permanent thana" class="form-control thanacommon" id="permanent_thana" name="permanent_thana">
                                            <option value="{{ $addressDetails->permanent_thana }}">{{ $addressDetails->permanent_thana }}</option>
                                        </select>

                                        @error('permanent_thana')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4 pl-control btn-form-control">
                                    <div class="form-group" id="permanent_POLocation">
                                        <input type="text" name="permanent_office" id="permanent_office" aria-label="present post office" class="form-control" value="{{ $addressDetails->permanent_office }}" placeholder="Type your post office">

                                        @error('permanent_office')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group btn-form-control">
                                <input aria-label="parmanent village" type="text" class="form-control" id="permanent_village" name="permanent_village" value="{{ $addressDetails->permanent_village }}" placeholder="Type your House No/Road/Village" aria-describedby="txtprmtVillErrorMsg" maxlength="150">

                                @error('permanent_village')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="btn-form-control">
                            <button type="submit" aria-label="CLick to save address information " class="btn btn-primary">Save</button>
                            <a href="https://mybdjobs.bdjobs.com/new_mybdjobs/step_01_view.asp" aira-levl="Click close to go back to edit resume without saving" id="addressCloseBtn" class="btn btn-default btn-cancel reset">Close</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    @else

    <div class="card-body">
        <form action="{{ route('user.address.details') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <label class="">Present Address</label>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-4 pr-control btn-form-control">
                            <div class="form-group">
                                <select class="form-control district" aria-label="Present district" id="present_district" name="present_district">
                                    <option value="" selected="">Select District</option>
                                    @foreach ($districts as $value)
                                    <option value="{{ $value->district }}">{{ $value->district }}</option>
                                    @endforeach
                                </select>

                                @error('present_district')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4 p-control btn-form-control">
                            <div class="form-group" id="present_thanaLocation">
                                <select aria-label="present thana" class="form-control thanacommon" id="present_thana" name="present_thana" onchange="GetLoadLocations(1,'present','EN','addressForm');" aria-describedby="presenttxtThanaErrorMsg">
                                    <option value="" selected="">Select Thana</option>
                                    {{-- @foreach ($thanas as $value)
                                    <option value="{{ $value->thana }}">{{ $value->thana }}</option>
                                    @endforeach --}}
                                </select>

                                @error('present_thana')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4 pl-control btn-form-control">
                            <div class="form-group" id="present_POLocation">
                                <input type="text" name="present_office" id="present_office" aria-label="present post office" class="form-control" value="{{ old('present_office') }}" placeholder="Type your post office">

                                @error('present_office')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group btn-form-control">
                        <input type="text" class="form-control" id="present_village" name="present_village" aria-label="present Village" value="" placeholder="Type your House No/Road/Village" maxlength="150">

                        @error('present_village')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="d-flex justify-content-between">
                        <label>Permanent Address </label>
                        <div class="checkbox btn-form-control">
                            <label><input type="checkbox" class="same-address" name="same_address" id="same_address">Same as Present Address</label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-4 pr-control btn-form-control">
                            <div class="form-group">
                                <select aria-label="permanent district" class="form-control district" id="permanent_district" name="permanent_district">
                                    <option value="" selected="">Select District</option>
                                    @foreach ($districts as $value)
                                    <option value="{{ $value->district }}">{{ $value->district }}</option>
                                    @endforeach
                                </select>

                                @error('permanent_district')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4 p-control btn-form-control">
                            <div class="form-group" id="permanent_thanaLocation">
                                <select aria-label="permanent thana" class="form-control thanacommon" id="permanent_thana" name="permanent_thana">
                                    <option value="" selected="">Select Thana</option>
                                    @foreach ($thanas as $value)
                                    <option value="{{ $value->thana }}">{{ $value->thana }}</option>
                                    @endforeach
                                </select>

                                @error('permanent_thana')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4 pl-control btn-form-control">
                            <div class="form-group" id="permanent_POLocation">
                                <input type="text" name="permanent_office" id="permanent_office" aria-label="present post office" class="form-control" value="{{ old('permanent_office') }}" placeholder="Type your post office">

                                @error('permanent_office')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group btn-form-control">
                        <input aria-label="parmanent village" type="text" class="form-control" id="permanent_village" name="permanent_village" value="" placeholder="Type your House No/Road/Village" maxlength="150">

                        @error('permanent_village')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="btn-form-control">
                        <button type="submit" aria-label="CLick to save address information " class="btn btn-primary">Save</button>
                        <a href="" id="addressCloseBtn" class="btn btn-default btn-cancel">Close</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @endif
</div>

<script>
    $(document).ready(function() {
        $('#addressDetailsEdit').hide();

        $('#details_edit').click(function() {
            $('#addressDetailsView').hide();
            $('#addressDetailsEdit').show();
        });

        $('#same_address').change(function() {
            if ($(this).prop('checked')) {
                $('#permanent_district').val($('#present_district').val()).trigger('change');

                setTimeout(() => {
                    $('#permanent_thana').val($('#present_thana').val());
                }, 500);

                $('#permanent_office').val($('#present_office').val());
                $('#permanent_village').val($('#present_village').val());

                // $('#permanent_district, #permanent_thana, #permanent_office, #permanent_village').prop('readonly', true);
            } else {
                $('#permanent_district, #permanent_thana, #permanent_office, #permanent_village').val('').prop('readonly', false);
            }
        });


        function fetchThana(districtSelector, thanaSelector) {
            $(districtSelector).on('change', function() {
                let district = $(this).val();

                $.ajax({
                    type: 'GET'
                    , url: "{{ route('user.address.details.thana') }}"
                    , data: {
                        district: district
                    }
                    , success: function(response) {

                        let thanaList = response['thana'];
                        let $thanaDropdown = $(thanaSelector);

                        $thanaDropdown.find("option:not(:first)").remove();

                        $.each(thanaList, function(index, element) {
                            $thanaDropdown.append(
                                `<option value="${element.thana}">${element.thana}</option>`
                            );
                        });
                    }
                    , error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('Failed to fetch thana. Please try again.');
                    }
                });
            });
        }

        // Apply function for both present and permanent addresses
        fetchThana('#present_district', '#present_thana');
        fetchThana('#permanent_district', '#permanent_thana');
    });

</script>

{{-- <script>
    $(document).ready(function() {
        $('#addressDetailsEdit').css('display', 'none');
        $('#details_edit').click(function() {
            $('#addressDetailsView').css('display', 'none');
            $('#addressDetailsEdit').css('display', 'block');
        });


        $('#same_address').click(function() {
            let address = $(this).val();
            if (address == 'on') {
                let present_district = $('present_district').val();
                let present_thana = $('present_thana').val();
                let present_office = $('present_office').val();
                let present_village = $('present_village').val();

                $('permanent_district').val(present_district)
                    , $('permanent_thana').val(present_thana)
                    , $('permanent_office').val(present_office)
                    , $('permanent_village').val(present_village)
            , } else {
                $('permanent_district').val('')
                    , $('permanent_thana').val('')
                    , $('permanent_office').val('')
                    , $('permanent_village').val('')
            , }
        });


    });

    $(document).ready(function() {
        $('#present_district').on('change', function() {
            let district = $(this).val();

            console.log(district);

            $.ajax({
                type: 'GET'
                , url: "{{ route('user.address.details.thana') }}"
, data: {
district: district
}
, success: function(response) {
console.log(response);

let thana = response['thana'];
console.log(thana);

$('#present_thana').find("option").not(":first").remove();
$.each(thana, function(index, element) {
$('#present_thana').append(
`<option value="${element.thana}">${element.thana}</option>`
);
})
}
, error: function(xhr, status, error) {
console.error('Error:', error);
alert('Failed to fetch thana. Please try again.');
}
});
});

$('#permanent_district').on('change', function() {
let district = $(this).val();

console.log(district);

$.ajax({
type: 'GET'
, url: "{{ route('user.address.details.thana') }}"
, data: {
district: district
}
, success: function(response) {
console.log(response);

let thana = response['thana']

$('#permanent_thana').find("option").not(":first").remove();
$.each(thana, function(index, element) {
$('#permanent_thana').append(
`<option value="${element.thana}">${element.thana}</option>`
);
})
}
, error: function(xhr, status, error) {
console.error('Error:', error);
alert('Failed to fetch thana. Please try again.');
}
});
});
});

</script> --}}
@endsection
