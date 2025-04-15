@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Card for Upload Picture Form -->
            <div class="card">
                <div class="card-header text-center">
                    <h2>Upload a Picture</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('pictures.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="picture" class="form-label">Choose Picture</label>
                            <input type="file" name="picture" id="picture" class="form-control" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection