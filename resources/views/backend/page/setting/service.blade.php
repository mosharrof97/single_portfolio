@extends('Company-panel.Partial.Layout')
@section('title')
    
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="">
            @include('components.message')
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add new service</h4> 
            </div>
            <div class="card-body">
                <form action="{{ route('com.service') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="">
                            
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="icon">Image <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="icon" name="icon" placeholder="">
                            
                            @error('icon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="desc">DESC</label>
                            <input type="text" class="form-control" id="desc" name="desc" placeholder="">
                            
                            @error('desc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Home Slider</h4> 
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Desc</th>
                                <th class="text-center">Icon</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $key => $data)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td class="text-center">{{ $data->name }}</td>
                                <td class="text-center">
                                    <span class="d-inline-block text-truncate" style="max-width: 200px;">{{ $data->desc }}</span>
                                </td>
                                <td class="text-center">
                                    <img src="{{ asset($data->icon) }}" alt="" width="30" height="30">
                                </td> 
                                <td class="text-center">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#view{{ $data->id }}"> <i class="fas fa-eye"></i></button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{ $data->id }}"> <i class="fas fa-edit"></i></button>
                                    
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $data->id }}"><i class="fas fa-trash"></i></button>   
                                </td>
                            </tr>
                            {{-- Edit Model --}}
                            <div class="modal fade" id="edit{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Service Edit Form</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('com.service.edit',$data->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="row">
                                                    <div class="col-md-12 form-group">
                                                        <label for="name">Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ $data->name }}">
                                                        
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 form-group">
                                                        <label for="icon">Image <span class="text-danger">*</span></label>
                                                        <input type="file" class="form-control" id="icon" name="icon" placeholder="">
                                                        <input type="hidden" name="old_icon" value="{{ $data->icon }}">
                                                        
                                                        @error('icon')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                            
                                                    <div class="col-md-12 form-group">
                                                        <div class="mb-3">
                                                            <label for="desc" class="col-form-label">DESC <span class="text-danger">*</span></label>
                                                            <textarea class="form-control" id="desc" name="desc">{{ $data->desc }}</textarea>
                                                        </div>
                                                        
                                                        @error('desc')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <input type="hidden" name="service_id" value="{{ $data->id }}">
                            
                                                    <div class="col-md-12 form-group">
                                                        <input type="submit" class="btn btn-primary" value="Submit">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Edit Models --}}

                            {{-- View Model --}}
                            <div class="modal fade" id="view{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">View Service</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="">
                                                <h4 class="fw-bold" style="border-bottom:2px solid black">{{ $data->name }}</h4>
                                                <p>{{ $data->desc }}</p>
                                                <img src="{{ asset($data->icon) }}" alt="" width="50" height="50">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- View Models --}}

                            {{-- Delete Model --}}
                            <div class="modal fade" id="delete{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                                        <div class="modal-body">
                                            <form action="{{ route('com.service.delete',$data->id ) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <h5 class="my-2">Are you sure you want to delete this service?</h5>
                                                <div class="form-group text-end">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-success" value="Ok">
                                                </div>                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Delete Models --}}
                            @endforeach                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection