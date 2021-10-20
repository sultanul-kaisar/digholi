@extends('frontend.layouts.app')
@section('title', 'Portfolio')

@section('content')
    <!--Page Header-->
    <section id="main-banner-page" class="position-relative page-header pricing-header section-nav-smooth parallax">
        <div class="overlay overlay-dark opacity-7 z-index-1"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="page-titles whitecolor text-center padding_top padding_bottom">
                        <h2 class="font-xlight">Let's Get</h2>
                        <h2 class="font-bold">Start With Our Premium</h2>
                        <h2 class="font-xlight">Offers By</h2>
                        <h3 class="font-light pt-2">Buying Our Latest Premium Offer You Choose</h3>
                    </div>
                </div>
            </div>
            <div class="title-wrap" style="background-color: #6bbe46">
                <div class="row">
                    <div class="col-lg-12 col-md-12 whitecolor">
                        <h3 class="float-left">Projects</h3>
                        <ul class="breadcrumb top10 bottom10 float-right">
                            <li class="breadcrumb-item hover-light"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item hover-light">Portfolio</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header ends -->
    <!-- Gallery -->
    <section id="gallery" class="bglight position-relative padding_top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn top15" data-wow-delay="300ms">
                    <h2 class="heading bottom45 darkcolor font-light2">Our <span class="font-normal">Creativities</span>
                        <span class="divider-center"></span>
                    </h2>
                    <div class="col-md-8 offset-md-2 bottom40">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dolores explicabo laudantium, omnis provident quam reiciendis voluptatum?</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div id="mosaic-filter" class="cbp-l-filters bottom30 wow fadeIn text-center" data-wow-delay="350ms">
                        <div data-filter="*" class="cbp-filter-item">
                            <span>All</span>
                        </div>
                        @if(!$project_categories->count())
                        <div data-filter=".digital" class="cbp-filter-item">
                            <span>Digital</span>
                        </div>
                        @else
                            @foreach($project_categories as $project_category)
                                <div data-filter=".{{$project_category->slug}}" class="cbp-filter-item">
                                    <span>{{$project_category->title}}</span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-12">
                    <div id="grid-mosaic" class="cbp cbp-l-grid-mosaic-flat">
                        @if(!$projects->count())
                            <!--Item 1-->
                            <div class="cbp-item brand graphics">
                                <img src="{{asset('assets/frontend/images/gallery-1.png')}}" alt="">
                                <div class="gallery-hvr whitecolor">
                                    <div class="center-box">
                                        <a href="{{asset('assets/frontend/images/gallery-1.png')}}" class="opens" data-fancybox="gallery" title="Zoom In"> <i class="fa fa-search-plus"></i></a>
                                        <a href="#" class="opens" title="View Details"> <i class="fas fa-link"></i></a>
                                        <h4 class="w-100">Rainy Outdoor</h4>
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach($projects as $project)
                                    <div class="cbp-item brand {{$project->project_category->slug}} p-2">
                                        <img src="{{ asset('storage/uploads/projects/'.$project->image) }}" alt="{{$project->title}}">
                                        <div class="gallery-hvr whitecolor">
                                            <div class="center-box">
                                                <a href="{{ asset('storage/uploads/projects/'.$project->image) }}" class="opens" data-fancybox="gallery" title="Zoom In"> <i class="fa fa-search-plus"></i></a>
                                                <a href="{{route('portfolio_view',$project->slug)}}" class="opens" title="View Details"> <i class="fas fa-link"></i></a>
                                                <h4 class="w-100">{{$project->title}}</h4>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <!--Load more itema from another html file using ajax-->
                        <div id="js-loadMore-mosaic" class="cbp-l-loadMore-button ">
                            <a href="load-more.html" class="cbp-l-loadMore-link button py-1 button gradient-btn whitecolor transition-3" rel="nofollow">
                                <span class="cbp-l-loadMore-defaultText">LOAD MORE (<span class="cbp-l-loadMore-loadItems">13</span>)</span>
                                <span class="cbp-l-loadMore-loadingText">LOADING <i class="fas fa-spinner fa-spin"></i></span>
                                <span class="cbp-l-loadMore-noMoreLoading d-none">NO MORE WORKS</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery ends -->

@endsection
