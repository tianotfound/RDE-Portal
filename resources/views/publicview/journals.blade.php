@extends('layouts.welcome')

@section('content')

    <div class="container mb-5">
        <div class="col-md-12 text-center" style="background: linear-gradient(to right, red, gold); -webkit-background-clip: text; color: transparent;">
            <h2>Campus Journals</h2>
            <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" style="text-decoration: none; color: #0d6efd;">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('campus-journals.index') }}" style="text-decoration: none; color: black;">Campus Journals</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    @foreach($journals as $journal)
                        <div class="card mb-3">
                            <div class="card-body d-flex align-items-center">
                                <div class="me-3" style="flex: 0 0 180px;">
                                    <img src="{{ asset('journals/' . $journal->banner) }}" class="img-fluid rounded" alt="" style="max-width: 150px; height: auto;">
                                </div>
                                <div>
                                    <h4>{{ $journal->title }}</h4>
                                    <hr>
                                    <p>{{ $journal->description }}</p>
                                    <a href="{{ asset('journals/' . $journal->file) }}" target="_blank" class="btn btn-primary btn-sm mt-2">
                                        <i class="fas fa-eye"></i> View PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-3">
                    <div class="card mb-4">
                        @php
                            use Illuminate\Support\Facades\Auth;
                            use App\Models\User;

                            $rdeDirectors = User::whereHas('roles', function($q) {
                                $q->where('name', 'RDE Director');
                            })->get();

                            $extensionCoordinators = User::whereHas('roles', function($q) {
                                $q->where('name', 'Extension Coordinator');
                            })->get();
                        @endphp

                        <div class="card-header bg-primary text-white">
                            <strong>RDE Director</strong>
                        </div>
                        <div class="card-body">
                            @if($rdeDirectors->isEmpty())
                                <p>No RDE Directors found.</p>
                            @else
                                <ul class="list-unstyled mb-0">
                                    @foreach($rdeDirectors as $director)
                                        <li class="d-flex align-items-center">
                                            <div class="me-2">
                                                <img src="{{ $director->dp ? asset('uploads/' . $director->dp) : asset('images/csulogo.png') }}" alt="DP" class="image-fluid" width="70" height="70">
                                            </div>
                                            <div>
                                                <strong>{{ $director->name }}</strong><br>
                                                <small>{{ $director->email }}</small>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <strong>Extension Coordinator</strong>
                        </div>
                        <div class="card-body">
                            @if($extensionCoordinators->isEmpty())
                                <p>No Extension Coordinators found.</p>
                            @else
                                <ul class="list-unstyled mb-0">
                                    @foreach($extensionCoordinators as $coordinator)
                                        <li class="d-flex align-items-center">
                                            <div class="me-2">
                                                <img src="{{ $coordinator->dp ? asset('uploads/' . $coordinator->dp) : asset('default-profile.png') }}" alt="DP" class="image-fluid" width="70" height="70">
                                            </div>
                                            <div>
                                                <strong>{{ $coordinator->name }}</strong><br>
                                                <small>{{ $coordinator->email }}</small>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection