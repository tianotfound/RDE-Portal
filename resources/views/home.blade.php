@extends('layouts.app')

@section('content')

@unless(auth()->user()->roles->count())
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-primary">
                    <div class="card-body text-center text-white">
                        <div class="card-text">
                            <h2><b>REGISTRATION COMPLETED</b></h2>
                            <h5>Please wait for the approval of your account!</h5>
                            <figcaption class="text-white">
                                <cite title="Source Title">-Administrator</cite>
                              </figcaption>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endunless

@can('view dashboard')
<div class="container mb-5">
    <h4>DASHBOARD</h4> 
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



{{-- <div class="col-md-4 mb-3">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><b>RDE DIRECTOR</b></h5>
            <!-- Latest Uploaded Picture -->
            @if ($latestPicture)
            <div class="col-md-8 mb-3 latest-image-card">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('pictures.show', $latestPicture->id) }}">
                            <img src="{{ asset('storage/' . $latestPicture->path) }}" alt="{{ $latestPicture->name }}" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
            @endif
            <a href="{{ route('pictures.index') }}"><button class="btn btn-success btn-sm">Upload an Image</button></a>
        </div>
    </div>
</div> --}}