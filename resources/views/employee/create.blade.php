@extends('adminlte::page')

@section('title', 'Create Employee')

@section('content_header')
    <h1>Create Employee</h1>
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
    <form action="{{ route('employee.store') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
            </div>
            <div class="form-group col-md-6">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
            </div>
        </div>
        <div class="form-group">
            <label for="company">Company</label>
            <select class="custom-select" name="company_id">
                @foreach($company as $com)
                    <option value="{{ $com->id }}">{{ $com->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop