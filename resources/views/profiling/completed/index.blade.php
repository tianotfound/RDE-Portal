@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3 mt-2">
            <h4>Completed Researches
                <a href="{{ route('completed.create') }}" class="btn btn-primary btn-sm float-end"><i class="fas fa-plus-circle"></i> Completed Research</a>
            </h4>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9 mb-2">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Priority Area</th>
                                    <th>SDG Alignment</th>
                                    <th>Research Approach</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2">

        </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
