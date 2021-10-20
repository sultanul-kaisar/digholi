@extends('frontend.layouts.app')
@section('title', 'What We Do')

@section('content')
    <!--Page Header-->
    <section id="main-banner-page" class="position-relative page-header service-header section-nav-smooth parallax">
        <div class="overlay overlay-dark opacity-7 z-index-1"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="page-titles whitecolor text-center padding_top padding_bottom">
                        <h2 class="font-xlight pt-3">We Help To</h2>
                        <h2 class="font-bold">Elevate Your Business</h2>
                        <h2 class="font-xlight">To Next Level</h2>
                    </div>
                </div>
            </div>
            <div class="title-wrap mt-n5" style="background-color: #6bbe46">
                <div class="row">
                    <div class="col-lg-12 col-md-12 whitecolor">
                        <h3 class="float-left">What We Do</h3>
                        <ul class="breadcrumb top10 bottom10 float-right">
                            <li class="breadcrumb-item hover-light"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item hover-light">What We Do</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header ends -->

    <!-- Mobile Apps -->
    <section id="our-apps" class="padding">
        <div class="container">
            <div class="row d-flex align-items-center" id="app-feature">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="text-center">
                        <div class="feature-item mt-3 wow fadeInLeft innovative-border arr-left" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInLeft;">
{{--                            <div class="icon"><i class="fas fa-video"></i></div>--}}
                            <div class="text">
                                <h4 class="bottom15" style="text-align: right">
                                    <span class="d-inline-block" style="color: #6bbe46">Documentary ☜</span>
                                </h4>
                                <h4 class="bottom15" style="text-align: right">
                                    <span class="d-inline-block" style="color: #6bbe46">OVC ☜</span>
                                </h4>
                                <h4 class="bottom15" style="text-align: right">
                                    <span class="d-inline-block" style="color: #6bbe46">PSA ☜</span>
                                </h4>
                                <h4 class="bottom15" style="text-align: right">
                                    <span class="d-inline-block" style="color: #6bbe46">Animation ☜</span>
                                </h4>
                                <h4 class="bottom15" style="text-align: right">
                                    <span class="d-inline-block" style="color: #6bbe46">Short Film ☜</span>
                                </h4>
                                <h4 class="bottom15" style="text-align: right">
                                    <span class="d-inline-block" style="color: #6bbe46">Motion Graphics ☜</span>
                                </h4>
                                <h4 class="bottom15" style="text-align: right">
                                    <span class="d-inline-block" style="color: #6bbe46">Photography ☜</span>
                                </h4>
                                <h4 class="bottom15" style="text-align: right">
                                    <span class="d-inline-block" style="color: #6bbe46">Event Coverage ☜</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="app-image top30">
                        <div class="app-slider"></div>
                        <div class="app-slider-lock">
{{--                            <img src="{{asset('assets/frontend/images/services.png')}}" alt="">--}}
                        </div>
                        <div id="app-slider" class="owl-carousel owl-theme owl-loaded owl-drag">



                            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-470px, 0px, 0px); transition: all 0s ease 0s; width: 1645px;"><div class="owl-item cloned" style="width: 235px;"><div class="item">
{{--                                            <img src="{{asset('assets/frontend/images/iphone-slide2.jpg')}}" alt="">--}}
                                        </div></div><div class="owl-item cloned" style="width: 235px;"><div class="item">
{{--                                            <img src="{{asset('assets/frontend/images/iphone-slide3.jpg')}}" alt="">--}}
                                        </div></div><div class="owl-item active" style="width: 235px;"><div class="item">
{{--                                            <img src="{{asset('assets/frontend/images/iphone-slide1.jpg')}}" alt="">--}}
                                        </div></div><div class="owl-item" style="width: 235px;"><div class="item">
{{--                                            <img src="{{asset('assets/frontend/images/iphone-slide2.jpg')}}" alt="">--}}
                                        </div></div><div class="owl-item" style="width: 235px;"><div class="item">
{{--                                            <img src="{{asset('assets/frontend/images/iphone-slide3.jpg')}}" alt="">--}}
                                        </div></div><div class="owl-item cloned" style="width: 235px;"><div class="item">
{{--                                            <img src="{{asset('assets/frontend/images/iphone-slide1.jpg')}}" alt="">--}}
                                        </div></div><div class="owl-item cloned" style="width: 235px;"><div class="item">
{{--                                            <img src="{{asset('assets/frontend/images/iphone-slide2.jpg')}}" alt="">--}}
                                        </div></div></div></div><div class="owl-nav disabled"></div><div class="owl-dots disabled"></div></div>
                        <img src="{{asset('assets/frontend/images/services.png')}}" height="400px" alt="image">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="text-center">
                        <div class="feature-item mt-3 wow fadeInRight innovative-border arr-right" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInRight;">
{{--                            <div class="icon"><i class="fas fa-camera"></i></div>--}}
                            <div class="text">
                                <h4 class="bottom15" style="text-align: left">
                                    <span class="d-inline-block" style="color: #6bbe46">☞ Brand Activation</span>
                                </h4>
                                <h4 class="bottom15" style="text-align: left">
                                    <span class="d-inline-block" style="color: #6bbe46">☞ Digital Marketing</span>
                                </h4>
                                <h4 class="bottom15" style="text-align: left">
                                    <span class="d-inline-block" style="color: #6bbe46">☞ Printing</span>
                                </h4>
                                <h4 class="bottom15" style="text-align: left">
                                    <span class="d-inline-block" style="color: #6bbe46">☞ Graphics Design</span>
                                </h4>
                                <h4 class="bottom15" style="text-align: left">
                                    <span class="d-inline-block" style="color: #6bbe46">☞ Creative Strategy</span>
                                </h4>
                                <h4 class="bottom15" style="text-align: left">
                                    <span class="d-inline-block" style="color: #6bbe46">☞ Voice Artist</span>
                                </h4>
                                <h4 class="bottom15" style="text-align: left">
                                    <span class="d-inline-block" style="color: #6bbe46">☞ Idea Development</span>
                                </h4>
                                <h4 class="bottom15" style="text-align: left">
                                    <span class="d-inline-block" style="color: #6bbe46">☞ Translation</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Mobile Apps ends-->
@endsection
