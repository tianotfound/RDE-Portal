@extends('layouts.app')

@section('content')

<div class="text-center py-5 mb-3">
    <h1 class="display-5 font-weight-bold" style="font-weight: bolder;">Track Routes</h1>
    @if(session('status'))
        <div class="alert alert-success text-center mb-4" id="statusMessage">
            {{ session('status') }}
        </div>
        <script>
            setTimeout(function() {
                $('#statusMessage').fadeOut('slow');
            }, 3000);
        </script>
    @endif
</div>

<div class="container">
    <div class="row mb-3">
        <div class="col-md-9">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Track Routes</h5>
                <a href="{{ route('trackroute.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add Track Route</a>
            </div>

            <table id="myTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Track ID</th>
                        <th>Route Name</th>
                        <th>Route Points</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trackroute as $trackRoute)
                        <tr>
                            <td>{{ $trackRoute->code }}</td>
                            <td>{{ $trackRoute->route_name }}</td>
                            <td>
                                @if(str_contains($trackRoute->routepoints, ','))
                                    @foreach(explode(',', $trackRoute->routepoints) as $point)
                                        <span class="badge bg-info text-dark me-2">{{ trim($point) }}</span>
                                    @endforeach
                                @else
                                    <span class="badge bg-info text-dark">{{ $trackRoute->routepoints }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('trackroute.show', $trackRoute->id) }}" class="btn btn-primary btn-sm me-2"><i class="far fa-eye"></i> View</a>
                                @can('edit route')
                                <a href="{{ route('trackroute.edit', $trackRoute->id) }}" class="btn btn-warning btn-sm me-2"><i class="far fa-edit"></i> Edit</a>
                                @endcan
                                @can('delete route')
                                <button type="button" class="btn btn-danger btn-sm me-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $trackRoute->id }}">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                                @endcan
                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="deleteModal{{ $trackRoute->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $trackRoute->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $trackRoute->id }}">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this track route "{{ $trackRoute->route_name }}"?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('trackroute.destroy', $trackRoute->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header text-center">Track Route Information</div>
                <div class="card-body bg-success text-white text-center">
                    <h2>Routes: {{$trackroute->count()}}</h2>
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