<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Aviato E-Commerce Template">

    <meta name="author" content="Themefisher.com">

    <title>Airspace | Creative Agency Bootstrap template</title>

    <!-- Mobile Specific Meta-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png" />
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="/css/blog.css">

</head>

<body id="body">

<!-- Header Start -->
<header class="navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- header Nav Start -->
                <nav class="navbar">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="/">
                                <img src="/images/logo.png" alt="Logo">
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="/">Home</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Portfolio <span class="ion-ios-arrow-down"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/portfolio">Portfolio Filter</a></li>
                                        <li><a href="/portfolio-single">Portfolio Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="/service">Service</a></li>
                                <li class="dropdown">
                                    <a href="/blog-grid">Blog </a>
                                    <ul class="dropdown-menu">
                                        {{--<li><a href="/blog-grid">Blog Grid</a></li>--}}
                                        {{--<li><a href="/blog-single">Blog Single</a></li>--}}
                                        {{--<li><a href="/blog-right-sidebar">Blog Right Sidebar</a></li>--}}
                                        {{--<li><a href="/blog-left-sidebar">Blog Left Sidebar</a></li>--}}
                                        {{--<li><a href="/blog-full-width">Blog Full Width</a></li>--}}
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="ion-ios-arrow-down"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/about">About Us</a></li>
                                        <li><a href="/coming-soon">Coming Soon</a></li>
                                        <li><a href="/404">404 Page</a></li>
                                        <li><a href="/faq">FAQ</a></li>
                                        <li><a href="/pricing">Pricing Table</a></li>
                                    </ul>
                                </li>
                                <li><a href="/contact">Contact</a></li>
                                <li>@if(Auth::check())
                                    <li><a href="/profile">My profile</a></li>
                                    <li><a href="/logout">Logout</a></li>
                                @else
                                    <li><a href="/register">Register</a></li>
                                    <li><a href="/login">Login</a></li>
                                    @endif</li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>
    </div>
</header><!-- header close -->


    @yield('content')

<!-- footer Start -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer-manu">
                    <ul>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/contact">Contact us</a></li>
                        <li><a href="/">How it works</a></li>
                        <li><a href="/support">Support</a></li>
                        <li><a href="/">Terms</a></li>
                    </ul>
                </div>
                <p class="copyright">Copyright 2018 &copy; Design & Developed by <a href="http://www.themefisher.com">themefisher.com</a>. All rights reserved.
                    <br>
                    Get More <a href="https://themefisher.com/free-bootstrap-templates/" target="_blank">Free Bootstrap Templates</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!--
Essential Scripts
=====================================-->

<script src="http://code.jquery.com/jquery-git.min.js"></script>
<!-- Bootstrap 3.1 -->
<script src="/js/bootstrap/js/bootstrap.min.js"></script>
<!-- Owl Carousel -->
<script src="/js/slick-carousel/slick/slick.min.js"></script>
<!--  -->
<script src="/js/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<!-- Mixit Up JS -->
<script src="/js/mixitup/dist/mixitup.min.js"></script>
<!-- <script src="plugins/count-down/jquery.lwtCountdown-1.0.js"></script> -->
<script src="/js/SyoTimer/build/jquery.syotimer.min.js"></script>


<!-- Form Validator -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>



<!-- Google Map -->
<script src="/js/google-map/map.js"></script>
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>--}}

<script src="/js/script.js"></script>
{{--<script src="/js/blog.js"></script>--}}

</body>
</html>