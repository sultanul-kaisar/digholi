@extends('frontend.layouts.app')
@section('title', 'Gallery')

@section('content')
    <!--Page Header-->
    <section id="main-banner-page" class="position-relative page-header gallery-header parallax section-nav-smooth">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="page-titles whitecolor text-center padding_top padding_bottom">
                        <h2 class="font-xlight">Welcome</h2>
                        <h2 class="font-bold">To Our Creativities</h2>
                        <h2 class="font-xlight">Let's Build</h2>
                        <h3 class="font-light pt-2">It More Creative With Your Slight Attention</h3>
                    </div>
                </div>
            </div>
            <div class="title-wrap" style="background-color: #6bbe46">
                <div class="row">
                    <div class="col-lg-12 col-md-12 whitecolor">
                        <h3 class="float-left">Galleries</h3>
                        <ul class="breadcrumb top10 bottom10 float-right">
                            <li class="breadcrumb-item hover-light"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item hover-light">Gallery</li>
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
                    <h2 class="heading bottom45 darkcolor font-light2">Our <span class="font-normal">Galleries</span>
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
                        @if(!$gallery_categories->count())
                            <div data-filter=".digital" class="cbp-filter-item">
                                <span>Digital</span>
                            </div>
                        @else
                            @foreach($gallery_categories as $gallery_category)
                                <div data-filter=".{{$gallery_category->slug}}" class="cbp-filter-item">
                                    <span>{{$gallery_category->title}}</span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-12">
                    <div id="grid-mosaic" class="cbp cbp-l-grid-mosaic-flat">
                    @if(!$galleries->count())
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
                            @foreach($galleries as $gallery)
                                <div class="cbp-item brand {{$gallery->gallery_category->slug}} p-2">
                                    <img src="{{ asset('storage/uploads/galleries/'.$gallery->image) }}" alt="{{$gallery->title}}">
                                    <div class="gallery-hvr whitecolor">
                                        <div class="center-box">
                                            <a href="{{ asset('storage/uploads/galleries/'.$gallery->image) }}" class="opens" data-fancybox="gallery" title="Zoom In"> <i class="fa fa-search-plus"></i></a>
                                            <a href="{{route('gallery_view',$gallery->slug)}}" class="opens" title="View Details"> <i class="fas fa-link"></i></a>
                                            <h4 class="w-100">{{$gallery->title}}</h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <!--Load more itema from another html file using ajax-->
                        <div id="js-loadMore-mosaic" class="cbp-l-loadMore-button ">
                            <a href="#" class="cbp-l-loadMore-link button py-1 button gradient-btn whitecolor transition-3" rel="nofollow">
                                <span class="cbp-l-loadMore-defaultText">LOAD MORE</span>
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
