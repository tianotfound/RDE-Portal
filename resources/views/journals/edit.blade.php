@extends('layouts.app')

@section('content')

    <div class="text-center py-5 mb-3">
        <h1 class="display-5 font-weight-bold" style="font-weight: bolder;">Campus Journal</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 mb-3">
                <form action="{{ route('campus-journals.update', $journals->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" required value="{{ old('title', $journals->title) }}">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $journals->description) }}</textarea>
                    </div>
                
                    <div class="mb-3">
                        <label for="banner" class="form-label">Banner (JPG, JPEG, PNG, GIF - max 10MB)</label>
                        <input type="file" class="form-control" id="banner" name="banner" accept=".jpg,.jpeg,.png,.gif">
                        @if($journals->banner)
                            <div class="mt-2">
                                <img src="{{ asset('journals/' . $journals->banner) }}" alt="Current banner" width="50">
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">File (max 50MB)</label>
                        <input type="file" class="form-control" id="file" name="file" accept=".pdf">
                        @if($journals->file)
                            <div class="mt-2">
                                <a href="{{ asset('journals/' . $journals->file) }}" target="_blank">View Current PDF</a>
                            </div>
                        @endif
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection