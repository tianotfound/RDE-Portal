@extends('layouts.app')

@section('content')

@can('view rdektm')
<div class="text-center py-5 mb-3">
    <h1 class="display-5 font-weight-bold" style="font-weight: bolder;">RDE & KTM</h1>
</div>

<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5><i class="far fa-copyright"></i> KTM
                        <span class="float-end">3</span>
                    </h5>
                </div>
                <a class="nav-link" href="{{ route('ktm.index') }}">
                    <div class="card-footer">
                        <small>View Details
                            <small class="float-end"><i class="fas fa-arrow-circle-right"></i></small>
                        </small>
                    </div>
                </a>
            </div>   
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5><i class="fas fa-book"></i> Research
                        <span class="float-end">3</span>
                    </h5>
                </div>
                <a class="nav-link" href="{{ route('research.index') }}">
                    <div class="card-footer">
                        <small>View Details
                            <small class="float-end"><i class="fas fa-arrow-circle-right"></i></small>
                        </small>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-warning">
                <div class="card-body">
                    <h5><i class="fas fa-users"></i> Extension
                        <span class="float-end">3</span>
                    </h5>
                </div>
                <a class="nav-link" href="{{ route('extension.index') }}">
                    <div class="card-footer">
                        <small>View Details
                            <small class="float-end"><i class="fas fa-arrow-circle-right"></i></small>
                        </small>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endcan

@can('view stats')
<div class="container mb-3">
    <div class="row">
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-body">
                    <small><b>test title</b></small>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Activity Logs</b></h5>
                    <hr>
                    <div class="col-md-12 mb-3">
                        <table class="table table-bordered table-sm table-hover">
                            <tr>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
@endcan

@endsection