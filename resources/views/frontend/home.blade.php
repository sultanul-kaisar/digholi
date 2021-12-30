@extends('frontend.layouts.app')
@section('title', 'Home')

@section('content')
    <!--Main Slider-->
    <section id="main-banner-area" class="position-relative">
        <div id="revo_main_wrapper" class="rev_slider_wrapper fullwidthbanner-container m-0 p-0 bg-dark" data-alias="classic4export" data-source="gallery">
            <!-- START REVOLUTION SLIDER 5.4.1 fullwidth mode -->
            <div id="vertical-bullets" class="rev_slider fullwidthabanner white vertical-tpb" data-version="5.4.1">
                <ul>
                @foreach($sliders as $slider)
                    <!-- SLIDE 1 -->
                        <li data-index="rs-{{$slider->id}}" data-transition="fade" data-slotamount="default" data-easein="Power100.easeIn" data-easeout="Power100.easeOut" data-masterspeed="2000" data-fsmasterspeed="1500" data-param1="{{$slider->id}}">
                            <!-- MAIN IMAGE -->
                            <div class="overlay overlay-dark opacity-5"></div>
                            <img src="{{ asset('public/storage/uploads/coverphotos/sliders/'.$slider->image) }}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>

                        @if($slider->align == 'left')
                            <!-- LAYER NR. 1 -->
                                <div class="tp-caption tp-resizeme"
                                     data-x="['left','left','center','center']" data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['-30','-30','-30','-30']"
                                     data-width="none" data-height="none" data-type="text"
                                     data-textAlign="['center','center','center','center']"
                                     data-responsive_offset="on" data-start="1000"
                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                                    <h1 class="text-capitalize font-xlight whitecolor text-center"> {!! $slider->title !!} </h1>
                                </div>
{{--                                <!-- LAYER NR. 2 -->--}}
{{--                                <div class="tp-caption tp-resizeme"--}}
{{--                                     data-x="['left','left','center','center']" data-hoffset="['0','0','0','0']"--}}
{{--                                     data-y="['middle','middle','middle','middle']" data-voffset="['30','30','30','30']"--}}
{{--                                     data-width="none" data-height="none" data-type="text"--}}
{{--                                     data-textAlign="['center','center','center','center']"--}}
{{--                                     data-responsive_offset="on" data-start="1000"--}}
{{--                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>--}}
{{--                                    <h1 class="text-capitalize font-bold whitecolor text-center">{{ $slider->title2 }}</h1>--}}
{{--                                </div>--}}
{{--                                <!-- LAYER NR. 3 -->--}}
{{--                                <div class="tp-caption tp-resizeme"--}}
{{--                                     data-x="['left','left','center','center']" data-hoffset="['0','0','0','0']"--}}
{{--                                     data-y="['middle','middle','middle','middle']" data-voffset="['90','90','90','90']"--}}
{{--                                     data-width="none" data-height="none" data-type="text"--}}
{{--                                     data-textAlign="['center','center','center','center']"--}}
{{--                                     data-responsive_offset="on" data-start="1500"--}}
{{--                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>--}}
{{--                                    <h1 class="text-capitalize font-xlight whitecolor text-center">{{ $slider->title3 }}</h1>--}}
{{--                                </div>--}}
{{--                                <!-- LAYER NR. 4 -->--}}
{{--                                <div class="tp-caption tp-resizeme"--}}
{{--                                     data-x="['left','left','center','center']" data-hoffset="['0','0','0','0']"--}}
{{--                                     data-y="['middle','middle','middle','middle']" data-voffset="['130','130','130','130']"--}}
{{--                                     data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"--}}
{{--                                     data-textAlign="['center','center','center','center']"--}}
{{--                                     data-responsive_offset="on" data-start="2000"--}}
{{--                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>--}}
{{--                                    <h4 class="whitecolor font-xlight text-center">{{ $slider->body }}</h4>--}}
{{--                                </div>--}}
                        @else
                            <!-- LAYER NR. 1 -->
                                <div class="tp-caption tp-resizeme"
                                     data-x="['right','right','center','center']" data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['-30','-30','-30','-30']"
                                     data-width="none" data-height="none" data-type="text"
                                     data-textAlign="['center','center','center','center']"
                                     data-responsive_offset="on" data-start="1000"
                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                                    <h1 class="text-capitalize font-xlight whitecolor text-center">{!! $slider->title !!}</h1>
                                </div>
                                <!-- LAYER NR. 2 -->
{{--                                <div class="tp-caption tp-resizeme"--}}
{{--                                     data-x="['right','right','center','center']" data-hoffset="['0','0','0','0']"--}}
{{--                                     data-y="['middle','middle','middle','middle']" data-voffset="['30','30','30','30']"--}}
{{--                                     data-width="none" data-height="none" data-type="text"--}}
{{--                                     data-textAlign="['center','center','center','center']"--}}
{{--                                     data-responsive_offset="on" data-start="1000"--}}
{{--                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>--}}
{{--                                    <h1 class="text-capitalize font-bold whitecolor text-center">{{ $slider->title2 }}</h1>--}}
{{--                                </div>--}}
{{--                                <!-- LAYER NR. 3 -->--}}
{{--                                <div class="tp-caption tp-resizeme"--}}
{{--                                     data-x="['right','right','center','center']" data-hoffset="['0','0','0','0']"--}}
{{--                                     data-y="['middle','middle','middle','middle']" data-voffset="['90','90','90','90']"--}}
{{--                                     data-width="none" data-height="none" data-type="text"--}}
{{--                                     data-textAlign="['center','center','center','center']"--}}
{{--                                     data-responsive_offset="on" data-start="1500"--}}
{{--                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>--}}
{{--                                    <h1 class="text-capitalize font-xlight whitecolor text-center">{{ $slider->title3 }}</h1>--}}
{{--                                </div>--}}
{{--                                <!-- LAYER NR. 4 -->--}}
{{--                                <div class="tp-caption tp-resizeme"--}}
{{--                                     data-x="['right','right','center','center']" data-hoffset="['0','0','0','0']"--}}
{{--                                     data-y="['middle','middle','middle','middle']" data-voffset="['130','130','130','130']"--}}
{{--                                     data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"--}}
{{--                                     data-textAlign="['center','center','center','center']"--}}
{{--                                     data-responsive_offset="on" data-start="2000"--}}
{{--                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>--}}
{{--                                    <h4 class="whitecolor font-xlight text-center">{{ $slider->body }}</h4>--}}
{{--                                </div>--}}
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <ul class="social-icons-simple revicon white">
            <li class="d-table"><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a> </li>
            <li class="d-table"><a href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
            <li class="d-table"><a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i> </a> </li>
            <li class="d-table"><a href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
        </ul>
    </section>
    <!--Main Slider ends -->

    <!--Portfolio Feature -->
    <section id="our-feature" class="single-feature padding">
        <div class="container">
            <h2 style="color: #6bbe46">Recent Project</h2>
            <div class="row d-flex align-items-center">
                @foreach($projects as $project)
                    <div class="col-lg-6 col-md-7 col-sm-5 text-sm-left text-center wow fadeInLeft" data-wow-delay="300ms">
                        <div class="image">
                            <img alt="SEO" src="{{ asset('public/storage/uploads/projects/'.$project->image) }}">
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1 col-md-5 col-sm-5 wow fadeInRight" data-wow-delay="300ms">
                        <div class="heading-title mb-4">
                            <h3 class="darkcolor font-normal bottom30"><span class="defaultcolor">{{ $project->title }}</span></h3>
                        </div>
                        <p class="bottom35" style="text-align: justify">{!! substr($project->description, 0, 300) !!}...</p>
                        <a href="{{route('portfolio_view',$project->slug)}}" class="button" style="background-color: #6bbe46">Click for View</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Portfolio Feature ends-->

    <!--Gallery Feature -->
    <section id="our-feature" class="single-feature padding">
        <div class="container">
            <h2 style="color: #6bbe46">Recent Gallery</h2>
            <div class="row d-flex align-items-center">
                @foreach($galleries as $gallery)
                        <div class="col-lg-6 col-md-7 col-sm-7 text-sm-left text-center wow fadeInLeft" data-wow-delay="300ms">
                            <div class="heading-title mb-4">
                                <h3 class="darkcolor font-normal bottom30"><span class="defaultcolor">{{ $gallery->title }}</span></h3>
                            </div>
                            <p class="bottom35" style="text-align: justify">{!! substr($gallery->description, 0, 300) !!}...</p>
                            <a href="{{route('gallery_view',$gallery->slug)}}" class="button" style="background-color: #6bbe46">Read more</a>
                        </div>
                        <div class="col-lg-5 offset-lg-1 col-md-5 col-sm-5 wow fadeInRight" data-wow-delay="300ms">
                            <div class="image" style="width: 500px">
                                <img alt="SEO" src="{{ asset('public/storage/uploads/galleries/'.$gallery->image) }}">
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Gallery Feature ends-->
@endsection
