@extends('layouts.app')

@section('content')

<div class="text-center py-5 mb-3">
    <h1 class="display-5 font-weight-bold" style="font-weight: bolder;">Create Tracking Routes</h1>
</div>

<div class="container">
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="track">Track Name</label>
            <input type="text" class="form-control" id="track" name="track" required>
        </div>
        <div class="form-group">
            <label for="route">Route (JSON format)</label>
            <input type="text" class="form-control" id="route" name="route" rows="5" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection