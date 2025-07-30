@extends('layouts.welcome')

@section('content')

<div class="container">
    <div class="col-md-12 text-center">
        <h2>Updates</h2>
        <nav aria-label="breadcrumb" class="d-flex justify-content-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" style="text-decoration: none; color: primary;">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('updateall.index') }}" style="text-decoration: none; color: black;">Updates</a></li>
            </ol>
        </nav>
    </div>
</div>

@endsection