@extends('admin.layouts.app')

@section('title', 'Blogs')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a> Blog</li>
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
                                    <h5 class="card-title">All Blogs</h5>
                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('blog create'))
                                        <div class="card-header-right col-md-9">
                                            <a type="button" href="{{ route('blog.create') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right"><i class="icofont icofont-plus-circle"></i> Add Blog</a>
                                        </div>
                                    @endif
                                </div>

                                <div class="page-body">
                                    <div class="card-block">
                                        <div class="table-responsive dt-responsive">
                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('blog view') || auth()->user()->can('blog edit') || auth()->user()->can('blog delete'))
                                                        <th>Action</th>
                                                    @endif
                                                    <th>Title</th>
                                                    <th>Blogger's Name</th>
                                                    <th>Image</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($blogs as $blog)
                                                    <tr>
                                                        @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('blog view') || auth()->user()->can('blog edit') || auth()->user()->can('blog delete'))
                                                            <td class="">
                                                                <div class="list-icons">
                                                                    <div class="dropdown">
                                                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                            <i class="ti-menu-alt"></i>
                                                                        </a>

                                                                        <div class="dropdown-menu dropdown-menu-right custom-dropdown-menu-right">
                                                                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('blog view'))
                                                                                <a href="#" class="dropdown-item"
                                                                                   onclick="event.preventDefault();
                                                                                       getblog(
                                                                                       '{{ $blog->id }}',
                                                                                       '{{ $blog->title }}',
                                                                                       '{{ $blog->slug }}',
                                                                                       '{{ $blog->name }}',
                                                                                       '{{ $blog->blog_category->title }}',
                                                                                       '{{ $blog->description }}',
                                                                                       '{{ $blog->image }}',
                                                                                       '{{ asset('public/storage/uploads/blogs/') }}',
                                                                                       '{{ $blog->meta_title }}',
                                                                                       '{{ $blog->meta_description }}',
                                                                                       '{{ $blog->meta_keyword }}',
                                                                                       '{{ $blog->status }}');
                                                                                       ">
                                                                                    <i class="ti-pencil-alt"></i> View</a>
                                                                            @endif

                                                                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('blog edit'))
                                                                                <a href="{{ route('blog.edit', $blog->id) }}" class="dropdown-item"><i class="ti-pencil-alt"></i> Edit</a>
                                                                            @endif

                                                                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('blog delete'))
                                                                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('delete-form{{$blog->id}}').submit();"><i class="ti-trash"></i> Delete</a>
                                                                                <form id="delete-form{{$blog->id}}" action="{{ route('blog.destroy', $blog->id) }}" method="POST" style="display: none;">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                </form>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @endif
                                                        <td>{{ $blog->title }}</td>
                                                        <td>{{ $blog->name }}</td>
                                                        <td style="width:20%;">
                                                            <a href="{{ asset('public/storage/uploads/blogs/'.$blog->image) }}" data-toggle="lightbox">
                                                                <img src="{{ asset('public/storage/uploads/blogs/'.$blog->image) }}" class="img-fluid" style="width: 50%!important;">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            {{ $blog->blog_category->title }}
                                                        </td>
                                                        <td>
                                                            @if($blog->status == "active")
                                                                <span class="badge badge-success">Enabled</span>
                                                            @endif

                                                            @if($blog->status == "inactive")
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
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>Image</th>
                                                                    <td id="blog-image"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Title</th>
                                                                    <td id="blog-title"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Slug</th>
                                                                    <td id="blog-slug"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Blogger's Name</th>
                                                                    <td id="blog-name"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Category</th>
                                                                    <td id="blog-category"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="white-space:pre-wrap; word-wrap:break-word" colspan="2" id="blog-description" class="text-justify"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Meta Title</th>
                                                                    <td id="blog-meta_title"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Meta Description</th>
                                                                    <td id="blog-meta_description"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Meta Keywords</th>
                                                                    <td id="blog-meta_keyword"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Status</th>
                                                                    <td id="blog-status"></td>
                                                                </tr>
                                                            </table>
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
        function getblog(id, title, slug, name, category, description, image, image_path , meta_title, meta_description, meta_keyword, status)
        {

            if(description == '')
            {
                description = "<div class='alert alert-warning text-center' >No description found</div>";
            }
            else {
                description = `
                <div class="row">
                    <div class="col-12">
                    ${description}
                    </div>
                </div>
                `;
            }

            if(status == "active"){
                status = "<span class='badge badge-success' style='padding: .2125rem .375rem!important;'>Enabled</span>"
            }

            if(status == "inactive"){
                status = "<span class='badge badge-danger' style='padding: .2125rem .375rem!important;'>Disabled</span>"
            }


            image = `<img src="${image_path}/${image}" style='width:150px'>`;

            document.getElementById("blog-title").innerHTML                = title;
            document.getElementById("blog-slug").innerHTML                 = slug;
            document.getElementById("blog-name").innerHTML                 = name;
            document.getElementById("blog-category").innerHTML             = category;
            document.getElementById("blog-description").innerHTML          = description;
            document.getElementById("blog-image").innerHTML                = image;
            document.getElementById("blog-meta_title").innerHTML           = meta_title;
            document.getElementById("blog-meta_description").innerHTML     = meta_description;
            document.getElementById("blog-meta_keyword").innerHTML         = meta_keyword;
            document.getElementById("blog-status").innerHTML               = status;

            $('#modal_default').modal('show');
        }
    </script>
@endpush

