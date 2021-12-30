@extends('frontend.layouts.app')
{{-- Website SEO --}}
@section('title', isset($seo->site_title) ? $seo->site_title : '')
@section('seo_description', isset($seo->site_description) ? $seo->site_description : '')
@section('seo_author', isset($seo->site_author) ? $seo->site_author : '')
@section('seo_copyright', isset($seo->site_author) ? $seo->site_author : '')
@section('seo_keywords', isset($seo->site_keywords) ? $seo->site_keywords : '')
@section('seo_robots', isset($seo->site_robots) ? $seo->site_robots : '')

{{-- Facebook SEO --}}
@section('og_title', isset($seo->site_title) ? $seo->site_title : '')
@section('og_description', isset($seo->site_description) ? $seo->site_description : '')
@section('og_type', isset($seo->site_type) ? $seo->site_type : '')
@section('og_url', isset($seo->site_url) ? $seo->site_url : '')
@section('og_image', isset($seo->site_image) ? url("storage/uploads/seo/".$seo->site_image) : '')
@section('og_image_width', isset($seo->site_image_width) ? $seo->site_image_width : '')
@section('og_image_height', isset($seo->site_image_height) ? $seo->site_image_height : '')
@section('fb_app_id', isset($seo->site_app_id) ? $seo->site_app_id : '')

{{-- Twitter SEO --}}
@section('twitter_card', isset($seo->site_card) ? $seo->site_card : '')
@section('twitter_site', isset($seo->site_creator) ? $seo->site_creator : '')
@section('twitter_creator', isset($seo->site_creator) ? $seo->site_creator : '')
@section('twitter_url', isset($seo->site_url) ? $seo->site_url : '')
@section('twitter_title', isset($seo->site_title) ? $seo->site_title : '')
@section('twitter_description', isset($seo->site_description) ? $seo->site_description : '')
@section('twitter_image', isset($seo->site_image) ? url("public/storage/uploads/seo/".$seo->site_image) : '')
@section('title', 'About Us')

