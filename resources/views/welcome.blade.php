@extends('layouts.welcome')

@section('content')

@include('partials.header')

@include('partials.carousel')

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
                
            </div>
            <br>
            <hr>
            <br>
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fprofile.php%3Fid%3D61556951324032&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>
    </div>
</div>

@endsection