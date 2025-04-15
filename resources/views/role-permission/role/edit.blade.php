@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if ($errors->any())
            <ul class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4><small>Edit Role</small>
                        <a href="{{ url('roles') }}" class="btn btn-danger btn-sm float-end"><i class="fas fa-backspace"></i> Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('roles/'.$role->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="">Role Name</label>
                            <input type="text" name="name" value="{{ $role->name }}" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-sm"></i> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection