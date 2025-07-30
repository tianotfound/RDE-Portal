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

            <div class="card mt-3">
                <div class="card-header">
                    <h4><small>Users</small>
                        @can('create user')
                        <a href="{{ url('users/create') }}" class="btn btn-primary btn-sm float-end">
                            <i class="fas fa-user-plus"></i> Add User
                        </a>
                        @endcan
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Profile Picture</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Pin Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    @if ($user->dp)
                                        <img src="{{ asset('uploads/' . $user->dp) }}" alt="Profile Picture" width="50" height="50">
                                    @else
                                        <img src="{{ asset('images/csulogo.png') }}" alt="Profile Picture" width="50" height="50">
                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $role)
                                    <span class="badge bg-secondary">{{ $role }}</span>
                                    @endforeach
                                    @endif
                                </td>
                                <td>{{ $user->pin }}</td>
                                <td>
                                    @can('update user')
                                    <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    @endcan

                                    @can('delete user')
                                    <a href="{{ url('users/'.$user->id.'/delete') }}" class="btn btn-danger btn-sm mx-2">
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