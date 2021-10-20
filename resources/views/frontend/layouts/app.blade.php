<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> @yield('title') </title>
    <link href="{{asset('public/assets/frontend/images/favicon.ico')}}" rel="icon">
    <link rel="stylesheet" href="{{asset('public/assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/frontend/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/frontend/css/tooltipster.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/frontend/css/cubeportfolio.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/frontend/css/revolution/navigation.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/frontend/css/revolution/settings.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/frontend/css/custom.css')}}">

    @stack('css')
</head>
<body>
<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="cssload-loader"></div>
    </div>
</div>
<!--PreLoader Ends-->
<!-- header -->
<header class="site-header" id="header" >

                @include('frontend.layouts.ini.navbar')

    <!-- End side menu -->
</header>
<!-- header -->
<!--Main Slider-->
@yield('content')

<!--Site Footer Here-->
<footer id="site-footer" class=" padding_top" style="background-color: #ade1cd">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="footer_panel padding_bottom_half bottom20">
                    <a href="{{route('index')}}" class="footer_logo bottom25"><img src="{{asset('public/assets/frontend/images/logo-final.png')}}" alt="MegaOne"></a>
                    <p class="whitecolor bottom25">Keep away from people who try to belittle your ambitions Small people always do that but the really great Friendly.</p>
                    <div class="d-table w-100 address-item whitecolor bottom25">
                        <span class="d-table-cell align-middle"><i class="fas fa-mobile-alt"></i></span>
                        <p class="d-table-cell align-middle bottom0">
                            +8801316-328389 <a class="d-block" href="mailto:contact@digholicollectives.com">contact@digholicollectives.com</a>
                        </p>
                    </div>

                </div>
            </div>
{{--            <div class="col-lg-3 col-md-6 col-sm-6">--}}
{{--                <div class="footer_panel padding_bottom_half bottom20">--}}
{{--                    <h3 class="whitecolor bottom25">Latest News</h3>--}}
{{--                    <ul class="latest_news whitecolor">--}}
{{--                        <li> <a href="#.">Aenean tristique justo et... </a> <span class="date defaultcolor">15 March 2019</span> </li>--}}
{{--                        <li> <a href="#.">Phasellus dapibus dictum augue... </a> <span class="date defaultcolor">15 March 2019</span> </li>--}}
{{--                        <li> <a href="#.">Mauris blandit vitae. Praesent non... </a> <span class="date defaultcolor">15 March 2019</span> </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-md-6 col-sm-6">--}}
{{--                <div class="footer_panel padding_bottom_half bottom20 pl-0 pl-lg-5">--}}
{{--                    <h3 class="whitecolor bottom25">Our Services</h3>--}}
{{--                    <ul class="links">--}}
{{--                        <li><a href="index.html">Home</a></li>--}}
{{--                        <li><a href="about.html">About Us</a></li>--}}
{{--                        <li><a href="blog-1.html">Latest News</a></li>--}}
{{--                        <li><a href="pricing.html">Business Planning</a></li>--}}
{{--                        <li><a href="contact.html">Contact Us</a></li>--}}
{{--                        <li><a href="faq.html">Faq's</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="footer_panel padding_bottom_half bottom20">
                    <h3 class="whitecolor bottom25">About Digholi Collectives</h3>
                    <p class="whitecolor bottom25">Digholi Collectives is a team, it’s more than a company! We do Creative Communications. Digholi Collectives is an end-to-end creative video production company; working with passion- done with Love.</p>
                    <ul class="social-icons white wow fadeInUp" data-wow-delay="300ms">
                        <li><a href="https://www.facebook.com/Digholi-Collectives-415457459038280" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i> </a> </li>
                        <li><a href="javascript:void(0)" class="twitter"><i class="fab fa-twitter"></i> </a> </li>
                        <li><a href="javascript:void(0)" class="linkedin"><i class="fab fa-linkedin-in"></i> </a> </li>
                        <li><a href="javascript:void(0)" class="insta"><i class="fab fa-instagram"></i> </a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Footer ends-->
<!--copyright-->
<div class="copyright" style="background-color: #6bbe46">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center wow fadeIn animated" data-wow-delay="300ms" style="color: white">
                <p class="m-0 py-1">Copyright &copy;{{ date('Y') }} <a href="" class="hover-default"> Digholi</a>. All Rights Reserved.</p>
                Designed by <a href="https://sultanulkaisar.me/" target="_blank">Md Sultanul Kaisar</a>
            </div>
        </div>
    </div>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('public/assets/frontend/js/jquery-3.4.1.min.js')}}"></script>
<!--Bootstrap Core-->
<script src="{{asset('public/assets/frontend/js/propper.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/js/bootstrap.min.js')}}"></script>
<!--to view items on reach-->
<script src="{{asset('public/assets/frontend/js/jquery.appear.js')}}"></script>
<!--Owl Slider-->
<script src="{{asset('public/assets/frontend/js/owl.carousel.min.js')}}"></script>
<!--number counters-->
<script src="{{asset('public/assets/frontend/js/jquery-countTo.js')}}"></script>
<!--Parallax Background-->
<script src="{{asset('public/assets/frontend/js/parallaxie.js')}}"></script>
<!--Cubefolio Gallery-->
<script src="{{asset('public/assets/frontend/js/jquery.cubeportfolio.min.js')}}"></script>
<!--Fancybox js-->
<script src="{{asset('public/assets/frontend/js/jquery.fancybox.min.js')}}"></script>
<!--tooltip js-->
<script src="{{asset('public/assets/frontend/js/tooltipster.min.js')}}"></script>
<!--wow js-->
<script src="{{asset('public/assets/frontend/js/wow.js')}}"></script>
<!--Revolution SLider-->
<script src="{{asset('public/assets/frontend/js/revolution/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/js/revolution/jquery.themepunch.revolution.min.js')}}"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
<script src="{{asset('public/assets/frontend/js/revolution/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/js/revolution/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/js/revolution/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/js/revolution/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/js/revolution/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/js/revolution/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/js/revolution/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('public/assets/frontend/js/revolution/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/revolution/extensions/revolution.extension.video.min.js')}}"></script>
<!--custom functions and script-->
<script src="{{asset('public/assets/frontend/js/functions.js')}}"></script>
@stack('js')
</body>
</html>
