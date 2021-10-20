
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.dashboardpack.com/admindek-html/default/animation.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Jul 2021 16:17:51 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <title> @yield('title')</title>
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
    <link rel="icon" href="{{asset('public/assets/backend/files/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/files/bower_components/bootstrap/css/bootstrap.min.css')}}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('public/assets/backend/files/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/files/assets/icon/feather/css/feather.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/files/assets/icon/themify-icons/themify-icons.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/files/bower_components/animate.css/css/animate.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/files/assets/icon/icofont/css/icofont.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/files/assets/icon/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/files/assets/css/datatables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/files/assets/css/buttons.datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/files/assets/css/responsive.bootstrap4.min.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/files/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/files/assets/css/pages.css')}}">
    @stack('css')
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/files/assets/css/custom.css')}}">
</head>
public/
<body>
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-bar"></div>
</div>
<!-- [ Pre-loader ] end -->
<div id="pcoded" class="pcoded" >
    <div class="pcoded-overlay-box" ></div>
    <div class="pcoded-container navbar-wrapper">
        <!-- [ Header ] start -->
        @include('backend.layouts.inc.navbar')


        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <!-- [ navigation menu ] start -->
                @include('backend.layouts.inc.sidebar')
                <!-- [ navigation menu ] end -->
                <div class="pcoded-content">
                    <!-- [ breadcrumb ] start -->
                @yield('content')
                    <!-- [ breadcrumb ] end -->

                    <!-- Footer -->
                @include('backend.layouts.inc.footer')
                <!-- /footer -->

                </div>
                <!-- [ style Customizer ] start -->
                <div id="styleSelector">
                </div>
                <!-- [ style Customizer ] end -->
            </div>
        </div>
    </div>
</div>
<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade
        <br/>to any of the following web browsers to access this website.
    </p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="{{asset('public/assets/backend/files/assets/images/browser/chrome.png')}}" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="{{asset('public/assets/backend/files/assets/images/browser/firefox.png')}}" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="{{asset('public/assets/backend/files/assets/images/browser/opera.png')}}" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="{{asset('public/assets/backend/files/assets/images/browser/safari.png')}}" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="{{asset('public/assets/backend/files/assets/images/browser/ie.png')}}" alt="">
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
<script type="text/javascript" src="{{asset('public/assets/backend/files/bower_components/jquery/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/backend/files/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/backend/files/bower_components/popper.js/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/backend/files/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- waves js -->
<script src="{{asset('public/assets/backend/files/assets/pages/waves/js/waves.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('public/assets/backend/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
<!-- Float Chart js -->
<script src="{{asset('public/assets/backend/files/assets/pages/chart/float/jquery.flot.js')}}"></script>
<script src="{{asset('public/assets/backend/files/assets/pages/chart/float/jquery.flot.categories.js')}}"></script>
<script src="{{asset('public/assets/backend/files/assets/pages/chart/float/curvedLines.js')}}"></script>
<script src="{{asset('public/assets/backend/files/assets/pages/chart/float/jquery.flot.tooltip.min.js')}}"></script>
<!-- amchart js -->
<script src="{{asset('public/assets/backend/files/assets/pages/widget/amchart/amcharts.js')}}"></script>
<script src="{{asset('public/assets/backend/files/assets/pages/widget/amchart/gauge.js')}}"></script>
<script src="{{asset('public/assets/backend/files/assets/pages/widget/amchart/serial.js')}}"></script>
<script src="{{asset('public/assets/backend/files/assets/pages/widget/amchart/light.js')}}"></script>
<script src="{{asset('public/assets/backend/files/assets/pages/widget/amchart/pie.min.js')}}"></script>
<script src="{{asset('public/assets/backend/files/assets/pages/widget/amchart/ammap.min.js')}}"></script>
<script src="{{asset('public/assets/backend/files/assets/pages/widget/amchart/usaLow.js')}}"></script>

<!-- Chartlist charts -->
<script src="{{asset('public/assets/backend/files/bower_components/chartist/js/chartist.js')}}"></script>

<!-- Custom js -->
<script src="{{asset('public/assets/backend/files/assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('public/assets/backend/files/assets/js/vertical/vertical-layout.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/backend/files/assets/pages/dashboard/analytic-dashboard.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/backend/files/assets/js/script.min.js')}}"></script>
<script src="{{asset('public/assets/backend/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
@if(session('errorMessage'))
    <script>
        $.notify({
            title: "Error : ",
            message: '{{ session('errorMessage') }}'
        },{
            type: "danger",
            z_index: 9999,
            placement: {
                from: "top",
                align: "right"
            }
        });
    </script>
@endif

@if(session('successMessage'))
    <script>
        $.notify({
            title: "Success : ",
            message: '{{ session('successMessage') }}'
        },{
            type: "success",
            z_index: 9999,
            placement: {
                from: "top",
                align: "right"
            }
        });
    </script>
@endif
@stack('js')
</body>


<!-- Mirrored from demo.dashboardpack.com/admindek-html/default/dashboard-analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Jul 2021 20:53:48 GMT -->
</html>
