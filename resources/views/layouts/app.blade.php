<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RDE Portal - CSU Aparri</title>
    <link rel="shortcut icon" href="{{asset('images/csulogo.png')}}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Londrina+Solid:wght@100;300;400;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Include PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
        font-family: "Lexend", sans-serif;
        background-color: rgb(228, 237, 237);
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="border-bottom: 5px solid; border-image: linear-gradient(to right, red, gold) 1;">
            <div class="container">
                <a class="navbar-brand">
                    <b style="background: linear-gradient(to right, red, gold); -webkit-background-clip: text; color: transparent;">RDE PORTAL-CSU APARRI</b>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link">Dashboard</a>
                        </li>
                        @can('view rdektm profile')
                        <li class="nav-item">
                            <a href="{{ route('rdektm.index') }}" class="nav-link">RDE & KTM</a>
                        </li>
                        @endcan
                        @can('view research profile')   
                        <li class="nav-item">
                            <a href="{{ route('researchprofiling.index') }}" class="nav-link">Research Profiling</a>
                        </li>
                        @endcan
                        @can('view file tracking')
                        <li class="nav-item">
                            <a href="{{ route('filetracking.index') }}" class="nav-link">File Tracking</a>
                        </li>
                        @endcan
                    </ul>
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Welcome <b>{{ Auth::user()->name }}</b>!
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile">
                                        <i class="fas fa-user-circle"></i> {{ __('My Profile') }}
                                    </a>
                                    @can('view settings')
                                    <a class="dropdown-item" href="{{route('roles.index')}}">
                                        <i class="fas fa-tools"></i> {{ __('System Settings') }}
                                    </a>
                                    @endcan
                                    {{-- <a class="dropdown-item bg-danger text-white" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> --}}
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                    {{ __('Logout') }} <i class="fas fa-sign-out-alt"></i>
                                </a>
                            </li>

                            <!-- Logout Modal -->
                            <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="logoutModalLabel">{{ __('Confirm Logout') }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{ __('Are you sure you want to log out?') }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                            <button type="button" class="btn btn-danger" onclick="document.getElementById('logout-form').submit();">{{ __('Logout') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
