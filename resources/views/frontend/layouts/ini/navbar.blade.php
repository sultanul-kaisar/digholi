</div>
<nav class="navbar navbar-expand-lg static-nav mt-sm-4 mt-2 transparent-bg" >
    <div class="container border-radius-50 position-relative gradient-bg" >
        <a class="navbar-brand ml-4" href="{{route('index')}}">
            <img src="{{asset('public/assets/frontend/images/logo-final.png')}}" alt="logo" class="logo-default ml-4">
            <img src="{{asset('public/assets/frontend/images/logo-final.png')}}" alt="logo" class="logo-scrolled ml-4">
        </a>
        <div class="collapse navbar-collapse font-bold whitecolor">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" class="{{ (request()->is('home')) ? 'active' : '' }}" href="{{route('home')}}" >Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" class="{{ (request()->is('about')) ? 'active' : '' }}" href="{{route('about')}}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" class="{{ (request()->is('team')) ? 'active' : '' }}" href="{{route('team')}}">Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" class="{{ (request()->is('service')) ? 'active' : '' }}" href="{{route('service')}}">What We Do</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" class="{{ (request()->is('portfolio')) ? 'active' : '' }}" href="{{route('portfolio')}}">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" class="{{ (request()->is('gallery')) ? 'active' : '' }}" href="{{route('gallery')}}">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" class="{{ (request()->is('blog')) ? 'active' : '' }}" href="{{route('blog')}}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" class="{{ (request()->is('contact')) ? 'active' : '' }}" href="{{route('contact')}}">Get In Touch</a>
                </li>
            </ul>
        </div>
{{--        <ul class="social-icons social-icons-simple d-lg-inline-block d-none animated fadeInUp" data-wow-delay="300ms">--}}
{{--            <li><a href="#."><i class="fab fa-facebook-f"></i> </a> </li>--}}
{{--            <li><a href="#."><i class="fab fa-twitter"></i> </a> </li>--}}
{{--            <li><a href="#."><i class="fab fa-linkedin-in"></i> </a> </li>--}}
{{--        </ul>--}}
    </div>
    <!--side menu open button-->
    <a href="javascript:void(0)" class="d-inline-block sidemenu_btn" id="sidemenu_toggle">
        <span class="gradient-bg"></span> <span class="gradient-bg"></span> <span class="gradient-bg"></span>
    </a>
</nav>
<!-- side menu -->
<div class="side-menu opacity-0 gradient-bg">
    <div class="overlay"></div>
        <div class="inner-wrapper">
            <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
            <nav class="side-nav w-100">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" class="{{ (request()->is('home')) ? 'active' : '' }}" href="{{route('home')}}" >Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" class="{{ (request()->is('about')) ? 'active' : '' }}" href="{{route('about')}}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" class="{{ (request()->is('team')) ? 'active' : '' }}" href="{{route('team')}}">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" class="{{ (request()->is('service')) ? 'active' : '' }}" href="{{route('service')}}">What We Do</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" class="{{ (request()->is('portfolio')) ? 'active' : '' }}" href="{{route('portfolio')}}">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" class="{{ (request()->is('gallery')) ? 'active' : '' }}" href="{{route('gallery')}}">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" class="{{ (request()->is('blog')) ? 'active' : '' }}" href="{{route('blog')}}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" class="{{ (request()->is('contact')) ? 'active' : '' }}" href="{{route('contact')}}">Get In Touch</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
<div id="close_side_menu" class="tooltip"></div>
<!-- End side menu -->
