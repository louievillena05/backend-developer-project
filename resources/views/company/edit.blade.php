@extends('adminlte::page')

@section('title', 'Edit Company')

@section('content_header')
    <h1>Edit Company</h1>
@stop

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('company.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Company Name" value="{{ $data->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ $data->email }}">
        </div>
        <div class="form-group">
            <label for="logo">Company Logo</label>
            <input type="file" class="form-control-file" name="image" id="logo" accept="image/*">
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" class="form-control" name="website" id="website" placeholder="Company Website" value="{{ $data->website }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop