@extends('layouts.app')

@section('content')
    <div class="text-center py-5 mb-3">
        <h1 class="display-5 font-weight-bold" style="font-weight: bolder;">SDG</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                @if(isset($sdg) && $sdg->count())
                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sdg as $item)
                                <tr>
                                    <td>
                                        @if($item->logo)
                                            <img src="{{ asset('sdg/' . $item->logo) }}" alt="Logo" width="50">
                                        @endif
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <a href="{{ route('sustainable-development-goals.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No SDGs found.</p>
                @endif
            </div>

            <div class="col-md-6 mb-3">
                <form action="{{ route('sustainable-development-goals.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-center mb-3">Add New SDG</h4>
                            <hr>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}">
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="4">{{ old('content') }}</textarea>
                            </div>
                        

                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo (JPG, JPEG, PNG, GIF - max 10MB)</label>
                                <input type="file" class="form-control" id="logo" name="logo" accept=".jpg,.jpeg,.png,.gif">
                            </div>

                            <div class="mb-3">
                                <label for="banner" class="form-label">Banner (JPG, JPEG, PNG, GIF - max 10MB)</label>
                                <input type="file" class="form-control" id="banner" name="banner" accept=".jpg,.jpeg,.png,.gif">
                            </div>

                            <div class="mb-3">
                                <label for="gif" class="form-label">GIF (GIF only - max 10MB)</label>
                                <input type="file" class="form-control" id="gif" name="gif" accept=".gif">
                            </div>

                            <div class="mb-3">
                                <label for="pdf" class="form-label">PDF (max 10MB)</label>
                                <input type="file" class="form-control" id="pdf" name="pdf" accept=".pdf">
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
@endsection