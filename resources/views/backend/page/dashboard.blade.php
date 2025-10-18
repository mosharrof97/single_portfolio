@extends('backend.partial.layout')

@section('content')
    <h4>{{ auth()->guard('web')->user()->name }}</h4>
@endsection
