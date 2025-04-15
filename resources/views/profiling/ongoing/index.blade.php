@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Ongoing Research Archive</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author(s)</th>
                <th>Start Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Research on AI</td>
                <td>John Doe, Jane Smith</td>
                <td>2023-01-15</td>
                <td>Ongoing</td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm mr-5">View</a>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Climate Change Impact</td>
                <td>Emily Johnson</td>
                <td>2022-11-10</td>
                <td>Ongoing</td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm">View</a>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection