@extends('backend.partial.layout')

@section('title')
    <span>Our Service</span>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            {{-- <div class="">
            @include('components.message')
        </div> --}}
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Service no.1</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('service') }}" method="post">
                                @csrf
                                @if (userService('service_1'))
                                    @method('put')
                                @endif
                                <input type="hidden" name="service_no" value="service_1">
                                <input type="hidden" name="slug"
                                    value="{{ userService('service_1') !== null ? userService('service_1')->slug : '' }}">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ userService('service_1') !== null ? userService('service_1')->name : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea class="form-control" name="desc" id="desc">{{ userService('service_1') !== null ? userService('service_1')->desc : '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Service no.2</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('service') }}" method="post">
                                @csrf
                                @if (userService('service_2'))
                                    @method('put')
                                @endif
                                <input type="hidden" name="service_no" value="service_2">
                                <input type="hidden" name="slug"
                                    value="{{ userService('service_2') !== null ? userService('service_2')->slug : '' }}">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ userService('service_2') !== null ? userService('service_2')->name : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea class="form-control" name="desc" id="desc">{{ userService('service_2') !== null ? userService('service_2')->desc : '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Service no.3</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('service') }}" method="post">
                                @csrf
                                @if (userService('service_3'))
                                    @method('put')
                                @endif
                                <input type="hidden" name="service_no" value="service_3">
                                <input type="hidden" name="slug"
                                    value="{{ userService('service_3') !== null ? userService('service_3')->slug : '' }}">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ userService('service_3') !== null ? userService('service_3')->name : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea class="form-control" name="desc" id="desc">{{ userService('service_3') !== null ? userService('service_3')->desc : '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Service no.4</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('service') }}" method="post">
                                @csrf
                                @if (userService('service_4'))
                                    @method('put')
                                @endif
                                <input type="hidden" name="service_no" value="service_4">
                                <input type="hidden" name="slug"
                                    value="{{ userService('service_4') !== null ? userService('service_4')->slug : '' }}">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ userService('service_4') !== null ? userService('service_4')->name : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea class="form-control" name="desc" id="desc">{{ userService('service_4') !== null ? userService('service_4')->desc : '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Service no.5</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('service') }}" method="post">
                                @csrf
                                @if (userService('service_5'))
                                    @method('put')
                                @endif
                                <input type="hidden" name="service_no" value="service_5">
                                <input type="hidden" name="slug"
                                    value="{{ userService('service_5') !== null ? userService('service_5')->slug : '' }}">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ userService('service_5') !== null ? userService('service_5')->name : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea class="form-control" name="desc" id="desc">{{ userService('service_5') !== null ? userService('service_5')->desc : '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Service no.6</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('service') }}" method="post">
                                @csrf
                                @if (userService('service_6'))
                                    @method('put')
                                @endif
                                <input type="hidden" name="service_no" value="service_6">
                                <input type="hidden" name="slug"
                                    value="{{ userService('service_6') !== null ? userService('service_6')->slug : '' }}">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ userService('service_6') !== null ? userService('service_6')->name : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea class="form-control" name="desc" id="desc">{{ userService('service_6') !== null ? userService('service_6')->desc : '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
