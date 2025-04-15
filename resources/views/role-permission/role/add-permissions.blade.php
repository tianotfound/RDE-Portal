@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4><small><i class="fas fa-user-shield"></i> Role : <b>{{ $role->name }}</b></small>
                        <a href="{{ url('roles') }}" class="btn btn-danger btn-sm float-end"><i class="fas fa-backspace"></i> Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-5">
                            @error('permission')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label for="" class="col-md-12 mb-4 mt-2">Permissions
                                <button type="button" id="toggle-all" class="btn btn-primary btn-sm float-end"><i class="fas fa-check-square"></i> Select All</button>
                            </label>

                            <div class="row">
                                @foreach ($permissions as $permission)
                                <div class="col-md-4">
                                    <label>
                                        <input
                                            type="checkbox"
                                            name="permission[]"
                                            value="{{ $permission->name }}"
                                            class="permission-checkbox"
                                            {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}
                                        />
                                        {{ $permission->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const toggleAllButton = document.getElementById('toggle-all');
                                    toggleAllButton.addEventListener('click', function () {
                                        const checkboxes = document.querySelectorAll('.permission-checkbox');
                                        const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
                                        checkboxes.forEach(checkbox => checkbox.checked = !allChecked);
                                    });
                                });
                            </script>

                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-check-circle"></i> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection