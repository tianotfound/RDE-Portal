@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <a href="{{ url('roles') }}" class="btn btn-primary btn-sm mx-1">
        <i class="fas fa-user-tag"></i> Roles
    </a>
    <a href="{{ url('permissions') }}" class="btn btn-info btn-sm mx-1">
        <i class="fas fa-key"></i> Permissions
    </a>
    <a href="{{ url('users') }}" class="btn btn-warning btn-sm mx-1">
        <i class="fas fa-users"></i> Users
    </a>
</div>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card mt-3 shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><small>Permissions</small></h4>
                    @can('create permission')
                    <a href="{{ url('permissions/create') }}" class="btn btn-primary btn-sm"><i class="fas fa-user-plus"></i> Add Permission</a>
                    @endcan
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-hover tabe-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th width="40%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    @can('update permission')
                                    <a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    @endcan
            
                                    @can('delete permission')
                                    <a href="{{ url('permissions/'.$permission->id.'/delete') }}" class="btn btn-danger btn-sm mx-2">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
@endsection