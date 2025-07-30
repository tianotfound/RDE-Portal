@extends('layouts.app')

@section('content')

<div class="container py-5 mb-3">
    <div class="col-md-12">
        <h1 class="display-5 font-weight-bold" style="font-weight: bolder;">Show Track Route
            <a href="{{ route('trackroute.index') }}"><button class="btn btn-danger btn-sm float-end">Back</button></a>
        </h1>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h6 class="text-center">Track ID</h6>
            <h4 class="font-weight-bold text-center mb-2">{{ $trackroute->code }}</h4>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Track ID: {{ $trackroute->code }}</h5>
                    <p class="card-text">Route Name: {{ $trackroute->route_name }}</p>
                    <p class="card-text">Description: {{ $trackroute->description }}</p>
                    <p class="card-text">Created At: {{ $trackroute->created_at->format('d-m-Y H:i') }}</p>
                    <p class="card-text">Updated At: {{ $trackroute->updated_at->format('d-m-Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

