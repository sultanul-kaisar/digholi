@extends('frontend.layouts.app')
@section('title', 'Blog')

@section('content')
    <!--Page Header-->
    <section id="main-banner-page" class="position-relative page-header blog-header parallax section-nav-smooth">
        <div class="overlay overlay-dark opacity-7 z-index-1"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="page-titles whitecolor text-center padding_top padding_bottom">
                        <h2 class="font-xlight">Let's Get</h2>
                        <h2 class="font-bold">The Job Free Income</h2>
                        <h2 class="font-xlight">With Blog</h2>
                        <h3 class="font-light pt-2">The Best Multipurpose Template in Market</h3>
                    </div>
                </div>
            </div>
            <div class="title-wrap" style="background-color: #6bbe46">
                <div class="row">
                    <div class="col-lg-12 col-md-12 whitecolor">
                        <h3 class="float-left">Blogs</h3>
                        <ul class="breadcrumb top10 bottom10 float-right">
                            <li class="breadcrumb-item hover-light"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item hover-light">Blog</li>
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
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div id="mosaic-filter" class="cbp-l-filters bottom30 wow fadeIn text-center" data-wow-delay="350ms">
                        <div data-filter="*" class="cbp-filter-item">
                            <span>All</span>
                        </div>
                        {{-- @if(!$blog_categories->count())
                            <div data-filter=".digital" class="cbp-filter-item">
                                <span>Digital</span>
                            </div>
                        @else --}}
                            {{-- @foreach($blog_categories as $blog_category)
                                <div data-filter=".{{$blog_category->slug}}" class="cbp-filter-item">
                                    <span>{{$blog_category->title}}</span>
                                </div>
                            @endforeach --}}
                        {{-- @endif --}}
                    {{-- </div>
                </div>
            </div> --}}
            <div class="cbp-item">
                <div class="news_item shadow text-center text-md-start">
                @if(!$blogs->count())
                @else
                    @foreach($blogs as $blog)
                        <div class="cbp-item brand {{$blog->blog_category->slug}} p-2">
                            <div class="news_item shadow wow fadeInUp" data-wow-delay="200ms">
                                <div class="blog-img">
                                    <a class="image" href="{{route('blog_view',$blog->slug)}}">
                                        <img src="{{ asset('public/storage/uploads/blogs/'.$blog->image) }}" alt="Latest News" class="img-responsive">
                                    </a>
                                </div>
                                <div class="news_desc">
                                    <h3 class="text-capitalize font-normal darkcolor"><a href="{{route('blog_view',$blog->slug)}}">{{ $blog->title }}</a></h3>
                                    <ul class="meta-tags top20 bottom20">
                                        <li><a href="#."><i class="fas fa-calendar-alt"></i>{{ date('d M, Y', strtotime($blog->created_at)) }}</a></li>
                                        <li><a href="#."> <i class="far fa-user"></i> {{ $blog->name }} </a></li>
                                        <li><a href="#."><i class="far fa-comment-dots"></i>{{ $blog->comments->count() }}</a></li>
                                    </ul>
                                    <p class="bottom35">{!! substr($blog->description, 0, 300) !!}</p>
                                    <a href="{{route('blog_view',$blog->slug)}}" class="button gradient-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Blog ends -->

@endsection
