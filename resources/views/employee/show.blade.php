@extends('adminlte::page')

@section('title', 'Show Employee')

@section('content_header')
    <h1>Show Employee</h1>
@stop

@section('content')
    <ul class="list-group">
        <li class="list-group-item">Employee Name : <strong>{{ $data->first_name . ' ' . $data->last_name }}</strong></li>
        <li class="list-group-item">Email : <strong>{{ $data->email }}</strong></li>
        <li class="list-group-item">Phone Number : <strong>{{ $data->phone }}</strong></li>
    </ul>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop