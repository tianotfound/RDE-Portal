@extends('layouts.app')
@section('content')

<div class="container py-3">
    <a class="btn btn-danger btn-sm float-end mb-3" href="{{ route('completed.index') }}">Back</a>
</div>
<div class="container py-5">
    <h1 class="display-7" style="font-weight: bolder;">{{ $completedPaper->title }}</h1>
    <hr>
    <strong>Authors: </strong>
    @foreach(explode(',', $completedPaper->author) as $author)
        <span class="  me-1">{{ $author }},</span>
    @endforeach
    <hr>
    <p><strong>SDG Alignment: </strong>
        @foreach(json_decode($completedPaper->sdg) as $sdg)
            @php
                $badgeColors = [
                    'SDG1' => 'badge bg-primary',
                    'SDG2' => 'badge bg-success',
                    'SDG3' => 'badge bg-danger',
                    'SDG4' => 'badge bg-warning',
                    'SDG5' => 'badge bg-info',
                    'SDG6' => 'badge bg-secondary',
                    'SDG7' => 'badge bg-success',
                    'SDG8' => 'badge bg-dark',
                    'SDG9' => 'badge bg-primary',
                    'SDG10' => 'badge bg-success',
                    'SDG11' => 'badge bg-danger',
                    'SDG12' => 'badge bg-warning',
                    'SDG13' => 'badge bg-info',
                    'SDG14' => 'badge bg-secondary',
                    'SDG15' => 'badge bg-success',
                    'SDG16' => 'badge bg-dark',
                    'SDG17' => 'badge bg-primary',
                ];
            @endphp
            <span class="me-1 {{ $badgeColors[$sdg] }}">{{ $sdg }}</span>
        @endforeach
    </p>
    <hr>
    @if($completedPaper->doi)
        <small>DOI: <a href="{{ $completedPaper->doi }}" target="_blank" style="text-decoration: none;">{{ $completedPaper->doi }}</a></small>
    @else
        <small class="text-muted">No DOI available for this Completed Research Paper.</small>
    @endif
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header bg-success text-white">
                    <h5>Research Details</h5>
                </div>
                <div class="card-body">
                    <p><strong>Priority Area:</strong> {{ $completedPaper->priorityarea }}</p>
                    <p><strong>Research Approach:</strong> {{ $completedPaper->researchapproach }}</p>
                    <p><strong>Classification of Method:</strong> {{ $completedPaper->method }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-body">
                    <a href="{{ asset($completedPaper) }}" target="_blank">
                        {{ basename($completedPaper) }}
                    </a>
                </div>
            </div>
        </div>                
    </div>
</div>

@endsection