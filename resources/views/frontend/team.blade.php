@extends('frontend.layouts.app')
@section('title', 'Team')

@section('content')
    <!--Page Header-->
    <section id="main-banner-page" class="position-relative page-header team-header section-nav-smooth parallax">
        <div class="overlay overlay-dark opacity-8    z-index-1"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="page-titles whitecolor text-center padding_top padding_bottom">
                        <h2 class="font-xlight">Meet Our</h2>
                        <h2 class="font-bold">Best Leading Team</h2>
                        <h3 class="font-light pt-2">The honourable, Cooperative And Elegant</h3>
                    </div>
                </div>
            </div>
            <div class="title-wrap" style="background-color: #6bbe46">
                <div class="row">
                    <div class="col-lg-12 col-md-12 whitecolor">
                        <h3 class="float-left">Our Team</h3>
                        <ul class="breadcrumb top10 bottom10 float-right">
                            <li class="breadcrumb-item hover-light"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item hover-light">Team</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header ends -->
    <!--team members-->
    <section class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center heading_space animated wow fadeIn" data-wow-delay="300ms">
                    <h2 class="heading bottom30 darkcolor font-light2">Our <span class="font-normal">Team</span>
                        <span class="divider-center"></span>
                    </h2>
                    <div class="col-md-8 offset-md-2 bottom40">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dolores explicabo laudantium, omnis provident quam reiciendis voluptatum?</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div id="mosaic-filter" class="cbp-l-filters bottom30 wow fadeIn text-center" data-wow-delay="350ms">
                    <div data-filter="*" class="cbp-filter-item">
                        <span>All</span>
                    </div>
                    @if(!$team_departments->count())
                        <div data-filter=".digital" class="cbp-filter-item">
                            <span>Digital</span>
                        </div>
                    @else
                        @foreach($team_departments as $team_department)
                            <div data-filter=".{{$team_department->slug}}" class="cbp-filter-item">
                                <span>{{$team_department->title}}</span>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div id="grid-mosaic" class="row equal-shadow-team cbp cbp-l-grid-mosaic-flat">
                @foreach($teams as $team)
                    <div class="cbp-item col-lg-3 col-md-4 col-sm-6 col-12 pb-4 {{ $team->team_department->slug }}">
                         <div class="team-box wow fadeIn" data-wow-delay="300ms">
                             <div class="image">
                                 <img src="{{ asset('storage/uploads/teams/'.$team->image) }}" alt="">
                             </div>
                             <div class="team-content">
                                 <h4 class="darkcolor">{{ $team->title }}</h4>
                                 <p>{{ $team->team_department->title }}</p>
                                 <ul class="social-icons-simple">
                                     <p>{{ substr ($team->description, 0, 70) }}</p>
                                     <li><a class="facebook" target="_blank" href="{{ $team->facebook }}"><i class="fab fa-facebook-f"></i> </a> </li>
                                     <li><a class="twitter" target="_blank" href="{{ $team->twitter }}"><i class="fab fa-twitter"></i> </a> </li>
                                     <li><a class="insta" target="_blank" href="{{ $team->instagram }}"><i class="fab fa-instagram"></i> </a> </li>
                                     <li><a class="linkedin" target="_blank" href="{{ $team->linkedin }}"><i class="fab fa-linkedin"></i> </a> </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--team members end-->

@endsection
