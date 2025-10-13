@extends('Admin-panel.Partial.Layout')
@section('content')
<div class="row">
    <div class="col-md-12">
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
                            <th>Bennar</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $info->name }}</td>
                                <td>{{ $info->phone }}</td>
                                <td>{{ $info->email }}</td>
                                <td>{{ $info->address }}</td>
                                <td>{{ $info->thana_id }}</td>
                                <td>{{ $info->district_id }}</td>
                                <td><img src="" alt="No Image"></td>
                                <td>
                                    <a href="#" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection