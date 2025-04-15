@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="title">Title of Completed Researches (Only funded by the institution and other agencies)</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="priority_area">Priority Area</label>
                                    <input type="text" class="form-control" id="priority_area" name="priority_area" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="sdg_alignment">SDG Alignment</label>
                                    <select class="form-control" id="sdg_alignment" name="sdg_alignment[]" multiple required>
                                        <option value="SDG 1 - No Poverty">SDG 1 - No Poverty</option>
                                        <option value="SDG 2 - Zero Hunger">SDG 2 - Zero Hunger</option>
                                        <option value="SDG 3 - Good Health and Well-being">SDG 3 - Good Health and Well-being</option>
                                        <option value="SDG 4 - Quality Education">SDG 4 - Quality Education</option>
                                        <option value="SDG 5 - Gender Equality">SDG 5 - Gender Equality</option>
                                        <option value="SDG 6 - Clean Water and Sanitation">SDG 6 - Clean Water and Sanitation</option>
                                        <option value="SDG 7 - Affordable and Clean Energy">SDG 7 - Affordable and Clean Energy</option>
                                        <option value="SDG 8 - Decent Work and Economic Growth">SDG 8 - Decent Work and Economic Growth</option>
                                        <option value="SDG 9 - Industry, Innovation and Infrastructure">SDG 9 - Industry, Innovation and Infrastructure</option>
                                        <option value="SDG 10 - Reduced Inequality">SDG 10 - Reduced Inequality</option>
                                        <option value="SDG 11 - Sustainable Cities and Communities">SDG 11 - Sustainable Cities and Communities</option>
                                        <option value="SDG 12 - Responsible Consumption and Production">SDG 12 - Responsible Consumption and Production</option>
                                        <option value="SDG 13 - Climate Action">SDG 13 - Climate Action</option>
                                        <option value="SDG 14 - Life Below Water">SDG 14 - Life Below Water</option>
                                        <option value="SDG 15 - Life on Land">SDG 15 - Life on Land</option>
                                        <option value="SDG 16 - Peace, Justice and Strong Institutions">SDG 16 - Peace, Justice and Strong Institutions</option>
                                        <option value="SDG 17 - Partnerships for the Goals">SDG 17 - Partnerships for the Goals</option>
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
                                    <label for="research_approach">Research Approach</label>
                                    <input type="text" class="form-control" id="research_approach" name="research_approach" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="classification_of_method">Classification of Method</label>
                                    <input type="text" class="form-control" id="classification_of_method" name="classification_of_method" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>  
                </div>
            </form>
        </div>
    </div>
</div>
@endsection