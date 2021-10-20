@extends('frontend.layouts.app')
@section('title', 'Get In Touch')

@section('content')
<!--Page Header-->
<section id="main-banner-page" class="position-relative page-header contact-header section-nav-smooth parallax">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="page-titles whitecolor text-center padding">
                    <h2 class="font-bold"> Get In Touch</h2>
                    <h3 class="font-light py-3">We'd Love To Here From You.</h3>
                </div>
            </div>
        </div>
        <div class="title-wrap mt-n5" style="background-color: #6bbe46">
            <div class="row">
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-left">Get In Touch</h3>
                    <ul class="breadcrumb top10 bottom10 float-right">
                        <li class="breadcrumb-item hover-light"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item hover-light">Get In Touch</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Page Header ends -->
<!-- Contact US -->
<section id="stayconnect1" class="bglight position-relative padding noshadow">
    <div class="container whitebox">
        <div class="widget py-5">
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn mt-n3" data-wow-delay="300ms">
                    <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Contact</span> Us
                        <span class="divider-center"></span>
                    </h2>
                    <div class="col-md-8 offset-md-2 bottom35">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dolores explicabo laudantium, omnis provident quam reiciendis voluptatum?</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 order-sm-2">
                    <div class="contact-meta px-2 text-center text-md-left">
                        <div class="heading-title">
                            <span class="defaultcolor mb-3">Our Office</span>
                        </div>
                        <p class="bottom10">Address: Flat#B1, House@41, Block#B, Banasree, Rampura, Dhaka</p>
                        <p class="bottom10">+8801316-328389</p>
{{--                            <p class="bottom10"><a href="mailto:polpo@traxagency.co.au">polpo@traxagency.co.au</a></p>--}}
                        <ul class="social-icons mt-4 mb-4 mb-sm-0 wow fadeInUp" data-wow-delay="300ms">

                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="heading-title  wow fadeInUp" data-wow-delay="300ms">
                        @if(session('successContactMessage'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ session('successContactMessage') }}
                            </div>
                        @endif

                        @if(session('errorContactMessage'))
                            <div class="alert alert-danger text-center" role="alert">
                                {{ session('errorContactMessage') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('contact-send') }}" class="getin_form wow fadeInUp" data-wow-delay="400ms">
                            @csrf
                            <div class="row px-2">
                                <div class="col-md-12 col-sm-12" id="result"></div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="name" class="d-none"></label>
                                        <input type="text" class="input input__icon form-control" name="name" placeholder="Your full name" required value="{{ old('name') }}">
                                        @error('name')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="subject" class="d-none"></label>
                                        <input type="text" class="input input__icon form-control" name="subject" placeholder="Subject" required value="{{ old('subject') }}">
                                        @error('subject')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="email" class="d-none"></label>
                                        <input type="email" class="input input__icon form-control" name="email" placeholder="Your email address" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="message" class="d-none"></label>
                                        <textarea class="textarea form-control" name="message" placeholder="Your Message"  rows="4">{{ old('message') }}</textarea>
                                        @error('message')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
{{--                                <div class="col-md-12 col-sm-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <div class="mb-3">--}}
{{--                                            {!! htmlFormSnippet() !!}--}}
{{--                                            @error('g-recaptcha-response')--}}
{{--                                            <div class="help-block with-errors text-warning">{{ $message }}</div>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" class="button w-100" style="background-color: #6bbe46">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact US ends -->
@endsection
