@extends('frontend.layouts.app')
@section('title', $project->title)

@section('content')
    <!--Page Header-->
    <section id="main-banner-page" class="position-relative page-header faq-header section-nav-smooth parallax">
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
                        <h3 class="float-left">Detail Of {{$project->title}}</h3>
                        <ul class="breadcrumb top10 bottom10 float-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item">{{$project->title}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header ends -->
    <!-- Our Blogs -->
    <section id="our-blog" class="bglight padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="news_item shadow">
                        <iframe width="728" height="371"
                                src="{{$project->url }}"
                                title="{{ $project->title }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                        </iframe>
                        <div class="news_desc text-center text-md-left mb-lg-4">
                            <h3 class="text-capitalize font-normal darkcolor"><a >{{$project->title}}</a></h3>

                            <p class="bottom35">{{$project->description}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <aside class="sidebar whitebox mt-5 mt-md-0">
                        <div >
                            <h2 style="font-family: 'Aubrey', cursive">Poster</h2>
                        </div>
                        <div class="news_item shadow">
                            <div class="image">
                                <a href="{{ asset('storage/uploads/projects/'.$project->image) }}" data-fancybox="gallery" title="img-responsive">
                                    <img src="{{ asset('storage/uploads/projects/'.$project->image) }}" class="img-fluid" alt="Latest News">
                                </a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!--Our Blog Ends-->

@endsection
