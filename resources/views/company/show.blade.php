@extends('adminlte::page')

@section('title', 'Show Company')

@section('content_header')
    <!-- <h1>Show Company</h1> -->
@stop

@section('content')
    <ul class="list-group">
        <li class="list-group-item">Company Name : <strong>{{ $data->name }}</strong></li>
        <li class="list-group-item">Email : <strong>{{ $data->email }}</strong></li>
        <li class="list-group-item">Website : <a href="{{ $data->website }}">{{ $data->website }}</a></li>
        <li class="list-group-item">
        Company Logo : 
        @if($data->logo !== null)
        <img src="{{ asset('storage/' . $data->logo) }}" width="100" height="100" />
        @endif
        </li>
    </ul>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop