@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Success/Error Message Display -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h1 class="text-center mb-4">Pictures</h1>

    <!-- Upload New Picture Button -->
    <div class="upload-link">
        <a href="{{ route('pictures.create') }}" class="btn btn-primary">Upload New Picture</a>
    </div>

    <!-- Picture Grid -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($pictures as $picture)
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ $picture->name }}</h5>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('storage/' . $picture->path) }}" alt="{{ $picture->name }}" class="img-fluid">
                    </div>
                    <div class="card-footer">
                        <!-- Edit and Delete Buttons -->
                        <a href="{{ route('pictures.edit', $picture->id) }}" class="btn btn-primary btn-edit">Edit</a>
                        <form action="{{ route('pictures.destroy', $picture->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection