@extends('layouts.welcome')

@section('content')

@include('partials.header')

@include('partials.carousel')

<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-12 text-center">
            <h1 style="background: linear-gradient(to right, red, gold); -webkit-background-clip: text; color: transparent;"><b>Welcome to the Research, Development, and Extension Portal</b></h1>
        </div>
        <div class="col-md-12 text-center">
            <p class="lead">Discover insights, updates, and resources for advancing research and innovation at CSU Aparri.</p>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="card">
        <div class="card-body">
            <marquee behavior="scroll" direction="left" scrollamount="10">
                <span class="badge bg-primary text-white mx-2">SDG 1: No Poverty</span>
                <span class="badge bg-success text-white mx-2">SDG 2: Zero Hunger</span>
                <span class="badge bg-danger text-white mx-2">SDG 3: Good Health and Well-being</span>
                <span class="badge bg-warning text-dark mx-2">SDG 4: Quality Education</span>
                <span class="badge bg-info text-white mx-2">SDG 5: Gender Equality</span>
                <span class="badge bg-secondary text-white mx-2">SDG 6: Clean Water and Sanitation</span>
                <span class="badge bg-dark text-white mx-2">SDG 7: Affordable and Clean Energy</span>
                <span class="badge bg-primary text-white mx-2">SDG 8: Decent Work and Economic Growth</span>
                <span class="badge bg-success text-white mx-2">SDG 9: Industry, Innovation, and Infrastructure</span>
                <span class="badge bg-danger text-white mx-2">SDG 10: Reduced Inequalities</span>
                <span class="badge bg-warning text-dark mx-2">SDG 11: Sustainable Cities and Communities</span>
                <span class="badge bg-info text-white mx-2">SDG 12: Responsible Consumption and Production</span>
                <span class="badge bg-secondary text-white mx-2">SDG 13: Climate Action</span>
                <span class="badge bg-dark text-white mx-2">SDG 14: Life Below Water</span>
                <span class="badge bg-primary text-white mx-2">SDG 15: Life on Land</span>
                <span class="badge bg-success text-white mx-2">SDG 16: Peace, Justice, and Strong Institutions</span>
                <span class="badge bg-danger text-white mx-2">SDG 17: Partnerships for the Goals</span>
            </marquee>
        </div>
    </div>
</div>

<div class="container mb-3">
    <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('images/csulogo.png') }}" alt="" style="width: auto; height: 50px;">
                        <h5>test</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('images/csulogo.png') }}" alt="" style="width: auto; height: 50px;">
                        <h5>test</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('images/csulogo.png') }}" alt="" style="width: auto; height: 50px;">
                        <h5>test</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 mb-2">
            <div class="card">
                <div class="card-header border-0">
                    <h6 class="py-4"><span>Updates</span></h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 py-3 text-center">
            <div class="container">
                <h4 class=""><b>Campus RDE Director</b></h4>
                <i class="fas fa-user-circle" style="font-size: 150px; color: #6c757d;"></i>
            </div>
            <hr>
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fcsuardektm&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>
    </div>
</div>

@endsection