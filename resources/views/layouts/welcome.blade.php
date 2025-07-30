<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RDE Portal - CSU Aparri</title>
    <link rel="icon" href="{{ asset('images/csulogo.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Londrina+Solid:wght@100;300;400;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        #app {
            flex: 1;    
        }

        @media (max-width: 768px) { /* Adjust the max-width as needed */
        .responsive-hide {
            display: none;
        }
        }

        @media (max-width: 768px) { /* Adjust the max-width as needed */
        .carousel {
            display: none;
        }
        }

        .carousel-inner img {
            width: 100%;
            height: auto;
        }

        .thumbnail {
            display: inline-block; /* Allow thumbnails to sit next to each other */
            width: 200px; /* Set a fixed width for thumbnails */
            height: auto; /* Maintain aspect ratio */
            margin: 0 5px; /* Add some margin between thumbnails */
            cursor: pointer; /* Change cursor on hover */
        }

        .thumbnail.active {
            border: 2px solid #007bff; /* Highlight active thumbnail */
        }

        .color-hover {
            filter: grayscale(200%);
            opacity: 0.5;
            transition: filter 0.5s ease;
        }

        .color-hover:hover {
            filter: grayscale(0%);
            opacity: 1;
            cursor: pointer;
        }
        .nav-link{
            color: white;
        }
        .nav-link:hover {
            color: rgb(255, 255, 0); /* Change text color to yellow */
            font-weight: bold; /* Make text bold */
        }
    </style>