@section('content')
    <!-- ======= Contact Section ======= -->
    <!--Page Header-->
    <section id="main-banner-page" class="position-relative page-header about-header parallax section-nav-smooth">
        <div class="overlay overlay-dark opacity-7"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="page-titles whitecolor text-center padding_top padding_bottom">
                        <h2 class="font-xlight">A New Idea</h2>
                        <h2 class="font-bold">Inspires Us To Make</h2>
                        <h2 class="font-xlight">Great Works</h2>
                    </div>
                </div>
            </div>
            <div class="title-wrap" style="background-color: #6bbe46">
                <div class="row">
                    <div class="col-lg-12 col-md-12 whitecolor">
                        <h3 class="float-left">About Us</h3>
                        <ul class="breadcrumb top10 bottom10 float-right">
                            <li class="breadcrumb-item hover-light"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item hover-light">About</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header ends -->
    <!-- About us -->
    <section id="aboutus" class="padding_top padding_bottom">
        <div class="container aboutus">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 padding_bottom_half">
                    <div class="image"><img alt="SEO" src="{{asset('public/assets/frontend/images/aboutus.png')}}"></div>
                </div>
                <div class="col-lg-7 offset-lg-1 col-md-5 padding_bottom_half text-center text-md-left" >
                    <p class="bottom35" style="text-align: justify">People connect better with stories than they do with a list of facts. If you want people to actually remember the information from your company profile, take the <strong>Digholi Collectives</strong>  approach and tell a story about your brand.</p>
                    <p style="text-align: justify"><strong>Digholi Collectives</strong> is a team, it’s more than a company! We do Creative Communications. <strong>Digholi Collectives</strong> is an end-to-end creative video production company; working with passion- done with Love. We develop concept, shape the idea through storyboarding, filming, editing and post- production to delivery with a digital marketing support package. </p>
                </div>
            </div>
            <div class="row  align-items-center">
                <div class="col-lg-7 offset-lg-1 col-md-5 padding_bottom_half text-center text-md-left" >
                    <p class="bottom35" style="text-align: justify">There are many companies with a similar brief to <strong>Digholi Collectives</strong>  but our high impact, creative and comprehensive approach to our work make us unique and dependable. We believe video should deliver results. Our approach combines expertise & passion with a deep understanding of you and your audiences to make videos that engage inspire and compel people to act. We create dynamic motion pictures for some of the world’s most admired brands. </p>
                    <p style="text-align: justify">Our all-star team of writers, directors, producers, Production controller and cinematographers handles projects of nearly every scale and genre, from single-camera studio interviews to multi- camera, multi-crew commercial shoots, Documentary or TV Factual, in multiple locations around the Country. </p>
                </div>
                <div class="col-lg-4 col-md-6 padding_bottom_half">
                    <div class="image"><img alt="SEO" src="{{asset('public/assets/frontend/images/aboutus2.png')}}"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- About us ends -->
    <!-- WOrk Process-->
    <section id="our-process" class="padding" style="background-color: #f9f6ef">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center heading_space wow fadeIn" data-wow-delay="300ms">
                    <h2 class="heading bottom30 darkcolor font-light2">Why <span class="font-normal">We</span>
                        <span class="divider-center"></span>
                    </h2>
                </div>
            </div>
            <div class="row">
                <ul class="process-wrapp">
                    <li class="whitecolor wow fadeIn" data-wow-delay="100ms">
                        <span class="pro-step bottom20">01</span>
                        <p class="fontbold bottom25"><strong>Listening</strong> is our first quality.</p>
                    </li>
                    <li class="whitecolor wow fadeIn" data-wow-delay="150ms">
                        <span class="pro-step bottom20">02</span>
                        <p class="fontbold bottom25">Our team is <strong>Young</strong> with diverged <strong>Experiences</strong>.</p>
                    </li>
                    <li class="whitecolor wow fadeIn" data-wow-delay="150ms">
                        <span class="pro-step bottom20">03</span>
                        <p class="fontbold bottom25">Creative, always find <strong>UNOQUE</strong> perspectives.</p>
                    </li>
                    <li class="whitecolor wow fadeIn" data-wow-delay="150ms">
                        <span class="pro-step bottom20">04</span>
                        <p class="fontbold bottom25">We understand <strong>“Value for Money”</strong> .</p>
                    </li>
                    <li class="whitecolor wow fadeIn" data-wow-delay="150ms">
                        <span class="pro-step bottom20">05</span>
                        <p class="fontbold bottom25">Take risk for <strong>Best Output</strong>.</p>
                    </li>
                    <li class="whitecolor wow fadeIn" data-wow-delay="150ms">
                        <span class="pro-step bottom10">06</span>
                        <p class="fontbold bottom30">We are punctual.</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--WOrk Process ends-->
    <!--Testimonial-->
    <section id="testinomila_page" class="padding" style="background-color: #eaeaea">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center heading_space wow fadeIn" data-wow-delay="300ms">
                    <h2 class="heading bottom30 darkcolor font-light2">Testimonials
                        <span class="divider-center"></span>
                    </h2>
                </div>
            </div>
            <div id="testimonial-grid" class="cbp mt-n3">
                <!--item 1-->
                @if(!$testimonials->count())
                    <div class="cbp-item wow fadeIn" data-wow-delay="350ms">
                        <div class="testimonial-wrapp">
                            <span class="quoted"><i class="fa fa-quote-right"></i></span>
                            <div class="testimonial-text">
                                <p class="bottom40">Donec semper euismod nisi quis feugiat. Nullam finibus metus eget orci volutpat porta. Morbi quis arcu vulputate, dignissim mi ac, varius magna.</p>
                            </div>
                            <div class="testimonial-photo"><img alt="" src="{{asset('public/assets/frontend/images/testimonial-1.jpg')}}"></div>
                            <h4 class="darkcolor"><a href="#.">David Raleway</a></h4>
                            <span class="defaultcolor font-11">Businessman</span>
                        </div>
                    </div>
                    <!--item 2-->
                    <div class="cbp-item wow fadeIn" data-wow-delay="400ms">
                        <div class="testimonial-wrapp">
                            <span class="quoted"><i class="fa fa-quote-right"></i></span>
                            <div class="testimonial-text">
                                <p class="bottom40">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
                            </div>
                            <div class="testimonial-photo"><img alt="" src="{{asset('public/assets/frontend/images/testimonial-2.jpg')}}"></div>
                            <h4 class="darkcolor"><a href="#.">Jaden Loren</a></h4>
                            <span class="defaultcolor font-11">Businesswoman</span>
                        </div>
                    </div>
                    <!--item 3-->
                    <div class="cbp-item wow fadeIn" data-wow-delay="450ms">
                        <div class="testimonial-wrapp">
                            <span class="quoted"><i class="fa fa-quote-right"></i></span>
                            <div class="testimonial-text">
                                <p class="bottom40">Lorem Ipsum is simply dummy text of the best printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                            </div>
                            <div class="testimonial-photo"><img alt="" src="{{asset('public/assets/frontend/images/testimonial-3.jpg')}}"></div>
                            <h4 class="darkcolor"><a href="#.">Kevin Johnson</a></h4>
                            <span class="defaultcolor font-11">Businessman</span>
                        </div>
                    </div>
                    <!--item 4-->
                    <div class="cbp-item wow fadeIn" data-wow-delay="500ms">
                        <div class="testimonial-wrapp">
                            <span class="quoted"><i class="fa fa-quote-right"></i></span>
                            <div class="testimonial-text">
                                <p class="bottom40">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
                            </div>
                            <div class="testimonial-photo"><img alt="" src="{{asset('public/assets/frontend/images/testimonial-4.jpg')}}"></div>
                            <h4 class="darkcolor"><a href="#.">Ava Smith</a></h4>
                            <span class="defaultcolor font-11">Businesswoman</span>
                        </div>
                    </div>
                    <!--item 5-->
                    <div class="cbp-item wow fadeIn" data-wow-delay="550ms">
                        <div class="testimonial-wrapp">
                            <span class="quoted"><i class="fa fa-quote-right"></i></span>
                            <div class="testimonial-text">
                                <p class="bottom40">Donec semper euismod nisi quis feugiat. Nullam finibus metus eget orci volutpat porta. Morbi quis arcu vulputate, dignissim mi ac, varius magna.</p>
                            </div>
                            <div class="testimonial-photo"><img alt="" src="{{asset('public/assets/frontend/images/testimonial-5.jpg')}}"></div>
                            <h4 class="darkcolor"><a href="#.">Mia Lan</a></h4>
                            <span class="defaultcolor font-11">Businesswoman</span>
                        </div>
                    </div>
                    <!--item 6-->
                    <div class="cbp-item wow fadeIn" data-wow-delay="600ms">
                        <div class="testimonial-wrapp">
                            <span class="quoted"><i class="fa fa-quote-right"></i></span>
                            <div class="testimonial-text">
                                <p class="bottom40">Donec semper euismod nisi quis feugiat. Nullam finibus metus eget orci volutpat porta. Morbi quis arcu vulputate, dignissim mi ac, varius magna.</p>
                            </div>
                            <div class="testimonial-photo"><img alt="" src="{{asset('public/assets/frontend/images/testimonial-6.jpg')}}"></div>
                            <h4 class="darkcolor"><a href="#.">Cris Jones</a></h4>
                            <span class="defaultcolor font-11">Businessman</span>
                        </div>
                        </div>
                    </div>
                @else
                    @foreach($testimonials as $testimonial)
                        <div class="cbp-item wow fadeIn" data-wow-delay="350ms">
                            <div class="testimonial-wrapp">
                                <span class="quoted"><i class="fa fa-quote-right"></i></span>
                                <div class="testimonial-text">
                                    <p class="bottom40">{{ $testimonial->description }}</p>
                                </div>
                                <div class="testimonial-photo"><img alt="" src="{{ asset('public/storage/uploads/testimonials/'.$testimonial->image) }}"></div>
                                <h4 class="darkcolor"><a href="#.">{{ $testimonial->title }}</a></h4>
                                <span class="defaultcolor font-11">{{ $testimonial->designation }}</span>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>
    <!--Testimonial ends-->
    <!-- Partners-->
    <section id="our-partners" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center heading_space wow fadeIn" data-wow-delay="300ms">
                    <h2 class="heading bottom30 darkcolor font-light2">Clients
                        <span class="divider-center"></span>
                    </h2>
                </div>
                    <div id="partners-slider" class="owl-carousel" style="height: 120px">
                        @if(!$clients->count())
                            <div class="item">
                                <div class="logo-item"> <img alt="" src="{{asset('public/assets/frontend/images/logo-1.png')}}"></div>
                            </div>
                            <div class="item">
                                <div class="logo-item"><img alt="" src="{{asset('public/assets/frontend/images/logo-2.png')}}"></div>
                            </div>
                            <div class="item">
                                <div class="logo-item"><img alt="" src="{{asset('public/assets/frontend/images/logo-3.png')}}"></div>
                            </div>
                            <div class="item">
                                <div class="logo-item"><img alt="" src="{{asset('public/assets/frontend/images/logo-4.png')}}"></div>
                            </div>
                            <div class="item">
                                <div class="logo-item"><img alt="" src="{{asset('public/assets/frontend/images/logo-5.png')}}"></div>
                            </div>
                            <div class="item">
                                <div class="logo-item"><img alt="" src="{{asset('public/assets/frontend/images/logo-1.png')}}"></div>
                            </div>
                            <div class="item">
                                <div class="logo-item"><img alt="" src="{{asset('public/assets/frontend/images/logo-2.png')}}"></div>
                            </div>
                            <div class="item">
                                <div class="logo-item"><img alt="" src="{{asset('public/assets/frontend/images/logo-3.png')}}"></div>
                            </div>
                            <div class="item">
                                <div class="logo-item"><img alt="" src="{{asset('public/assets/frontend/images/logo-4.png')}}"></div>
                            </div>
                            <div class="item">
                                <div class="logo-item"><img alt="" src="{{asset('public/assets/frontend/images/logo-5.png')}}"></div>
                            </div>
                        @else
                            @foreach($clients as $client)
                                <div class="item">
                                    <div class="logo-item"> <img alt="{{ $client->title }}" src="{{ asset('public/storage/uploads/clients/'.$client->image) }}"></div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Partners ends-->
@endsection
