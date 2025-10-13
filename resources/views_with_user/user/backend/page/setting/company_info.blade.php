@extends('Company-panel.Partial.Layout')
@section('title')
  <h3>Company Info</h3>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">Company Info Edit</div>
                </div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            <span class="text-success">{{ session('message') }}</span>
                        </div>
                    @endif
                    <form action="{{ route('edit.company.info',$company->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="company_name">Company Name :<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="company_name" name="name" value="{{ $company->name }}"
                                        placeholder="Enter Company Name" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="slogan">Slogan :</label>
                                    <input type="text" class="form-control" id="slogan" name="slogan" value="{{ $company->slogan }}"
                                        placeholder="Enter Company slogan" />
                                    @error('slogan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="phone">Phone:<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="phone" name="phone" value="{{ $company->phone }}"
                                        placeholder="Enter phone" />
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $company->email }}"
                                        placeholder="Enter Email" readonly style="background-color: rgb(243, 243, 243);"/>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="address">Address:<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter address" value="{{ $company->address }}" />
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div> 
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="thana">City</label>
                                    <select name="thana_id" id="thana" class="form-control">
                                        <option value="">Select City</option>
                                        @foreach($districts as $key => $data)
                                        <option value="{{ $data->id }}" {{$company->thana_id == $data->id? 'selected':''}}>{{ $data->name }}</option>                                            
                                        @endforeach
                                    </select>
                                    @error('thana_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="district">District:<span class="text-danger">*</span></label>
                                    <select name="district_id" id="district" name="district" class="form-control">
                                        <option value="">Select District</option>
                                        @foreach($districts as $key => $data)
                                        <option value="{{ $data->id }}" {{ $company->district_id == $data->id ? 'selected':'' }}>{{ $data->name }}</option>                                            
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="logo">Logo:</label>
                                    <input type="file" class="form-control" name="logo" id="logo"  />
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <img id="logo-preview" src="{{ asset('Upload/Logo/'.$company->logo) }}" alt="Logo Preview"
                                        style=" max-width: 200px; max-height: 200px; border:2px solid rgb(199, 199, 199); padding:5px;" />
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="favicon">Favicon:</label>
                                    <input type="file" class="form-control" name="favicon" id="favicon"  />
                                    @error('favicon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <img id="favicon-preview" src="{{ asset('Upload/Favicon/'.$company->favicon) }}" alt="Logo Preview"
                                        style=" max-width: 200px; max-height: 200px; border:2px solid rgb(199, 199, 199); padding:5px;" />
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="company_info">Company Info</label>
                                    <textarea class="form-control" id="company_info" name="info" rows="5">{{ $company->info }}
                                    </textarea>
                                    @error('info')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>                                
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" ><i class="fas fa-edit"></i>Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#logo').on('change', function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#logo-preview').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#logo-preview').hide();
                }
            });

            $('#favicon').on('change', function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#favicon-preview').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#favicon-preview').hide();
                }
            });
        });
    </script>
@endsection
