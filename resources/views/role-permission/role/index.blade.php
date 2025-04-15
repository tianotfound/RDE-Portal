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
                    <h4 class="mb-0">
                        <small>Roles</small>
                    </h4>
                    @can('create role')
                    <a href="{{ url('roles/create') }}" class="btn btn-primary btn-sm"><i class="fas fa-user-plus"></i> Add Role</a>
                    @endcan
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th width="40%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="btn btn-warning mx-2 btn-sm">
                                        <i class="fas fa-key"></i> Add / Edit Role Permission
                                    </a>
            
                                    @can('update role')
                                    <a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    @endcan
            
                                    @can('delete role')
                                    <a href="{{ url('roles/'.$role->id.'/delete') }}" class="btn btn-danger btn-sm mx-2">
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

@endsection