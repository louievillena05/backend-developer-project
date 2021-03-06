@extends('adminlte::page')

@section('title', 'Company List')

@section('content_header')
    <!-- <h1>Index Company</h1> -->
@stop

@section('content')
    <div class="container">
        <h2>Company List</h2>
        <a href="{{ route('company.create') }}"><button type="button" class="btn btn-primary" style="margin-bottom:10px;">Add Company</button></a>
        <table class="table table-bordered" id="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>
                        @if($company->logo !== null)
                        <img src="{{ asset('storage/' . $company->logo) }}" width="100" height="100" />
                        @endif
                    </td>
                    <td><a href="{{ $company->website }}">{{ $company->website }}</a></td>
                    <td>
                        <a href="{{ route('company.show', $company->id) }}"><button type="button" class="btn btn-success">Show</button></a>
                        <a href="{{ route('company.edit', $company->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                        <button type="button" class="btn btn-danger delete-company" data-action="{{ route('company.destroy', $company->id) }}">Delete</button>
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

        $(".delete-company").click(function(){
            var r = confirm("Delete this Company?");
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
                        location.href = "{{ route('company.index') }}";
                    }
                });
            }
        
        });
    </script>
@stop