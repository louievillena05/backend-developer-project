@extends('adminlte::page')

@section('title', 'Employee List')

@section('content_header')
@stop

@section('content')
    <div class="container">
        <h2>Employee List</h2>
        <a href="{{ route('employee.create') }}"><button type="button" class="btn btn-primary" style="margin-bottom:10px;">Add Employee</button></a>
        <table class="table table-bordered" id="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->first_name. ' ' . $employee->last_name}}</td>
                    <td><a href="{{ route('company.show', $employee->company->id) }}">{{ $employee->company->name }}</a></td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>
                        <a href="{{ route('employee.show', $employee->id) }}"><button type="button" class="btn btn-success">Show</button></a>
                        <a href="{{ route('employee.edit', $employee->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                        <button type="button" class="btn btn-danger delete-employee" data-action="{{ route('employee.destroy', $employee->id) }}">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@stop

@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        } );

        $(".delete-employee").click(function(){
            var r = confirm("Delete this Employee?");
            if (r == true) {
                var id = $(this).data("id");
                var action = $(this).data("action");
                var token = '{{ csrf_token() }}';
            
                $.ajax(
                {
                    url: action,
                    type: 'DELETE',
                    data: {
                        "_token": token,
                    },
                    success: function (data){
                        alert(data.result);
                        location.href = "{{ route('employee.index') }}";
                    }
                });
            }
        
        });
    </script>
@stop