@extends('Admin-panel.Partial.Layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">Company New Info </div>
                    
                    {{-- <a href="{{ route('Company_info.bannar') }}" class="btn btn-primary">Bannar</a> --}}
                </div>
                <div class="card-body">
                    <form action="{{ route('Company_info.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <input type="hidden" class="form-control" id="id" name="id" value="{{ (!empty($info))?$info->id:'' }}" />
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control" id="company_name" name="name" value="{{ (!empty($info))?$info->name:'' }}" 
                                        placeholder="Enter Company Name" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ (!empty($info))?$info->address:'' }}" 
                                        placeholder="Enter address" />
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="company_info">Company Info</label>
                                    <textarea class="form-control" id="company_info" name="company_info" rows="5">
                                        {{ (!empty($info))?$info->info:'' }}
                                    </textarea>
                                    @error('company_info')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="phone" class="form-control" id="phone" name="phone" value="{{ (!empty($info))?$info->phone:'' }}"
                                        placeholder="Enter phone....." />
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="city">City</label>
                                    <select name="city_id" id="city" class="form-control">
                                        <option value="">Select City</option>
                                        @foreach($districts as $key => $data)
                                        <option value="{{ $data->id }}" {{ !empty($info->thana_id) &&  $data->id == $info->thana_id?'selected':'' }}>{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" class="form-control" name="logo" id="logo" />
                                    <input type="hidden" class="form-control" name="old_logo" id="old_logo" value="{{ (!empty($info))?$info->logo:'' }}"/>
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <img id="logo-preview" src="{{ !empty($info) ? asset('Upload/Logo/'.$info->logo):'' }}" alt="Logo Preview"
                                        style=" max-width: 200px; max-height: 200px; border:2px solid rgb(199, 199, 199); padding:5px;" />
                                </div>

                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ (!empty($info))?$info->email:'' }}"
                                        placeholder="Enter Email" />
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="district">District</label>
                                    <select name="district_id" id="district" name="district" class="form-control">
                                        <option value="">Select District</option>
                                        @foreach($districts as $key => $data)
                                        <option value="{{ $data->id }}" {{ !empty($info->district_id) && $data->id == $info->district_id?'selected':'' }}>{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('district')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="Submit" class="btn btn-success" value="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            {{--  --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">Company Info</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Distict</th>
                                <th>Logo</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @if (!empty($info))
                                <tr>
                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->phone }}</td>
                                    <td>{{ $info->email }}</td>
                                    <td>{{ $info->address }}</td>
                                    <td>{{ $info->district->name }}</td>
                                    <td>{{ $info->district->name }}</td>
                                    <td><img src="{{ asset('Upload/Logo/'.$info->logo) }}" alt="No Image" style=" max-width: 70px; max-height: 70px; border:2px solid rgb(199, 199, 199); padding:5px;" ></td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                                @else
                                <tr>                                    
                                    <td colspan="8"><h4 class="text-center text-danger">No data</h4></td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Bennar --}}
            {{-- <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">Banner</div>
                </div>
                <div class="card-body">
                </div>
            </div> --}}
        </div>
    </div>

    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#district').on('change', function() {
                var district = this.val();
                console.log(district);
            })

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

            $('#banner').on('change', function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#banner-preview').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#banner-preview').hide();
                }
            });
        });
    </script>
@endsection
