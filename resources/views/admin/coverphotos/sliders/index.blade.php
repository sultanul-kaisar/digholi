@extends('admin.layouts.app')

@section('title', 'Slider Photos')


@section('content')
    <div class="page-header card" style="margin-top: 0px; margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a> About Sliders</li>
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
                                    <h5 class="card-title">All Slider Photos</h5>
                                        <div class="card-header-right col-md-9">
                                            <a type="button" href="{{ route('slider.create') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right"><i class="icofont icofont-user-alt-3"></i> New slider photo</a>
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
                                                    @foreach($sliders as $slider)
                                                        <tr>
                                                            <td class="">
                                                                <div class="list-icons">
                                                                    <div class="dropdown">
                                                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                            <i class="ti-menu-alt"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right custom-dropdown-menu-right">
                                                                            <a href="#" class="dropdown-item" onclick="event.preventDefault();getSlider('{{ $slider->id }}', '{{ $slider->title }}', {{ $slider->title2 }}, {{ $slider->title3 }}, {{ $slider->body }}, '{{ $slider->image }}', '{{ asset('public/storage/uploads/coverphotos/sliders/') }}', '{{ $slider->align }}', '{{ $slider->status }}');"><i class="ti-pencil-alt"></i> View</a>

                                                                            <a href="{{ route('slider.edit', $slider->id) }}" class="dropdown-item"><i class="ti-pencil-alt"></i> Edit</a>

                                                                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('delete-form{{$slider->id}}').submit();"><i class="ti-trash"></i> Delete</a>
                                                                            <form id="delete-form{{$slider->id}}" action="{{ route('slider.destroy', $slider->id) }}" method="POST" style="display: none;">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>{!! $slider->title !!}</td>
                                                            <td style="width:15%;">
                                                                <a href="{{ asset('public/storage/uploads/coverphotos/sliders/'.$slider->image) }}" data-toggle="lightbox">
                                                                    <img src="{{ asset('public/storage/uploads/coverphotos/sliders/'.$slider->image) }}" class="img-fluid">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                @if($slider->status == "active")
                                                                    <span class="badge badge-success">Enabled</span>
                                                                @endif

                                                                @if($slider->status == "inactive")
                                                                    <span class="badge badge-danger">Disabled</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </div>
                                            </table>
                                            <!-- Basic modal -->
                                            <div id="modal_default" class="modal fade" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>Title</th>
                                                                    <td id="slider-title"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Image</th>
                                                                    <td id="slider-image"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Status</th>
                                                                    <td id="slider-status"></td>
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
        function getSlider(id, title, image, image_path , status)
        {

            if(status == "active"){
                status = "<span class='badge badge-success' style='font-size:55%!important;padding: .2125rem .375rem!important;'>Enabled</span>"
            }

            if(status == "inactive"){
                status = "<span class='badge badge-danger' style='font-size:55%!important;padding: .2125rem .375rem!important;'>Disabled</span>"
            }

            image = `<img src="${image_path}/${image}" style='width:150px'>`;

            document.getElementById("slider-title").innerHTML   = title;
            document.getElementById("slider-image").innerHTML   = image;
            document.getElementById("slider-status").innerHTML  = status;

            $('#modal_default').modal('show');
        }
    </script>
@endpush

