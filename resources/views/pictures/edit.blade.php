@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Card for Edit Picture Form -->
            <div class="card">
                <div class="card-header text-center">
                    <h2>Edit Picture</h2>
                </div>
                <div class="card-body">
                    <!-- Success/Error Message Display -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Form to Edit Picture -->
                    <form action="{{ route('pictures.update', $picture->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Display Current Image -->
                        <div class="form-group text-center">
                            <h5>Current Image</h5>
                            <img src="{{ asset('storage/' . $picture->path) }}" alt="Current Picture" class="img-preview rounded">
                        </div>

                        <!-- File Input for New Image (optional) -->
                        <div class="form-group">
                            <label for="picture" class="form-label">Choose New Picture (optional)</label>
                            <input type="file" name="picture" id="picture" class="form-control">
                            <div class="form-text">Select a new image to replace the current one. This is optional.</div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection