@extends('layouts.app')

@section('content')

<div class="container">
    <div class="py-5">
        <h1 class="display-5 font-weight-bold" style="font-weight: bolder;">File Tracking
            <div class="dropdown  float-end">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="generalSettingsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-cogs"></i> General Settings
                </button>
                <ul class="dropdown-menu" aria-labelledby="generalSettingsDropdown">
                    <li><a class="dropdown-item" href="{{ route('trackroute.index') }}">View Tracking Route</a></li>
                    <li><a class="dropdown-item" href="{{ route('trackroute.create') }}">Add File Tracking Route</a></li>
                </ul>
            </div>
        </h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-transparent border-0">
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>File</th>
                                <th>Current Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($completedpaper as $file)
                            <tr>
                                <td>{{ $file->title }} <br>
                                    From: <span class="badge bg-success">{{ $file->getTable() ?? 'Unknown Table' }}</span>
                                </td>
                                <td>{{ $file->status }}</td>
                                <td><a href="{{ route('filetracking.show', $file->id) }}" class="btn btn-primary btn-sm">View</a></td>
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