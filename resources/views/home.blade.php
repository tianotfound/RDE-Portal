@extends('layouts.app')

@section('content')

<div class="text-center py-5 mb-3">
    <h1 class="display-5 font-weight-bold" style="font-weight: bolder;">Dashboard</h1>
</div>

@unless(auth()->user()->roles->count())
    <div class="container mt-5">
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
                <div class="text-center mt-3">
                    <a href="/profile" class="btn btn-light">Edit Your Profile</a>
                </div>
            </div>
        </div>
    </div>
@endunless

@can('view dashboard')
<div class="container mb-3">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3 bg-primary text-white">
                <div class="card-body">
                    <h5><i class="far fa-copyright"></i> KTM
                        <span class="float-end"> {{ App\Models\Ktm::count() }} </span>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-3 bg-success text-white">
                <div class="card-body">
                    <h5><i class="fas fa-book"></i> Research
                        <span class="float-end">3</span>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-3 bg-warning">
                <div class="card-body">
                    <h5><i class="fas fa-users"></i> Extension
                        <span class="float-end">3</span>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <hr>
    <div class="row">

        <div class="col-md-8 mb-3">
            <div class="card py-3 mb-3 bg-light">
                <div class="card-body">
                    
                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="dropdown mb-3">
                <button class="btn btn-outline-secondary w-100 text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span><i class="fas fa-bars me-2"></i>Menu</span>
                    <i class="fas fa-caret-down"></i>
                </button>
                <ul class="dropdown-menu w-100 mt-1">
                    <li><a class="dropdown-item" href="{{ route('sustainable-development-goals.create') }}">Updates</a></li>
                    <li><a class="dropdown-item" href="{{ route('sustainable-development-goals.create') }}">Announcements</a></li>
                    <li><a class="dropdown-item" href="{{ route('sustainable-development-goals.create') }}">Banner</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('campus-journals.create') }}">Journals</a></li>
                    <li><a class="dropdown-item" href="#">RDE Agenda</a></li>
                    <li><a class="dropdown-item" href="#">Organizational Chart</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('sustainable-development-goals.create') }}">SDG</a></li>
                </ul>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="">List of All Users
                        <span class="float-end">{{ App\Models\User::count() }}</span>
                    </h5>
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Profile</th>
                                <th>Name</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(App\Models\User::all() as $user)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ $user->dp ? asset('uploads/' . $user->dp) : '/images/csulogo.png' }}" alt="User DP" class="rounded-circle" width="20" height="20">
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @if($user->roles->isNotEmpty())
                                            <span class="badge bg-primary">{{ $user->roles->pluck('name')->join(', ') }}</span>
                                        @else
                                            <span class="badge bg-danger">For Approval</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @include('partials.calendar')

        </div>
        
    </div>
</div>

@endcan
@endsection