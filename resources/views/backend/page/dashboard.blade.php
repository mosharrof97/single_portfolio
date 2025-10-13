@extends('backend.partial.layout')

@section('content')
    <h4>{{ auth()->guard('user')->user()->name }}</h4>
@endsection
