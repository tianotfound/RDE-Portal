@extends('layouts.app')

@section('content')

<div class="text-center py-5 mb-3">
    <h1 class="display-5 font-weight-bold" style="font-weight: bolder;">Ongoing Research</h1>
</div>

<div class="container">
    <div class="row">
        <!-- Table Section -->
        <div class="col-md-8">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Ongoing Research Projects</h5>
                <a href="" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Project</a>
            </div>

            <table id="myTable" class="table table-bordered bg-transparent">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author(s)</th>
                        <th>Start Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Research on AI</td>
                        <td>John Doe, Jane Smith</td>
                        <td>2023-01-15</td>
                        <td>Ongoing</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm me-2"><i class="far fa-eye"></i> View</a>
                            <a href="#" class="btn btn-warning btn-sm me-2"><i class="far fa-edit"></i> Edit</a>
                            <a href="#" class="btn btn-danger btn-sm me-2"><i class="fas fa-trash-alt"></i> Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Climate Change Impact</td>
                        <td>Emily Johnson</td>
                        <td>2022-11-10</td>
                        <td>Ongoing</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm me-2"><i class="far fa-eye"></i> View</a>
                            <a href="#" class="btn btn-warning btn-sm me-2"><i class="far fa-edit"></i> Edit</a>
                            <a href="#" class="btn btn-danger btn-sm me-2"><i class="fas fa-trash-alt"></i> Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- User Uploads Section -->
        <div class="col-md-4">
            <div class="card">
            <div class="card-header">
                <h5>Recent Uploads</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                <thead>
                    <tr>
                    <th>User</th>
                    <th>File</th>
                    <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>John Doe</td>
                    <td>AI_Research.pdf</td>
                    <td>2023-10-01</td>
                    </tr>
                    <tr>
                    <td>Jane Smith</td>
                    <td>Climate_Change.docx</td>
                    <td>2023-09-28</td>
                    </tr>
                    <tr>
                    <td>Emily Johnson</td>
                    <td>Data_Analysis.xlsx</td>
                    <td>2023-09-25</td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
            <div class="card mt-2">
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