<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/css/home.css">
    <style>
        /* CSS for spinner */
        .spinner {
            display: none;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            width: 100%;
            height: 100vh;
            position: fixed;
            inset: 0;
            z-index: 9999;
            overflow: hidden
        }

        .spinner i {
            color: #fff;
            display: flex;
            align-items: center;
            font-size: 40px;
            justify-content: center;
            min-height: 100vh;
        }
    </style>
    <title>Document</title>
</head>

<body>
    {{-- Social Media Integration --}}
    <div class="soc">
        <nav class="social_nav">
            <div class="mobile_left">
                <div class="mobile_con">
                    <div class="mobile_connector">
                        <div class="mobile_icon">
                            <i class="fa-solid fa-phone fa-beat"></i>
                        </div>
                        <h3 class="mobile_txt"> (520) 577 2710</h3>
                    </div>
                    <div class="mobile_connector">
                        <div class="mobile_icon">
                            <i class="fa-solid fa-envelope fa-beat"></i>
                        </div>
                        <h3 class="mobile_txt"> carservice@mail.com</h3>
                    </div>
                    <div class="mobile_connector">
                        <div class="mobile_icon">
                            <i class="fa-regular fa-clock fa-spin"></i>
                        </div>
                        <h3 class="mobile_txt"> Mon - Fri: 7:30am - 5:30pm</h3>
                    </div>
                </div>
            </div>
            <div class="mobile_left">
                <div class="mobile_social">
                    <div class="social_links">
                        <i class="fa-brands fa-facebook"></i>

                    </div>
                    <div class="social_links">
                        <i class="fa-brands fa-square-x-twitter"></i>

                    </div>
                    <div class="social_links">
                        <i class="fa-brands fa-youtube"></i>

                    </div>
                    <div class="social_links">
                        <i class="fa-brands fa-pinterest"></i>

                    </div>
                </div>
            </div>
        </nav>

        <nav class="web_nav">
            <!-- Your navigation bar -->
            <div class="nav_right">
                <div class="nav_logo animate__animated animate__fadeInLeftBig">
                    <a class="linka" href="/">
                        <img src="/img/Logotype.png" alt="">
                    </a>
                </div>
            </div>
            <div class="nav_right animate__animated animate__fadeInRightBig">
                <ul class="nav_ul">
                    <li class="nav_li"> <a class="linka" href="/service">services</a></li>
                    <li class="nav_li"> <a class="linka" href="/gallery">gallery</a></li>
                    <li class="nav_li">
                        <a class="linka" href="/about-us">About</a>
                    </li>
                    <li class="nav_li">
                        <a class="linka" href="/contact-us">Contact us</a>
                    </li>  
                    @auth
                    <li class="nav_li"><a class="linka" href="/book-an-appointment">Appointment</a></li>
                    <li class="nav_li">
                        <span class="username" onclick="togglePopup()"> <!-- Added onclick event -->
                            {{ Auth::user()->name }} <i class="fa-solid fa-caret-down"></i>
                        </span>
                        <!-- Popup content -->
                        <div class="popuper" id="popup">
                            <a class="muy" href="/user-appointments">My Appointments</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="muyt" type="submit">Logout</button>
                            </form>
                        </div>
                    </li>
                    @else
                    <li class="nav_li"><a class="linka" href="/login">Log In</a></li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>

    <!-- Spinner -->
    <div class="spinner">
        <i class="fas fa-spinner fa-spin"></i>
    </div>

    <!-- JavaScript for showing spinner and delaying navigation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all links with class "linka"
            var links = document.querySelectorAll('.linka');

            // Attach click event listener to each link
            links.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    // Prevent default link behavior
                    event.preventDefault();

                    // Show the spinner
                    document.querySelector('.spinner').style.display = 'block';

                    // Get the href attribute of the clicked link
                    var href = link.getAttribute('href');

                    // Delay navigation by 2 seconds
                    setTimeout(function() {
                        window.location.href = href;
                    }, 1500); // 2 seconds delay
                });
            });
        });
    </script>
    <script>
        function togglePopup() {
            var popup = document.getElementById("popup");
            popup.classList.toggle("show");
        }
    
        // Close the popup if the user clicks outside of it
        window.onclick = function(event) {
            var popup = document.getElementById("popup");
            if (!event.target.matches('.username')) {
                if (popup.classList.contains('show')) {
                    popup.classList.remove('show');
                }
            }
        }
    </script>
</body>

</html>
