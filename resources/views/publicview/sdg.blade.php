@extends('layouts.welcome')

@section('content')

    <div class="container mb-5">
        <div class="col-md-12 text-center" style="background: linear-gradient(to right, red, gold); -webkit-background-clip: text; color: transparent;">
            <h2>Sustainable Development Goals</h2>
            <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" style="text-decoration: none; color: #0d6efd;">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sustainable-development-goals.index') }}" style="text-decoration: none; color: black;">Sustainable Development Goals</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-9 mb-3">
                <div class="row">
                    @foreach($sdg as $item)
                    <div class="col-md-2 mb-3">
                        <a href="{{ route('sustainable-development-goals.show', $item->id) }}" class="btn">
                            <img src="{{ asset('sdg/' . $item->logo) }}" alt="SDG {{ $item->id }}" class="img-fluid" style="width: 100%; height: auto;">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <div class="container">
                    <div class="card border-top-primary">
                        <div class="card-header bg-primary text-white"></div>
                        <div class="card-body">
                            <h6>Know more about the SDG's</h6>
                            <hr>
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <td>
                                        @foreach($sdg as $item)
                                        @if($item->pdf)
                                        <a href="{{ asset('sdg/' . $item->pdf) }}" target="_blank" class="nav-link text-dark">SDG {{ $item->id }} : {{ $item->title }}</a>
                                        @endif
                                        @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer bg-primary text-white"></div>
                    </div>
                </div>
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