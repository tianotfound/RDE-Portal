@extends('layouts.app')

@section('content')

<div class="text-center py-5 mb-3">
    <h1 class="display-5 font-weight-bold" style="font-weight: bolder;">Edit Completed Research</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('completed.update', $completedPaper->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card py-4 px-4 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="title">Title of Completed Researches (Only funded by the institution and other agencies)</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $completedPaper->title) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="author">Authors</label>
                                    <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $completedPaper->author) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="priorityarea">Priority Area</label>
                                    <input type="text" class="form-control" id="priorityarea" name="priorityarea" value="{{ old('priorityarea', $completedPaper->priorityarea) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="sdg">SDG Alignment</label>
                            
                                    @php
                                        // Get selected SDGs either from old input (after validation fail) or from the model (editing)
                                        $selectedSdgs = old('sdg') ?? (is_array($completedPaper->sdg) ? $completedPaper->sdg : json_decode($completedPaper->sdg, true));
                                    @endphp
                            
                                    <select class="form-control" id="sdg" name="sdg[]" multiple size="10" required>
                                        @foreach($sdgOptions as $key => $value)
                                            <option value="{{ $key }}" {{ in_array($key, $selectedSdgs ?? []) ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                            
                                    <small class="form-text text-muted">
                                        Select one or more Sustainable Development Goals (SDGs) that align with the research.
                                    </small>
                                </div>
                            </div>                                                       
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="researchapproach">Research Approach</label>
                                    <input type="text" class="form-control" id="researchapproach" name="researchapproach" value="{{ old('researchapproach', $completedPaper->researchapproach) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="method">Classification of Method</label>
                                    <input type="text" class="form-control" id="method" name="method" value="{{ old('method', $completedPaper->method) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="file">Upload File</label>
                                    <input type="file" class="form-control" id="file" name="file">
                                    <small class="form-text text-muted">Leave blank if you don't want to update the file.</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="doi">DOI</label>
                                    <input type="text" class="form-control" id="doi" name="doi" value="{{ old('doi', $completedPaper->doi) }}">
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#confirmSubmitModal">
                            Update
                        </button>

                        <a href="{{ route('completed.index') }}">
                            <button type="button" class="btn btn-danger float-end">
                                Cancel
                            </button>
                        </a>

                        <!-- Modal -->
                        <div class="modal fade" id="confirmSubmitModal" tabindex="-1" aria-labelledby="confirmSubmitModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmSubmitModalLabel">Confirm Update</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to update this form? This action cannot be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Yes, Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
