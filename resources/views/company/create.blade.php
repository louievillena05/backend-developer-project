@extends('adminlte::page')

@section('title', 'Create Company')

@section('content_header')
    <h1>Create Company</h1>
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
    <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Company Name">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="logo">Company Logo</label>
            <input type="file" class="form-control-file" name="image" id="logo">
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" class="form-control" name="website" id="website" placeholder="Company Website">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop