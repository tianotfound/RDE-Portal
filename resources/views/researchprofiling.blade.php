@extends('layouts.app')

@section('content')

@include('partials.privacy_act')

<div class="text-center py-5 mb-3">
    <h1 class="display-5 font-weight-bold" style="font-weight: bolder;">Research Profile</h1>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card bg-primary text-white shadow-sm mb-3">
                <div class="card-body">
                    <h5><i class="fas fa-book-reader"></i> Ongoing
                        <span class="float-end">5</span>
                    </h5>
                </div>
                <a class="nav-link" href=" {{ route('ongoing.index') }} ">
                <div class="card-footer">
                    <small>View Details
                        <small class="float-end"><i class="fas fa-arrow-circle-right"></i></small>
                    </small>
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-secondary text-white shadow-sm mb-3">
                <div class="card-body">
                    <h5><i class="fas fa-check-circle"></i> Completed
                        <span class="float-end">{{ $completedpaper->count() }}</span>
                    </h5>
                </div>
                <a class="nav-link" href=" {{ route('completed.index') }} ">
                <div class="card-footer">
                    <small>View Details
                        <small class="float-end"><i class="fas fa-arrow-circle-right"></i></small>
                    </small>
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-white shadow-sm mb-3">
                <div class="card-body">
                    <h5><i class="fas fa-paste"></i> Presentation
                        <span class="float-end">5</span>
                    </h5>
                </div>
                <a class="nav-link" href=" {{ route('presentation.index') }} ">
                <div class="card-footer">
                    <small>View Details
                        <small class="float-end"><i class="fas fa-arrow-circle-right"></i></small>
                    </small>
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white shadow-sm mb-3">
                <div class="card-body">
                    <h5><i class="fas fa-book"></i> Publication
                        <span class="float-end">5</span>
                    </h5>
                </div>
                <a class="nav-link" href=" {{ route('publication.index') }} ">
                <div class="card-footer">
                    <small>View Details
                        <small class="float-end"><i class="fas fa-arrow-circle-right"></i></small>
                    </small>
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-danger text-white shadow-sm mb-3">
                <div class="card-body">
                    <h5><i class="fas fa-brain"></i> IP's
                        <span class="float-end">5</span>
                    </h5>
                </div>
                <a class="nav-link" href=" {{ route('ip.index') }} ">
                <div class="card-footer">
                    <small>View Details
                        <small class="float-end"><i class="fas fa-arrow-circle-right"></i></small>
                    </small>
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white shadow-sm mb-3">
                <div class="card-body">
                    <h5><i class="fas fa-trophy"></i> Citation and Awards
                        <span class="float-end">5</span>
                    </h5>
                </div>
                <a class="nav-link" href=" {{ route('caa.index') }} ">
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

@endsection