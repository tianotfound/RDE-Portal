@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        
                        <div class="container mb-3">
                            <div class="col-md-12">
                                <h6>Edit Profile
                                    <span class="float-end">
                                        <small>Role: </small><small class="badge bg-primary">{{ $user->getRoleNames()->implode(', ') }}</small>
                                    </span>
                                </h6>
                            </div>
                            <hr>
                            <!-- Blank Circle with Profile Icon -->
                            <div 
                                style="
                                    width: 100px; 
                                    height: 100px; 
                                    border: 2px solid #ddd; 
                                    border-radius: 50%; 
                                    margin: 20px auto; 
                                    display: flex; 
                                    justify-content: center; 
                                    align-items: center;
                                "
                            >
                                <!-- FontAwesome Blank Profile Icon -->
                                <i class="fas fa-user" style="font-size: 50px; color: #aaa;"></i>
                            </div>
                            <h4 class="text-center">{{ old('name', $user->name) }}</h4>
                            <p class="text-center">{{ old('email', $user->email) }}</p>
                        </div>                        
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <small class="badge bg-success">email cannot be modified</small></label>
                                    <input type="email" class="form-control" name="email" id="email" readonly value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>  
                            </div>
                        </div>
                
                        <div class="mb-3">
                            <label for="password" class="form-label">Password <small>(leave blank to keep current)</small></label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="input password">
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('password', this)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="mb-5">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="input password">
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('password_confirmation', this)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <script>
                            function togglePasswordVisibility(fieldId, button) {
                                const field = document.getElementById(fieldId);
                                const icon = button.querySelector('i');
                                if (field.type === 'password') {
                                    field.type = 'text';
                                    icon.classList.remove('fa-eye');
                                    icon.classList.add('fa-eye-slash');
                                } else {
                                    field.type = 'password';
                                    icon.classList.remove('fa-eye-slash');
                                    icon.classList.add('fa-eye');
                                }
                            }
                        </script>
                
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-check-circle"></i> Update Profile</button>
                        <a href="{{ url('home') }}" class="btn btn-danger btn-sm float-end"><i class="fas fa-ban"></i> Cancel</a>
                    </form>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection
