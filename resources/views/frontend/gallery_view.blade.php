@extends('frontend.layouts.app')
@section('title', $gallery->title)

@section('content')
<!--Page Header-->
<section id="main-banner-page" class="position-relative page-header section-nav-smooth parallax gallery-detail-header">
    <div class="overlay overlay-dark opacity-6 z-index-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-xlight">Imagine</h2>
                    <h2 class="font-bold">Your Fantastic Layout</h2>
                    <h2 class="font-xlight">And Build</h2>
                    <h3 class="font-light pt-2">It Right Now, With Our Great Team Members</h3>
                </div>
            </div>
        </div>
        <div class="title-wrap bottom25" style="background-color: #6bbe46">
            <div class="row">
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-left">Detail Of {{$gallery->title}}</h3>
                    <ul class="breadcrumb top10 bottom10 float-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item">{{$gallery->title}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Page Header ends -->
<!-- Gallery Details -->
<section id="gallery-detail" class="padding_top padding_bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-7">
                <div class="news_item shadow">
                    <div class="image">
                        <a href="{{ asset('storage/uploads/galleries/'.$gallery->image) }}" data-fancybox="gallery" title="img-responsive">
                            <img src="{{ asset('storage/uploads/galleries/'.$gallery->image) }}" class="img-fluid" alt="Latest News">
                        </a>
                    </div>
                    <div class="news_desc text-center text-md-left">
                        <h3 class="text-capitalize font-normal darkcolor"><a href="">{{$gallery->title}}</a></h3>

                        <p class="bottom35">{!! $gallery->description !!}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Gallery Details Ends-->

@endsection
