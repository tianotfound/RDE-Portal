@extends('layouts.app')

@section('content')

<div class="text-center py-5 mb-3">
    <h1 class="display-5 font-weight-bold" style="font-weight: bolder;">Create Track Routes</h1>
</div>

<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <a href="{{ route('trackroute.index') }}"><button class="btn btn-danger btn-sm float-end">Back</button></a>  
            <form action="{{ route('trackroute.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="code" class="form-label">Track ID</label><br>
                    <small><i>This 16-alphanumeric serial number was automatically created.</i></small>
                    <input type="text" class="form-control text-muted" id="code" name="code" value="{{ Str::random(16) }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="route_name" class="form-label">Route Name</label>
                    <input type="text" class="form-control" id="route_name" name="route_name" required>
                </div>
                <div class="mb-3">
                    <label for="routepoints" class="form-label">Route Points</label><br>
                    <small><i>Separate route points with a comma.</i></small>
                    <textarea class="form-control" id="routepoints" name="routepoints" rows="4" required placeholder="e.g. Presented, Ongoing"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Track Route</button>
            </form>
        </div>
    </div>
</div>

@endsection