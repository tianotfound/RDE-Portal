@extends('layouts.app')

@section('content')

<div class="text-center py-5 mb-3">
    <h1 class="display-5 font-weight-bold" style="font-weight: bolder;">Completed Research</h1>
</div>

<div class="container">
    <div class="col-md-12">
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
</div>

<div class="container">
    <div class="row">
        <!-- Table Section -->
        <div class="col-md-8">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Completed Research Projects</h5>
                <a href="{{ route('completed.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Project</a>
            </div>

            <table id="myTable" class="table table-bordered table-hover table-sm bg-transparent mb-3">
                <thead>
                    <tr>
                        <th style="width: 50%;">Title</th>
                        <th style="width: 20%;">Authors</th>
                        <th style="width: 30%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($completedPapers as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                        <td>
                            @foreach(explode(',', $project->author) as $author)
                                <span class="badge bg-info me-1">{{ $author }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('completed.show', $project->id) }}" class="btn btn-primary btn-sm me-2"><i class="far fa-eye"></i> View</a>
                            @can('edit completed research')
                            <a href="{{ route('completed.edit', $project->id) }}" class="btn btn-warning btn-sm me-2"><i class="far fa-edit"></i> Edit</a>
                            @endcan
                            @can('delete completed research')
                            <button type="button" class="btn btn-danger btn-sm me-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $project->id }}">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                            @endcan
                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $project->id }}">Confirm Deletion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete the Completed Research titled "{{ $project->title }}"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('completed.destroy', $project->id) }}" method="POST" class="d-inline">
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
                </tbody>
            </table>
        </div>

        <!-- User Uploads Section -->
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-body bg-success text-white">
                            <h7 class="card-title">Total Completed Research
                                <p class="card-text float-end">{{ $completedPapers->count() }}</p>
                            </h7>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-body bg-warning">
                            <h7 class="card-title">Your Uploaded Completed Research
                                @php
                                $userUploads = $completedPapers->filter(function($upload) {
                                    return $upload->user?->id === auth()->id();
                                });
                                @endphp
                                @if($userUploads->isNotEmpty())
                                    <p class="card-text float-end">{{ $userUploads->count() }}</p>
                                @else
                                    <p class="card-text text-muted float-end"><i>You have not uploaded any completed research yet.</i></p>
                                @endif
                            </h7>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5>Your Recent Uploads
                        <img src="{{ asset('uploads/' . auth()->user()->dp) }}" alt="User Picture" class="float-end rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                    </h5>
                    <hr>
                    {{-- <p><strong>User Name:</strong> {{ auth()->user()->name }}                   
                        <span class="badge bg-success float-end">Role: {{ auth()->user()->getRoleNames()->join(', ') }}</span>
                    </p> --}}
                    @php
                        $userUploads = $completedPapers->filter(function($upload) {
                            return $upload->user?->id === auth()->id();
                        });
                    @endphp
                    @if($userUploads->isNotEmpty())
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 50%;">Title</th>
                                    <th style="width: 50%;">Date / Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userUploads as $upload)
                                    <tr>
                                        <td style="width: 70%;">{{ Str::limit($upload->title, 40) }}</td>
                                        <td style="width: 30%;">{{ $upload->created_at->format('F j, Y g:i A') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-muted">You have not uploaded any completed research yet.</p>
                    @endif
                </div>
            </div>
            <div class="card mt-2 mb-3">
                <div class="card-header">
                    <h5>Research Progress Overview</h5>
                </div>
                <div class="card-body">
                    <canvas id="researchChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('researchChart').getContext('2d');
            const researchChart = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: ['AI Research', 'Climate Change', 'Data Analysis'],
                datasets: [{
                    label: 'Progress (%)',
                    data: [100, 50, 30],
                    backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
                },
                options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                }
            });
            });
        </script>
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