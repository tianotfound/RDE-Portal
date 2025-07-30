@extends('layouts.welcome')

@section('content')

<div class="container">
    <div class="col-md-12 text-center">
        <h2>Announcements</h2>
        <nav aria-label="breadcrumb" class="d-flex justify-content-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" style="text-decoration: none; color: primary;">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('announcementall.index') }}" style="text-decoration: none; color: black;">Announcement</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mt-4">
    <!-- Filter Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <form method="GET" action="{{ route('announcementall.index') }}" class="form-inline d-flex justify-content-end gap-2 flex-wrap">
                <div class="form-group">
                    <label for="year" class="me-2">Year:</label>
                    <select name="year" id="year" class="form-select">
                        <option value="">All</option>
                        @for ($y = date('Y'); $y >= 2020; $y--)
                            <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group ms-3">
                    <label for="month" class="me-2">Month:</label>
                    <select name="month" id="month" class="form-select">
                        <option value="">All</option>
                        @foreach ([
                            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
                            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
                            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
                        ] as $num => $name)
                            <option value="{{ $num }}" {{ request('month') == $num ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary ms-3">Filter</button>
            </form>
        </div>
    </div>
    <!-- End Filter Section -->

    <div class="row">
        <div class="col-md-9 mb-3">
            <div class="card h-auto">
                <div class="row g-0">
                    <div class="col-md-3 d-flex align-items-center justify-content-center p-3">
                        <img src="{{ asset('images/2025.jpg') }}" alt="Thesis Award" class="img-fluid rounded shadow-sm" style="max-height: 220px; width: auto;">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h5 class="card-title mb-3"><b>2025 Campus Search for Best Undergraduate Thesis and Best Mentor Award</b></h5>
                            <p>
                                The 2025 Campus Search for the Best Undergraduate Thesis and Best Mentor Award is now open! This annual event celebrates exceptional research and outstanding mentorship within our academic community.
                            </p>
                            <p>
                                For guidelines, important dates, and submission details, visit the <a href="{{ route('announcementall.index') }}">announcement page</a> or contact the organizing committee.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <p>For more information, please Contact Us or visit our Facebook page.</p>
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fcsuardektm&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>
    </div>
</div>

@endsection