</head>
<body style="font-family: 'Lexend', sans-serif;">
    <script>
        function disableCopy(e) {
            return false;
        }

        function reEnable() {
            return true;
        }

        document.onselectstart = new Function("return false");
        if (window.sidebar) {
            document.onmousedown = disableCopy;
            document.onclick = reEnable;
        }

        window.onload = function() {
            document.addEventListener("contextmenu", function(e) {
                e.preventDefault();
            }, false);

            document.addEventListener("keydown", function(e) {
                const forbiddenKeys = [
                    { ctrl: true, shift: true, keyCode: 73 }, // Ctrl+Shift+I
                    { ctrl: true, shift: true, keyCode: 74 }, // Ctrl+Shift+J
                    { ctrl: true, keyCode: 85 },             // Ctrl+U
                    { ctrl: true, keyCode: 67 },             // Ctrl+C
                    { ctrl: true, keyCode: 86 },             // Ctrl+V
                    { ctrl: true, keyCode: 83 },             // Ctrl+S
                    { keyCode: 123 }                         // F12
                ];

                for (const key of forbiddenKeys) {
                    if (
                        (key.ctrl === undefined || e.ctrlKey === key.ctrl) &&
                        (key.shift === undefined || e.shiftKey === key.shift) &&
                        e.keyCode === key.keyCode
                    ) {
                        disabledEvent(e);
                        break;
                    }
                }
            }, false);

            function disabledEvent(e) {
                if (e.stopPropagation) {
                    e.stopPropagation();
                } else if (window.event) {
                    window.event.cancelBubble = true;
                }
                e.preventDefault();
                return false;
            }
        };
    </script>
    <div id="app">
        <nav class="navbar sticky-top navbar-expand-md navbar-light shadow-sm" style="background: linear-gradient(45deg, #00509d, #00296b);">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    RDE Portal - CSU Aparri
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span><i class="fas fa-bars" style="color: white;"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('researchall.index') }}" class="nav-link">
                                Research
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ktmall.index') }}" class="nav-link">
                                KTM
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('extensionall.index') }}" class="nav-link">
                                Extension
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ route('updateall.index') }}" class="nav-link">
                                Updates
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('announcementall.index') }}" class="nav-link">
                                Annoucements
                            </a>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user-alt"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('login')}}" onclick="promptPinCode(event)">
                                        {{ __('Login') }}
                                    </a>

                                    <script>
                                        function promptPinCode(event) {
                                            event.preventDefault();
                                            const pin = prompt("Please enter PIN code:");
                                            if (pin === "RDE@2025") {
                                                window.location.href = event.target.href;
                                            } else {
                                                alert("Invalid PIN code.");
                                            }
                                        }
                                    </script>

                                    <a class="dropdown-item" href="{{route('register')}}">
                                        {{ __('Register') }}
                                    </a>            
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="col-md-12 bg-primary d-flex text-white">
            <marquee behavior="" scrollamount="10" scrolldelay="100" direction="">WELCOME TO RDE CONNECT</marquee>  
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer class="text-white pt-5" style="background: linear-gradient(45deg, #00509d, #00296b);">
        <div class="container">
            <div class="row">
                <div class="col-md-2 mb-3 text-center">
                    <img src="{{ asset('images/csulogo.png') }}" alt="" class="color-hover" style="max-height: auto; max-width: 150px;">
                </div>
                <div class="col-md-6 mb-3">
                    <h5>About Us</h5>
                    <p id="summary">Aparri, located in the northern part of Cagayan where the Cagayan River meets the Babuyan Channel,...</p>
                    <p id="fullText" style="display:none;">Aparri, located in the northern part of Cagayan where the Cagayan River meets the Babuyan Channel, is home to the Cagayan State University – Aparri Campus, which spans 42.2116 hectares in Barangay Maura, two kilometers east of the town center. Originally established as a Secondary School of Fisheries under the Philippine Fisheries Commission in 1952, it was supported by an appropriation of P50,000 from Republic Act 685. In 2017, seven undergraduate programs at the campus received Level I accreditation from the Accrediting Agency of Chartered Colleges and Universities of the Philippines, including degrees in fields like Accounting Technology and Criminology. By 2019, the Bachelor of Science in Fisheries earned Level III-Phase A accreditation, alongside various graduate programs that also received Level I accreditation. The campus has experienced significant growth, attributed to a zero tuition policy and substantial infrastructure improvements.</p>
                    <button id="toggleButton" class="btn btn-primary btn-sm" onclick="toggleText()">Continue Reading</button>
                
                    <script>
                    function toggleText() {
                        const fullText = document.getElementById('fullText');
                        const summary = document.getElementById('summary');
                        const toggleButton = document.getElementById('toggleButton');
                        
                        if (fullText.style.display === 'none') {
                            fullText.style.display = 'block';
                            summary.style.display = 'none';
                            toggleButton.textContent = 'Close'; // Change text to "Close"
                        } else {
                            fullText.style.display = 'none';
                            summary.style.display = 'block';
                            toggleButton.textContent = 'Continue Reading'; // Change text back to "Continue Reading"
                        }
                    }
                    </script>
                </div>
                
                <div class="col-md-2 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="https://aparri.csu.edu.ph/" target="blank" class="text-white" style="text-decoration: none;">Cagayan State University</a></li>
                        <li><a href="https://csuaparri.net/" target="blank" class="text-white" style="text-decoration: none;">CSU Aparri</a></li>
                        <li><a href="{{ route('sustainable-development-goals.index') }}" target="blank" class="text-white" style="text-decoration: none;">SDG's</a></li>
                        <li><a href="{{ route('campus-journals.index') }}" target="blank" class="text-white" style="text-decoration: none;">Journals</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-3">
                    <h5>Contact Us</h5>
                    <ul style="list-style-type: none; padding-left: 0;">
                        <li><a href="https://www.facebook.com/csuardektm" target="_blank" style="text-decoration: none;" class="text-white me-2"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="{{ route('contact-us.index') }}" target="_blank" style="text-decoration: none;" class="text-white me-2"><i class="fas fa-globe"></i> Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container py-3">
            <p style="font-size: 12px;">&copy; {{ date('Y') }} RDE Portal - CSU Aparri. All rights reserved.

                @php
                    $visitCount = cache()->increment('visit_count', 1);
                @endphp
                <span class="float-end" style="font-size: 12px;">
                    Visitor Counter: {{ number_format($visitCount) }}
                </span>

            </p>
        </div>
    </footer>
</body>
</html>
