@extends('frontend.layouts.app')
@section('title', $blog->title)

@section('content')
    <!--Page Header-->
    <section id="main-banner-page" class="position-relative page-header section-nav-smooth parallax blog-detail-header">
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
                        <h3 class="float-left">Detail Of {{$blog->title}}</h3>
                        <ul class="breadcrumb top10 bottom10 float-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item">{{$blog->title}}</li>
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
                        <div class="image">
                            <a href="{{ asset('storage/uploads/blogs/'.$blog->image) }}" data-fancybox="gallery" title="img-responsive">
                                <img src="{{ asset('storage/uploads/blogs/'.$blog->image) }}" class="img-fluid" alt="Latest News">
                            </a>
                        </div>
                        <div class="news_desc text-center text-md-left">
                            <h3 class="text-capitalize font-normal darkcolor"><a href="">{{$blog->title}}</a></h3>
                            <ul class="meta-tags top20 bottom20">
                                <li><a href="#."><i class="fas fa-calendar-alt"></i>{{ date('d M, Y', strtotime($blog->created_at)) }} | {{ $blog->created_at->diffForHumans() }}</a></li>
                                <li><a href="#."> <i class="far fa-user"></i> {{ $blog->name }} </a></li>
                            </ul>
                            <p class="bottom35">{!!$blog->description!!}</p>

                            <div class="profile-authors heading_space">
                                <h4 class="text-capitalize darkcolor bottom40">Comments</h4>
                                @if(count($blog->comments) > '0')
                                    @foreach($blog->comments as $comment)
                                        <div class="eny_profile">
                                            <div class="profile_text bottom0">
                                                <h5 class="darkcolor"><a href="#.">{{ $comment->name }}</a></h5>
                                                <a href="javascript:void(0)" class="readmorebtn font-bold"> <i class="fas fa-reply"></i> Reply</a>
                                                <p class="top10 bottom0">{{ $comment->body }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="alert alert-warning text-center">
                                        No releted comment found!
                                    </div>
                                @endif
                            </div>
                            <div class="post-comment row">
                                <div class="text-center text-md-left" style="margin: 12px">
                                    <h4 class="text-capitalize darkcolor">Add Comment</h4>
                                </div>
                                <form method="POST" class="submit-form" action="{{ route('blog.comment')}}" id="post-a-comment">
                                    @csrf
                                    <input type="hidden" name="blog_slug" value="{{$blog->slug}}">
                                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group bottom35">
                                                <label for="first_name1" class="d-none"></label>
                                                <input class="form-control" name="name" type="text" placeholder="First Name:" required id="first_name1">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group bottom35">
                                                <label for="message" class="d-none"></label>
                                                <textarea class="form-control" name="body" placeholder="Message" id="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 bottom5 text-sm-left text-center">
                                            <button type="submit" class="button gradient-btn">submit request</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <aside class="sidebar whitebox mt-5 mt-md-0">
                        <div class="widget heading_space shadow wow fadeIn" data-wow-delay="350ms">
                            <h4 class="text-capitalize darkcolor bottom20 text-center text-md-left">Recent Blog</h4>
                            @foreach($recent_blogs as $recent_blog)
                                @if($recent_blog->id  == $blog->id)
                                @else
                                    <div class="single_post d-table bottom15">
                                        <a href="{{route('blog_view',$recent_blog->slug)}}" class="post"><img src="{{ asset('storage/uploads/blogs/'.$recent_blog->image) }}" alt="post image"></a>
                                        <div class="text">
                                            <a href="{{route('blog_view',$recent_blog->slug)}}">{{ $recent_blog->title }}</a>
                                            <span>{{ date('d M, Y', strtotime($recent_blog->created_at)) }}</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!--Our Blog Ends-->

@endsection
