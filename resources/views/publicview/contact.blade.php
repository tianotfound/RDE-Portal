@extends('layouts.welcome')

@section('content')

    <div class="container mb-5">
        <div class="col-md-12 text-center" style="background: linear-gradient(to right, red, gold); -webkit-background-clip: text; color: transparent;">
            <h2>Contact Us</h2>
            <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" style="text-decoration: none; color: #0d6efd;">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('contact-us.index') }}" style="text-decoration: none; color: black;">Contact Us</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-4">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    </div>
                    <div class="card-body row">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="mb-3">
                                <div class="fw-bold mb-2">Our Location</div>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.3474280231853!2d121.64755477523279!3d18.351815982709304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33861d4a29aab9c5%3A0x1060a7bf5855e498!2sCagayan%20State%20University%2C%20Aparri%20Campus!5e1!3m2!1sen!2sph!4v1747901195972!5m2!1sen!2sph" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="fw-bold mb-2">Contact Details</div>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">
                                    <i class="bi bi-telephone-fill"></i>
                                    <strong>Phone:</strong> <a href="tel:+1234567890">+1 (234) 567-890</a>
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-envelope-fill"></i>
                                    <strong>Email:</strong> <a href="mailto:info@example.com">info@example.com</a>
                                </li>
                                <li>
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <strong>Address:</strong> 123 Main Street, Melbourne, VIC, Australia
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="fw-bold mb-2">Send us a message</div>
                            <form method="POST" action="{{ route('contact-us.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Your Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="8" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h2>ano na nga ba ito</h2>

@endsection