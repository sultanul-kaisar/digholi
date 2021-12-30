@extends('admin.layouts.app')

@section('title', 'About Photos')


@section('content')
    <div class="page-header card" style="margin-top: 0px; margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a> About Photos</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="content" >
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card sale-card" style="min-height:550px!important;">
                                <div class="card-header">
                                    <h5 class="card-title">All About Photos</h5>
                                        <div class="card-header-right col-md-9">
                                            <a type="button" href="{{ route('about.create') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right"><i class="icofont icofont-user-alt-3"></i> New About photo</a>
                                        </div>
                                </div>

                                <div class="page-body">
                                    <div class="card-block">
                                        <div class="table-responsive dt-responsive">
                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">

                                                <div class="content" >
                                                    <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Title</th>
                                                        <th>Image</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($abouts as $about)
                                                        <tr>
                                                            <td class="">
                                                                <div class="list-icons">
                                                                    <div class="dropdown">
                                                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                            <i class="ti-menu-alt"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right custom-dropdown-menu-right">
                                                                            <a href="#" class="dropdown-item" onclick="event.preventDefault();getabout('{{ $about->id }}', '{{ $about->title }}', '{{ $about->image }}', '{{ asset('public/storage/uploads/coverphotos/abouts/') }}', '{{ $about->status }}');"><i class="ti-pencil-alt"></i> View</a>

                                                                            <a href="{{ route('about.edit', $about->id) }}" class="dropdown-item"><i class="ti-pencil-alt"></i> Edit</a>

                                                                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('delete-form{{$about->id}}').submit();"><i class="ti-trash"></i> Delete</a>
                                                                            <form id="delete-form{{$about->id}}" action="{{ route('about.destroy', $about->id) }}" method="POST" style="display: none;">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>{!! $about->title !!}</td>
                                                            <td style="width:15%;">
                                                                <a href="{{ asset('public/storage/uploads/coverphotos/abouts/'.$about->image) }}" data-toggle="lightbox">
                                                                    <img src="{{ asset('public/storage/uploads/coverphotos/abouts/'.$about->image) }}" class="img-fluid">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                @if($about->status == "active")
                                                                    <span class="badge badge-success">Enabled</span>
                                                                @endif

                                                                @if($about->status == "inactive")
                                                                    <span class="badge badge-danger">Disabled</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </div>
                                            </table>
                                            <!-- Basic modal -->
                                            <div id="modal_default" class="modal fade" tabAbout="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>Title</th>
                                                                    <td id="about-title"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Image</th>
                                                                    <td id="about-image"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Status</th>
                                                                    <td id="about-status"></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /basic modal -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <!-- data-table js -->
    <script src="{{asset('public/assets/backend/files/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/assets/backend/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/assets/backend/files/assets/pages/data-table/js/jszip.min.js')}}"></script>
    <script src="{{asset('public/assets/backend/files/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/assets/backend/files/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/assets/backend/files/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/assets/backend/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/assets/backend/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/assets/backend/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('public/assets/backend/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/assets/backend/files/assets/pages/data-table/js/data-table-custom.js')}}"></script>
    <script src="{{asset('public/assets/backend/files/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
    <script>
        $(document).ready(function() {
            // Basic datatable
            $('.datatable-basic').DataTable({
                responsive: true
            });
        });

    </script>

    <script>
        function getAbout(id, title, image, image_path , status)
        {

            if(status == "active"){
                status = "<span class='badge badge-success' style='font-size:55%!important;padding: .2125rem .375rem!important;'>Enabled</span>"
            }

            if(status == "inactive"){
                status = "<span class='badge badge-danger' style='font-size:55%!important;padding: .2125rem .375rem!important;'>Disabled</span>"
            }

            image = `<img src="${image_path}/${image}" style='width:150px'>`;

            document.getElementById("about-title").innerHTML   = title;
            document.getElementById("about-image").innerHTML   = image;
            document.getElementById("about-status").innerHTML  = status;

            $('#modal_default').modal('show');
        }
    </script>
@endpush

