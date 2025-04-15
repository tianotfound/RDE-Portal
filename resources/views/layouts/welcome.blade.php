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
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

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
<body style="font-family: 'Montserrat', sans-serif;">
    <script>
        function disableCopy(e){
                return false
            }
            
            function reEnable(){
                return true
            }
            
            document.onselectstart=new Function ("return false")
            if (window.sidebar){
                document.onmousedown=disableCopy
                document.onclick=reEnable
            }
            
            window.onload = function() {
            document.addEventListener("contextmenu", function(e){
            e.preventDefault();
            }, false);
            document.addEventListener("keydown", function(e) {
            // "I" key
            if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                disabledEvent(e);
            }
            // "J" key
            if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                disabledEvent(e);
            }
            // "S" key + macOS
            if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                disabledEvent(e);
            }
            // "U" key
            if (e.ctrlKey && e.keyCode == 85) {
                disabledEvent(e);
            }
            // "U" key
            if (e.ctrlKey && e.keyCode == 67) {
                disabledEvent(e);
            }
            // "U" key
            if (e.ctrlKey && e.keyCode == 86) {
                disabledEvent(e);
            }
            // "U" key
            if (e.ctrlKey && e.keyCode == 117) {
                disabledEvent(e);
            }
            // "F12" key
            if (event.keyCode == 123) {
                disabledEvent(e);
            }
            }, false);
            function disabledEvent(e){
            if (e.stopPropagation){
                e.stopPropagation();
            } else if (window.event){
                window.event.cancelBubble = true;
            }
            e.preventDefault();
            return false;
            }
        };   
    </script>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background: linear-gradient(45deg, #00509d, #00296b);">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    RDE Portal - CSU Aparri
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
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
                            <a href="" class="nav-link">
                                Updates
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                Annoucements
                            </a>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user-alt"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('login')}}">
                                        {{ __('Login') }}
                                    </a>

                                    <a class="dropdown-item" href="{{route('register')}}">
                                        {{ __('Register') }}
                                    </a>            
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="col-md-12 bg-primary text-white">
            <marquee behavior="" scrollamount="10" scrolldelay="100" direction="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus officiis, ullam harum odit nihil ipsam vero optio reprehenderit tempore. Similique, praesentium. Omnis quos voluptatum enim voluptates. Tenetur temporibus distinctio minima?
            Cum velit vel esse repellendus nesciunt quibusdam ab error minus laborum! Ut corporis quidem beatae at dolor aut adipisci ipsa debitis neque tempore? Fugiat possimus ratione ipsa labore voluptates odio!
            Error minus labore nesciunt sint velit ab, necessita tibus quas inventore alias magnam atque delectus nulla saepe placeat voluptatem, recusandae dolore quos accusamus ipsum dolorum ratione ullam dignissimos. Harum, id deserunt!
            Voluptatem, doloribus sit adipisci vero provident cum ipsum maxime est repudiandae, esse incidunt dignissimos. Voluptatem, amet, commodi eos porro quibusdam animi modi eius accusamus explicabo molestiae molestias ut laudantium recusandae!
            Quaerat officia voluptas quibusdam, possimus ut dolor accusamus sequi pariatur saepe blanditiis fuga eos eius incidunt, similique temporibus iure molestias a nostrum nisi dolorem beatae quo! Dolores vitae non nulla?
            Adipisci nemo officia cum ipsa minus, id quod error similique aliquid deserunt? Fugiat, in assumenda! Aliquid ipsam qui mollitia tempore, similique soluta totam pariatur consequuntur. Quae, debitis veniam. Blanditiis, quibusdam.
            Eveniet ullam placeat, quibusdam sint vero exercitationem voluptates facilis numquam illum distinctio! Totam ratione quia a doloribus maiores! Sequi atque fugiat amet soluta saepe exercitationem quasi consequatur facilis quae hic?
            Nulla voluptatem ab asperiores magnam beatae, necessitatibus vitae, rem consequuntur enim perspiciatis omnis aut exercitationem in. Fugit nihil quae numquam. Temporibus facilis neque consectetur amet rem ipsa omnis quasi necessitatibus?
            Vel minus, eum dolorem deserunt in voluptatum veniam at enim quibusdam accusantium laboriosam dignissimos, perferendis aliquid velit quos maiores error assumenda nam aspernatur laborum. Ab voluptatibus explicabo doloribus labore rem.
            Numquam doloremque sequi delectus aliquid deserunt, odio eum dicta laboriosam alias tempore quidem et esse exercitationem facere in neque, expedita nisi! Repellendus ipsa ut ipsam veniam, natus deserunt tempora voluptatem.
            Libero deleniti quam neque? Nihil eveniet facere accusamus voluptatibus aliquid rerum provident magnam laudantium a deleniti accusantium neque delectus nostrum, necessitatibus molestias hic exercitationem fuga laborum? Esse illo a natus?
            Nam earum fuga consequuntur reiciendis aut debitis dolor quas odio! Laudantium doloremque odio nemo blanditiis nihil esse enim eum porro, cumque, natus, officia ab expedita veritatis temporibus accusantium voluptas quisquam!
            Voluptatibus, temporibus nulla, sit distinctio quod corrupti magni sint dolor perspiciatis vel assumenda iure numquam iusto sed atque dolores alias quibusdam mollitia dignissimos ab harum inventore. Atque inventore quaerat ab.
            Accusamus, nemo dignissimos illo modi porro odit nam perferendis, quam, veritatis doloremque nostrum magni dolorem incidunt sit optio molestiae eligendi commodi laborum. Vel, magni eius minus consectetur voluptatibus neque nesciunt?
            Earum modi praesentium numquam ratione quo architecto ab aliquam optio consequuntur cumque. Eligendi iure ea culpa dicta amet sint nemo cumque accusamus? Aut, cumque? Placeat saepe architecto expedita consequatur ullam?
            Et odit odio rerum accusamus labore esse beatae repellat delectus molestiae nihil, inventore iure tenetur necessitatibus laborum, reiciendis quam ex. At adipisci iure minima deserunt eligendi, voluptatibus itaque quo nobis.
            Laborum maiores voluptas aut esse nostrum aperiam adipisci, incidunt facilis quos in, quisquam, cupiditate architecto officia fugiat fuga delectus expedita. Optio ex distinctio dolores, culpa vero libero praesentium inventore quasi.
            Iste tempore consequuntur sequi ratione, amet et magni. Unde voluptate provident impedit architecto mollitia saepe quas, explicabo, id consequatur ipsa quos earum! Deleniti optio ipsam atque ullam accusantium voluptas ducimus.
            Possimus enim officiis nam cumque fugit aliquam, quam quo mollitia omnis earum obcaecati deleniti ipsa in! Officia quisquam autem quo distinctio quidem molestiae porro, possimus soluta eaque deserunt, fuga dolor.
            Ad consectetur alias debitis dignissimos veniam nesciunt aperiam dolorum deleniti similique ea, quas nemo ipsa beatae error, voluptate sed nulla consequuntur suscipit minima dolorem veritatis. Nesciunt aspernatur excepturi deserunt eveniet.</marquee>  
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
                        <li><a href="#" target="blank" class="text-white" style="text-decoration: none;">SDG Aparri Portal</a></li>
                        <li><a href="#" target="blank" class="text-white" style="text-decoration: none;">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-3">
                    <h5>Contact Us</h5>
                    <ul style="list-style-type: none; padding-left: 0;">
                        <li><a href="https://www.facebook.com/csuardektm" target="blank" style="text-decoration: none;" class="text-white me-2"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="#" target="blank" style="text-decoration: none;" class="text-white me-2"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#" target="blank" style="text-decoration: none;" class="text-white"><i class="fab fa-instagram"></i> Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center py-3">
            <p>&copy; 2024 RDE Portal - CSU Aparri. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
