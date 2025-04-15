@extends('layouts.welcome')

@section('content')

    @include('partials.prompt')

    <div class="container-fluid py-3">
        <div class="col-md-12 text-center">
            <h2>KTM</h2>
            <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" style="text-decoration: none; color: black;">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('ktmall') }}" style="text-decoration: none; color: black;">Knowledge and Technology Management</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><b>Special title treatment</b></h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="badge bg-primary nav-link">SDG 5</a> <br>
                        <small><b>Proponents</b><br>
                            <span>Christian</span>
                        </small>
                    </div>
                    <div class="card-footer text-muted">
                        <small><i class="fas fa-eye"></i> View File</small>
                        <div class="float-end">
                            <small><i class="fas fa-download"></i> Download</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection