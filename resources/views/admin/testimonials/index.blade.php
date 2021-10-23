@extends('admin.layouts.app')

@section('title', 'Testimonials')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a> Testimonials</li>
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
                                    <h5 class="card-title">Testimonial</h5>
                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('testimonial create'))
                                        <div class="card-header-right col-md-9">
                                            <a type="button" href="{{ route('testimonial.create') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right"><i class="icofont icofont-plus-circle"></i> Add Testimonial</a>
                                        </div>
                                    @endif
                                </div>

                                <div class="page-body">
                                    <div class="card-block">
                                        <div class="table-responsive dt-responsive">
                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('testimonial view') || auth()->user()->can('testimonial edit') || auth()->user()->can('testimonial delete'))
                                                        <th>Action</th>
                                                        @endif
                                                        <th>Title</th>
                                                        <th>Image</th>
                                                        <th>Company</th>
                                                        <th>Designation</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($testimonials as $testimonial)
                                                    <tr>
                                                        @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('testimonial view') || auth()->user()->can('testimonial edit') || auth()->user()->can('testimonial delete'))
                                                            <td class="">
                                                                <div class="list-icons">
                                                                    <div class="dropdown">
                                                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                            <i class="ti-menu-alt"></i>
                                                                        </a>

                                                                        <div class="dropdown-menu dropdown-menu-right custom-dropdown-menu-right">
                                                                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('testimonial view'))
                                                                                <a href="#" class="dropdown-item" onclick="event.preventDefault();
                                                                                    {{--getTestimonial(--}}
                                                                                    {{--    '{{ $testimonial->id }}',--}}
                                                                                    {{--    '{{ $testimonial->title }}',--}}
                                                                                    {{--    '{{ $testimonial->description }}',--}}
                                                                                    {{--    '{{ $testimonial->designation }}',--}}
                                                                                    {{--    '{{ $testimonial->company }}',--}}
                                                                                    {{--    '{{ $testimonial->image }}',--}}
                                                                                    {{--    '{{ asset('storage/uploads/testimonials/') }}',--}}
                                                                                    {{--    '{{ $testimonial->url }}',--}}
                                                                                    {{--    '{{ $testimonial->status }}');--}}
                                                                                    {{--    ">--}}
                                                                                    {{--<i class="ti-pencil-alt"></i> View</a>--}}
                                                                                <a href="#" class="dropdown-item" onclick="event.preventDefault();getTestimonial('{{ $testimonial->id }}', '{{ $testimonial->title }}', '{{ $testimonial->description }}', '{{ $testimonial->designation }}', '{{ $testimonial->company }}', '{{ $testimonial->image }}', '{{ asset('storage/uploads/testimonials/') }}', '{{ $testimonial->url }}', '{{ $testimonial->status }}');"><i class="ti-pencil-alt"></i> View</a>
                                                                            @endif

                                                                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('testimonial edit'))
                                                                                <a href="{{ route('testimonial.edit', $testimonial->id) }}" class="dropdown-item"><i class="ti-pencil-alt"></i> Edit</a>
                                                                            @endif

                                                                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('testimonial delete'))
                                                                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('delete-form{{$testimonial->id}}').submit();"><i class="ti-trash"></i> Delete</a>
                                                                                <form id="delete-form{{$testimonial->id}}" action="{{ route('testimonial.destroy', $testimonial->id) }}" method="POST" style="display: none;">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                </form>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @endif
                                                        <td>{{ $testimonial->title }}</td>
                                                        <td style="width:5%;">
                                                            <a href="{{ asset('public/storage/uploads/testimonials/'.$testimonial->image) }}" data-toggle="lightbox">
                                                                <img src="{{ asset('public/storage/uploads/testimonials/'.$testimonial->image) }}" class="img-fluid">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            @if(!is_null($testimonial->company))
                                                                {{ $testimonial->company }}
                                                            @else
                                                                Not set
                                                            @endif
                                                        </td>

                                                        <td>
                                                            {{ $testimonial->designation }}
                                                        </td>
                                                        <td>
                                                            @if($testimonial->status == "active")
                                                                <span class="badge badge-success">Enabled</span>
                                                            @endif

                                                            @if($testimonial->status == "inactive")
                                                                <span class="badge badge-danger">Disabled</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Basic modal -->
                                            <div id="modal_default" class="modal fade" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div id="testimonial-image" class="text-center"></div>
                                                            <h5 class="modal-title d-block mt-2 text-center" id="testimonial-title"></h5>
                                                            <h6 class="modal-title d-block text-center" style="font-size: 12px!important;" id="testimonial-designation"></h6>
                                                            <hr>
                                                            <div id="testimonial-description" class="text-justify"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /basic modal -->
{{--                                            <div id="modal_default" class="modal fade" tabindex="-1">--}}
{{--                                                <div class="modal-dialog modal-lg">--}}
{{--                                                    <div class="modal-content">--}}
{{--                                                        <div class="modal-header">--}}
{{--                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                                                        </div>--}}

{{--                                                        <div class="modal-body">--}}
{{--                                                            <table class="table table-bordered">--}}
{{--                                                                <tr>--}}
{{--                                                                    <th>Name</th>--}}
{{--                                                                    <td id="testimonial-title"></td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <th>Slug</th>--}}
{{--                                                                    <td id="testimonial-slug"></td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <th>Designation</th>--}}
{{--                                                                    <td id="testimonial-designation"></td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <th>Company</th>--}}
{{--                                                                    <td id="testimonial-company"></td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <th>Image</th>--}}
{{--                                                                    <td id="testimonial-image"></td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <th>URL</th>--}}
{{--                                                                    <td id="testimonial-url"></td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <th>Status</th>--}}
{{--                                                                    <td id="testimonial-status"></td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <td style="white-space:pre-wrap; word-wrap:break-word" colspan="2" id="testimonial-description" class="text-center"></td>--}}
{{--                                                                </tr>--}}
{{--                                                            </table>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
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
    <script src="{{asset('assets/backend/files/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/assets/pages/data-table/js/jszip.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/assets/pages/data-table/js/data-table-custom.js')}}"></script>
    <script src="{{asset('assets/backend/files/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

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
        function getTestimonial(id, title, description, designation, company, image,image_path , url, status)
        {
            if(url == '')
            {
                url = "#";
            }

            if(description == '')
            {
                description = "<div class='alert alert-warning text-center'>No description found</div>";
            }

            if(company == '')
            {
                designation = `${designation}`;
            }else{
                designation = `${designation}, ${company}`;
            }

            if(status == "active"){
                status = "<span class='badge badge-success' style='font-size:55%!important;padding: .2125rem .375rem!important;'>Enabled</span>"
            }

            if(status == "inactive"){
                status = "<span class='badge badge-danger' style='font-size:55%!important;padding: .2125rem .375rem!important;'>Disabled</span>"
            }

            title = `${title} - ${status}`;
            image = `<img src="${image_path}/${image}" style='width:150px'>`;

            document.getElementById("testimonial-title").innerHTML = title;
            document.getElementById("testimonial-image").innerHTML = image;
            document.getElementById("testimonial-description").innerHTML = description;
            document.getElementById("testimonial-designation").innerHTML = designation;

            $('#modal_default').modal('show');
        }
    </script>
@endpush
