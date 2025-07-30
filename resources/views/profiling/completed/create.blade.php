@extends('layouts.app')

@section('content')

<div class="text-center py-5 mb-3">
    <h1 class="display-5 font-weight-bold" style="font-weight: bolder;">Add Completed Research</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('completed.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card py-4 px-4 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="title">Title of Completed Researches</label>
                                    <small class="form-text text-muted"><i> (Only funded by the institution and other agencies)</i></small>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="author">Authors</label>
                                    <small class="form-text text-muted"><i> Please separate multiple authors with a comma.</i></small>
                                    <input type="text" class="form-control" id="author" name="author" required placeholder="e.g. John Doe, Jane Smith">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="priorityarea">Priority Area</label>
                                    <input type="text" class="form-control" id="priorityarea" name="priorityarea" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="sdg">SDG Alignment</label>
                                    <select class="form-control" id="sdg" name="sdg[]" multiple size="10" required>
                                        <option value="SDG1">SDG 1 - No Poverty</option>
                                        <option value="SDG2">SDG 2 - Zero Hunger</option>
                                        <option value="SDG3">SDG 3 - Good Health and Well-being</option>
                                        <option value="SDG4">SDG 4 - Quality Education</option>
                                        <option value="SDG5">SDG 5 - Gender Equality</option>
                                        <option value="SDG6">SDG 6 - Clean Water and Sanitation</option>
                                        <option value="SDG7">SDG 7 - Affordable and Clean Energy</option>
                                        <option value="SDG8">SDG 8 - Decent Work and Economic Growth</option>
                                        <option value="SDG9">SDG 9 - Industry, Innovation and Infrastructure</option>
                                        <option value="SDG10">SDG 10 - Reduced Inequality</option>
                                        <option value="SDG11">SDG 11 - Sustainable Cities and Communities</option>
                                        <option value="SDG12">SDG 12 - Responsible Consumption and Production</option>
                                        <option value="SDG13">SDG 13 - Climate Action</option>
                                        <option value="SDG14">SDG 14 - Life Below Water</option>
                                        <option value="SDG15">SDG 15 - Life on Land</option>
                                        <option value="SDG16">SDG 16 - Peace, Justice and Strong Institutions</option>
                                        <option value="SDG17">SDG 17 - Partnerships for the Goals</option>
                                    </select>
                                    <small class="form-text text-muted">
                                        Select one or more Sustainable Development Goals (SDGs) that align with the research. <br> Hold down the Ctrl (Windows) or Command (Mac) button to select multiple options.
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="researchapproach">Research Approach</label>
                                    <input type="text" class="form-control" id="researchapproach" name="researchapproach" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="method">Classification of Method</label>
                                    <input type="text" class="form-control" id="method" name="method" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="file">Upload File</label>
                                    <input type="file" class="form-control" id="file" name="file" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="doi">DOI</label>
                                    <input type="text" class="form-control" id="doi" name="doi">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#confirmSubmitModal">
                            Submit
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
                                        <h5 class="modal-title" id="confirmSubmitModalLabel">Confirm Submission</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to submit this form? This action cannot be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Yes, Submit</button>
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