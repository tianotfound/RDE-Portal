@extends('layouts.welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 mb-3">
                <p>Sustainable Development Goal {{ $sdg->id }}</p>
                <hr>
                <h1 class="display-5 font-weight-bold mb-2" style="font-weight: bolder;">{{ $sdg->title }}</h1>
                <hr>
                <p class="mb-2">{{ $sdg->content }}</p>
                <hr>
                <img src="{{ asset('sdg/' . $sdg->banner) }}" alt="" class="img-fluid mb-2" style="width: 100%; height: auto;">
                @if($sdg->pdf)
                    <div class="mt-3">
                        <iframe src="{{ asset('sdg/' . $sdg->pdf) }}" width="100%" height="800px" style="border: none;"></iframe>
                    </div>
                @endif
            </div>
            <div class="col-md-3 text-center justify-content-center">
                <img src="{{ asset('sdg/' . $sdg->gif) }}" alt="SDG {{ $sdg->id }}" class="img-fluid" style="width: auto; height: 200px;">
                <hr>
                <h5 class="mt-3">CSU and All the SDGs</h5>
                <hr>
                <ul class="list-unstyled">
                    @foreach($sdgs as $item)
                        <li class="d-flex mb-2">
                            <img src="{{ asset('sdg/' . $item->logo) }}" alt="SDG {{ $item->id }} Logo" style="width: 50px; height: 50px; object-fit: contain; margin-right: 8px;">
                            <a href="{{ route('sustainable-development-goals.show', $item->id) }}" class="nav-link text-dark {{ $item->id == $sdg->id ? 'font-weight-bold text-primary' : '' }}">
                                SDG {{ $item->id }}: {{ $item->title }}
                            </a>
                        </li>
                        <hr>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="text-muted text-center small mt-4" style="font-size: 0.6rem;">
        Credits to the materials from 
        <a href="https://www.un.org/sustainabledevelopment/news/communications-material/" target="_blank" rel="noopener">
            <i>https://www.un.org/sustainabledevelopment/news/communications-material/</i>
        </a>
    </div>
@endsection