@extends('backend.partial.layout')

@section('content')
    <div class="card" id="contantCard">
        <div class="card-header">
            <div class="card-title" style="">
                Training
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
                            $(`#Training_view_${Id}`).show();
                            $(`#edit-tools_${Id}`).show();
                            $(`#Training_edit_${Id}`).hide().find('input, select, textarea').prop('disabled', true);
                        }

                        // Edit button click handler
                        $('.edit_btn').click(function() {
                            const Id = $(this).data('id');

                            $(`#Training_view_${Id}, #edit-tools_${Id}`).hide();
                            $(`#Training_edit_${Id}`).show().find('input, select, textarea').prop('disabled', false);

                        });

                        // Cancel button click handler
                        $('.btn-cancel').click(function() {
                            const Id = $(this).data('id');
                            initializeForm(Id);
                        });
                    });
                </script>


                @foreach ($training as $key => $data)
                    <div class="d-flex justify-content-between mt-3 mb-2">
                        <h3>Training {{ $key + 1 }} </h3>
                        <div class="edit-tools" id="edit-tools_{{ $data->id }}" style="">
                            <button class="btn btn-primary edit_btn" id="upd_edit_btn_{{ $data->id }}"
                                data-id="{{ $data->id }}" aria-label="Edit Training"><i
                                    class="icon-pencil-o"></i>Edit</button>
                            <button class="btn btn-danger" aria-label="Delete Training" data-bs-toggle="modal"
                                data-bs-target="#deleteTraining_{{ $data->id }}">Delete</button>
                        </div>
                    </div>

                    <div class="modal fade" id="deleteTraining_{{ $data->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteTrainingLabel_{{ $data->id }}"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-5">
                                    <h1 class="modal-title fs-4" id="deleteTrainingLabel_{{ $data->id }}"> <i
                                            class="fas fa-trash-alt fa-lg me-1" style="color: #ff1605;"></i>DELETE</h1>

                                    <p class="mt-3">Are you sure, you want to delete this record?</p>

                                    <div class="text-end">
                                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                                        <a href="{{ route('training.delete', $data->slug) }}"
                                            class="btn btn-danger">YES, DELETE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="Training_view" id="Training_view_{{ $data->id }}">
                        <div class="row">

                            <div class="col-md-6">
                                <label>Level of data </label>
                                <p class="p">{{ $data->title }}</p>
                            </div>

                            <div class="col-md-6">
                                <label for="">Country</label>
                                <p class="p">{{ $data->country }}</p>
                            </div>

                            <div class="col-md-6" id="">
                                <label for="">Topic </label>
                                <p class="p">{{ $data->topic }}</p>
                            </div>

                            <div class="col-md-6" id="">
                                <label for="">Year </label>
                                <p class="p">{{ $data->year }}</p>
                            </div>

                            <div class="col-md-6" id="">
                                <label for="">Institute </label>
                                <p class="p">{{ $data->institute }}</p>
                            </div>

                            <div class="col-md-6" id="">
                                <label for="">Duration </label>
                                <p class="p">{{ $data->duration }}</p>
                            </div>

                            <div class="col-md-6" id="">
                                <label for="">Location </label>
                                <p class="p">{{ $data->location }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="Training_edit" id="Training_edit_{{ $data->id }}" style="display: none">
                        <form action="{{ route('training.update', $data->slug) }}" class="" id=""
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="title">Training Title <span class="text-danger">*</span>
                                        @error('title')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" required="required" class="form-control" name="title"
                                        id="title" value="{{ $data->title }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="country">Country<span title="Required" class="text-danger">*</span>
                                        @error('country')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror

                                    </label>
                                    <input type="text" name="country" id="country" class="form-control"
                                        value="{{ $data->country }}" required>
                                </div>

                                <div class="form-group col-md-6" id="">
                                    <label for="topic">Topics Covered
                                        @error('topic')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" id="topic" name="topic" class="form-control"
                                        placeholder="" value="{{ $data->topic }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="year" id="yrsOfPass">
                                        <span>Year of Passing</span>
                                        <span title="Required" class="text-danger">*</span>
                                        @error('year')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <select class="form-control" name="year" id="upd_year_{{ $data->id }}"
                                        disabled>
                                        <option value="">Year</option>
                                        <option value="2030" {{ $data->year == '2030' ? 'selected' : '' }}>2030
                                        </option>
                                        <option value="2029" {{ $data->year == '2029' ? 'selected' : '' }}>2029
                                        </option>
                                        <option value="2028" {{ $data->year == '2028' ? 'selected' : '' }}>2028
                                        </option>
                                        <option value="2027" {{ $data->year == '2027' ? 'selected' : '' }}>2027
                                        </option>
                                        <option value="2026" {{ $data->year == '2026' ? 'selected' : '' }}>2026
                                        </option>
                                        <option value="2025" {{ $data->year == '2025' ? 'selected' : '' }}>2025
                                        </option>
                                        <option value="2024" {{ $data->year == '2024' ? 'selected' : '' }}>2024
                                        </option>
                                        <option value="2023" {{ $data->year == '2023' ? 'selected' : '' }}>2023
                                        </option>
                                        <option value="2022" {{ $data->year == '2022' ? 'selected' : '' }}>2022
                                        </option>
                                        <option value="2021" {{ $data->year == '2021' ? 'selected' : '' }}>2021
                                        </option>
                                        <option value="2020" {{ $data->year == '2020' ? 'selected' : '' }}>2020
                                        </option>
                                        <option value="2019" {{ $data->year == '2019' ? 'selected' : '' }}>2019
                                        </option>
                                        <option value="2018" {{ $data->year == '2018' ? 'selected' : '' }}>2018
                                        </option>
                                        <option value="2017" {{ $data->year == '1017' ? 'selected' : '' }}>2017
                                        </option>
                                        <option value="2016" {{ $data->year == '2016' ? 'selected' : '' }}>2016
                                        </option>
                                        <option value="2015" {{ $data->year == '2015' ? 'selected' : '' }}>2015
                                        </option>
                                        <option value="2014" {{ $data->year == '2030' ? 'selected' : '' }}>2014
                                        </option>
                                        <option value="2013" {{ $data->year == '2013' ? 'selected' : '' }}>2013
                                        </option>
                                        <option value="2012" {{ $data->year == '2012' ? 'selected' : '' }}>2012
                                        </option>
                                        <option value="2011" {{ $data->year == '2011' ? 'selected' : '' }}>2011
                                        </option>
                                        <option value="2010" {{ $data->year == '2010' ? 'selected' : '' }}>2010
                                        </option>
                                        <option value="2009" {{ $data->year == '2009' ? 'selected' : '' }}>2009
                                        </option>
                                        <option value="2008" {{ $data->year == '2008' ? 'selected' : '' }}>2008
                                        </option>
                                        <option value="2007" {{ $data->year == '2007' ? 'selected' : '' }}>2007
                                        </option>
                                        <option value="2006" {{ $data->year == '2006' ? 'selected' : '' }}>2006
                                        </option>
                                        <option value="2005" {{ $data->year == '2005' ? 'selected' : '' }}>2005
                                        </option>
                                        <option value="2004" {{ $data->year == '2004' ? 'selected' : '' }}>2004
                                        </option>
                                        <option value="2003" {{ $data->year == '2003' ? 'selected' : '' }}>2003
                                        </option>
                                        <option value="2002" {{ $data->year == '2002' ? 'selected' : '' }}>2002
                                        </option>
                                        <option value="2001" {{ $data->year == '2001' ? 'selected' : '' }}>2001
                                        </option>
                                        <option value="2000" {{ $data->year == '2000' ? 'selected' : '' }}>2000
                                        </option>
                                        <option value="1999" {{ $data->year == '1999' ? 'selected' : '' }}>1999
                                        </option>
                                        <option value="1998" {{ $data->year == '1998' ? 'selected' : '' }}>1998
                                        </option>
                                        <option value="1997" {{ $data->year == '1997' ? 'selected' : '' }}>1997
                                        </option>
                                        <option value="1996" {{ $data->year == '1996' ? 'selected' : '' }}>1996
                                        </option>
                                        <option value="1995" {{ $data->year == '1995' ? 'selected' : '' }}>1995
                                        </option>
                                        <option value="1994" {{ $data->year == '1994' ? 'selected' : '' }}>1994
                                        </option>
                                        <option value="1993" {{ $data->year == '1993' ? 'selected' : '' }}>1993
                                        </option>
                                        <option value="1992" {{ $data->year == '1992' ? 'selected' : '' }}>1992
                                        </option>
                                        <option value="1991" {{ $data->year == '1991' ? 'selected' : '' }}>1991
                                        </option>
                                        <option value="1990" {{ $data->year == '1990' ? 'selected' : '' }}>1990
                                        </option>
                                        <option value="1989" {{ $data->year == '1989' ? 'selected' : '' }}>1989
                                        </option>
                                        <option value="1988" {{ $data->year == '1988' ? 'selected' : '' }}>1988
                                        </option>
                                        <option value="1987" {{ $data->year == '1987' ? 'selected' : '' }}>1987
                                        </option>
                                        <option value="1986" {{ $data->year == '1986' ? 'selected' : '' }}>1986
                                        </option>
                                        <option value="1985" {{ $data->year == '1985' ? 'selected' : '' }}>1985
                                        </option>
                                        <option value="1984" {{ $data->year == '1984' ? 'selected' : '' }}>1984
                                        </option>
                                        <option value="1983" {{ $data->year == '1983' ? 'selected' : '' }}>1983
                                        </option>
                                        <option value="1982" {{ $data->year == '1982' ? 'selected' : '' }}>1982
                                        </option>
                                        <option value="1981" {{ $data->year == '1981' ? 'selected' : '' }}>1981
                                        </option>
                                        <option value="1980" {{ $data->year == '1980' ? 'selected' : '' }}>1980
                                        </option>
                                        <option value="1979" {{ $data->year == '1979' ? 'selected' : '' }}>1979
                                        </option>
                                        <option value="1978" {{ $data->year == '1978' ? 'selected' : '' }}>1978
                                        </option>
                                        <option value="1977" {{ $data->year == '1977' ? 'selected' : '' }}>1977
                                        </option>
                                        <option value="1976" {{ $data->year == '1976' ? 'selected' : '' }}>1976
                                        </option>
                                        <option value="1975" {{ $data->year == '1975' ? 'selected' : '' }}>1975
                                        </option>
                                        <option value="1974" {{ $data->year == '1974' ? 'selected' : '' }}>1974
                                        </option>
                                        <option value="1973" {{ $data->year == '1973' ? 'selected' : '' }}>1973
                                        </option>
                                        <option value="1972" {{ $data->year == '1972' ? 'selected' : '' }}>1972
                                        </option>
                                        <option value="1971" {{ $data->year == '1971' ? 'selected' : '' }}>1971
                                        </option>
                                        <option value="1970" {{ $data->year == '1970' ? 'selected' : '' }}>1970
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6" id="" style="">
                                    <label for="institute">Institute <span title="Required" class="text-danger">*</span>
                                        @error('institute')
                                            <span class="text-danger" id="">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" class="form-control" name="institute" id="institute"
                                        placeholder="" value="{{ $data->institute }}">

                                </div>

                                <div class="form-group col-md-6">
                                    <label for="duration">Duration <small>(Month)</small>
                                        @error('duration')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" class="form-control" name="duration" id="duration"
                                        value="{{ $data->duration }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="location">location
                                        @error('location')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input type="text" class="form-control" name="location" id="location"
                                        value="{{ $data->location }}">
                                </div>

                                <div class="col-md-12">
                                    <div class="text-end">
                                        <input type="submit" class="btn btn-primary"
                                            title="Save new Training information" value="Save">

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
                        <h3>Training Summary </h3>
                        <div class="edit-tools" style="display: none;"><button class="btn edit-btn"
                                aria-label="Edit Training"><i class="icon-pencil-o"></i>&nbsp;Edit</button><button
                                class="btn delete-btn" aria-label="Delete Training">&nbsp;Delete</button></div>
                    </div>
                    <form action="{{ route('training') }}" class="" id="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="title">Training Title <span class="text-danger">*</span>
                                    @error('title')
                                        <span class="text-danger" id="">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" required="required" class="form-control" name="title"
                                    id="title">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="country">Country<span title="Required" class="text-danger">*</span>
                                    @error('country')
                                        <span class="text-danger" id="">{{ $message }}</span>
                                    @enderror

                                </label>
                                <input type="text" name="country" id="country" class="form-control" required>
                            </div>


                            <div class="form-group col-md-6" id="">
                                <label for="topic">Topics Covered
                                    @error('topic')
                                        <span class="text-danger" id="">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" id="topic" name="topic" class="form-control" placeholder=""
                                    value="">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="year" id="yrsOfPass">
                                    <span>Year of Passing</span>
                                    <span title="Required" class="text-danger">*</span>
                                    @error('year')
                                        <span class="text-danger" id="">{{ $message }}</span>
                                    @enderror
                                </label>
                                <select class="form-control" name="year" id="year">
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

                            <div class="form-group col-md-6" id="" style="">
                                <label for="institute">Institute <span title="Required" class="text-danger">*</span>
                                    @error('institute')
                                        <span class="text-danger" id="">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" class="form-control" name="institute" id="institute"
                                    placeholder="" value="">

                            </div>

                            <div class="form-group col-md-6">
                                <label for="duration">Duration <small>(Month)</small>
                                    @error('duration')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" class="form-control" placeholder="" value=""
                                    name="duration" id="duration">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="location">location
                                    @error('location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" class="form-control" placeholder="" value=""
                                    name="location" id="location">
                            </div>


                            <div class="col-md-12">
                                <div class="text-end">
                                    <input type="submit" class="btn btn-primary" title="Save new Training information"
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
        });
    </script>
@endsection
