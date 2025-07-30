@extends('layouts.app')

@section('content')
    <div class="text-center py-5 mb-3">
        <h1 class="display-5 font-weight-bold" style="font-weight: bolder;">SDG</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 mb-3">
                <form action="{{ route('sustainable-development-goals.update', $sdg->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" required value="{{ old('title', $sdg->title) }}">
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="4">{{ old('content', $sdg->content) }}</textarea>
                    </div>
                
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo (JPG, JPEG, PNG, GIF - max 10MB)</label>
                        <input type="file" class="form-control" id="logo" name="logo" accept=".jpg,.jpeg,.png,.gif">
                        @if($sdg->logo)
                            <div class="mt-2">
                                <img src="{{ asset('sdg/' . $sdg->logo) }}" alt="Current Logo" width="50">
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="banner" class="form-label">Banner (JPG, JPEG, PNG, GIF - max 10MB)</label>
                        <input type="file" class="form-control" id="banner" name="banner" accept=".jpg,.jpeg,.png,.gif">
                        @if($sdg->banner)
                            <div class="mt-2">
                                <img src="{{ asset('sdg/' . $sdg->banner) }}" alt="Current Banner" width="100">
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="gif" class="form-label">GIF (GIF only - max 10MB)</label>
                        <input type="file" class="form-control" id="gif" name="gif" accept=".gif">
                        @if($sdg->gif)
                            <div class="mt-2">
                                <img src="{{ asset('sdg/' . $sdg->gif) }}" alt="Current GIF" width="50">
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="pdf" class="form-label">PDF (max 10MB)</label>
                        <input type="file" class="form-control" id="pdf" name="pdf" accept=".pdf">
                        @if($sdg->pdf)
                            <div class="mt-2">
                                <a href="{{ asset('sdg/' . $sdg->pdf) }}" target="_blank">View Current PDF</a>
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