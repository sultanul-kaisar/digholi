<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.dashboardpack.com/admindek-html/default/auth-sign-in-social.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Jul 2021 20:56:36 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <title> Digholi | Admin Panel</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="colorlib" />
    <!-- Favicon icon -->

    <link rel="icon" href="{{asset('public/assets/admin/files/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="{{asset('assets/admin/plugins/fonts.googleapis.com/css1180.css?family=Quicksand:500,700')}}" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/admin/files/bower_components/bootstrap/css/bootstrap.min.css')}}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/files/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all"><!-- feather icon --> <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/files/assets/icon/feather/css/feather.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/admin/files/assets/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/admin/files/assets/icon/icofont/css/icofont.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/admin/files/assets/icon/font-awesome/css/font-awesome.min.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/admin/files/assets/css/style.css')}}"><link rel="stylesheet" type="text/css" href="../files/assets/css/pages.css">
</head>

<body themebg-pattern="theme1">
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="loader-track">
        <div class="preloader-wrapper">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pre-loader end -->
<section class="login-block">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 m-auto">
                <!-- Authentication card start -->
                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="text-center">
                        <img src="{{asset('public/assets/admin/files/assets/images/logo.png')}}" alt="logo.png">
                    </div>

                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">Sign In</h3>
                                </div>
                            </div>
                            <p class="text-muted text-center p-b-5">Sign in with your Admin username</p>
                            <div class="form-group form-primary col-md-8 m-auto">
                                <input type="email" name="email" class="form-control form-control-round @error('email') is-invalid @enderror" placeholder="Username" value="{{ old('email', 'dev@digholi.com') }}">
                                <span class="form-bar"></span>
                                <label class="float-label">Username</label>
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <p> </p>
                            <div class="form-group form-primary col-md-8 m-auto">
                                <input type="password" name="password" class="form-control form-control-round @error('password') is-invalid @enderror" placeholder="Password" value="password">
                                <span class="form-bar"></span>
                                <label class="float-label">Password</label>
                                @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-5 m-auto">
                                    <button type="submit" class="btn btn-round btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign In</button>

                                </div>
                            </div>
                            <div class="form-group">
                                @if (session('LoginStatusError'))
                                    <div class="alert alert-warning text-center mt-2">
                                        {!! session('LoginStatusError') !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    </form>
                <!-- end of form -->
                <div class="navbar navbar-expand-lg navbar-light">
                    <div class="text-center d-lg-none w-100">
                        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                            <i class="icon-unfold mr-2"></i>
                            Footer
                        </button>
                    </div>

                    <div class="navbar-collapse collapse" id="navbar-footer">
                        <span class="navbar-text ml-md-5">
                            &copy;{{ date('Y') }}. <a href="#">DEFAULT ADMIN</a> by <a href="" target="_blank">Md Sultanul Kaisar</a>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Authentication card end -->
        </div>
        <!-- end of col-sm-12 -->
    </div>
    <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>
<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="{{asset('public/assets/admin/files/assets/images/browser/chrome.png')}}" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="{{asset('public/assets/admin/files/assets/images/browser/firefox.png')}}" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="{{asset('public/assets/admin/files/assets/images/browser/opera.png')}}" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="{{asset('public/assets/admin/files/assets/images/browser/safari.png')}}" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="{{asset('public/assets/admin/files/assets/images/browser/ie.png')}}" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="{{asset('public/assets/admin/files/bower_components/jquery/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/admin/files/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/admin/files/bower_components/popper.js/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/admin/files/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- waves js -->
<script src="{{asset('public/assets/admin/files/assets/pages/waves/js/waves.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('public/assets/admin/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('public/assets/admin/files/bower_components/modernizr/js/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/admin/files/bower_components/modernizr/js/css-scrollbars.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/admin/files/assets/js/common-pages.js')}}"></script>
</body>


<!-- Mirrored from demo.dashboardpack.com/admindek-html/default/auth-sign-in-social.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Jul 2021 20:56:37 GMT -->
</html>
