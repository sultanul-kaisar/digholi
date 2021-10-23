@extends('admin.layouts.app')

@section('title', 'Project')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a> Project</li>
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
                                    <h5 class="card-title">All Projects</h5>
                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('project create'))
                                        <div class="card-header-right col-md-9">
                                            <a type="button" href="{{ route('project.create') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right"><i class="icofont icofont-plus-circle"></i> Add Project</a>
                                        </div>
                                    @endif
                                </div>

                                <div class="page-body">
                                    <div class="card-block">
                                        <div class="table-responsive dt-responsive">
                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('project view') || auth()->user()->can('project edit') || auth()->user()->can('project delete'))
                                                        <th>Action</th>
                                                    @endif
                                                    <th>Title</th>
                                                    <th>Image</th>
                                                    <th>Video</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($projects as $project)
                                                    <tr>
                                                        @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('project view') || auth()->user()->can('project edit') || auth()->user()->can('project delete'))
                                                            <td class="">
                                                                <div class="list-icons">
                                                                    <div class="dropdown">
                                                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                            <i class="ti-menu-alt"></i>
                                                                        </a>

                                                                        <div class="dropdown-menu dropdown-menu-right custom-dropdown-menu-right">
                                                                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('project view'))
                                                                                <a href="#" class="dropdown-item"
                                                                                   onclick="event.preventDefault();
                                                                                       getproject(
                                                                                       '{{ $project->id }}',
                                                                                       '{{ $project->title }}',
                                                                                       '{{ $project->slug }}',
                                                                                       '{{ $project->project_category->title }}',
                                                                                       '{{ $project->description }}',
                                                                                       '{{ $project->image }}',
                                                                                       '{{ asset('public/storage/uploads/projects/') }}',
                                                                                       '{{ $project->url }}',
                                                                                       '{{ $project->meta_title }}',
                                                                                       '{{ $project->meta_description }}',
                                                                                       '{{ $project->meta_keyword }}',
                                                                                       '{{ $project->status }}');
                                                                                       ">
                                                                                    <i class="ti-pencil-alt"></i> View</a>
                                                                            @endif

                                                                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('project edit'))
                                                                                <a href="{{ route('project.edit', $project->id) }}" class="dropdown-item"><i class="ti-pencil-alt"></i> Edit</a>
                                                                            @endif

                                                                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('project delete'))
                                                                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('delete-form{{$project->id}}').submit();"><i class="ti-trash"></i> Delete</a>
                                                                                <form id="delete-form{{$project->id}}" action="{{ route('project.destroy', $project->id) }}" method="POST" style="display: none;">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                </form>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @endif
                                                        <td>{{ $project->title }}</td>
                                                        <td style="width:20%;">
                                                            <a href="{{ asset('public/storage/uploads/projects/'.$project->image) }}" data-toggle="lightbox">
                                                                <img src="{{ asset('public/storage/uploads/projects/'.$project->image) }}" class="img-fluid" style="width: 50%!important;">
                                                            </a>
                                                        </td>
                                                        <td style="width:20%;">
                                                            <iframe width="160" height="100"
                                                                    src="{{$project->url }}"
                                                                    title="{{ $project->title }}"
                                                                    frameborder="0"
                                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                    allowfullscreen>
                                                            </iframe>
                                                        </td>
                                                        <td>
                                                            {{ $project->project_category->title }}
                                                        </td>
                                                        <td>
                                                            @if($project->status == "active")
                                                                <span class="badge badge-success">Enabled</span>
                                                            @endif

                                                            @if($project->status == "inactive")
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
                                                                    <td id="project-image"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Video</th>
                                                                    <td id="project-url"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Title</th>
                                                                    <td id="project-title"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Slug</th>
                                                                    <td id="project-slug"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Category</th>
                                                                    <td id="project-category"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="white-space:pre-wrap; word-wrap:break-word" colspan="2" id="project-description" class="text-center"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Meta Title</th>
                                                                    <td id="project-meta_title"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Meta Description</th>
                                                                    <td id="project-meta_description"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Meta Keywords</th>
                                                                    <td id="project-meta_keyword"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Status</th>
                                                                    <td id="project-status"></td>
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
        function getproject(id, title, slug, category, description, image, image_path , url, meta_title, meta_description, meta_keyword, status)
        {
            if(url == '')
            {
                url = "#";
            }

            if(description == '')
            {
                description = "<div class='alert alert-warning text-center'>No description found</div>";
            }

            if(status == "active"){
                status = "<span class='badge badge-success' style='padding: .2125rem .375rem!important;'>Enabled</span>"
            }

            if(status == "inactive"){
                status = "<span class='badge badge-danger' style='padding: .2125rem .375rem!important;'>Disabled</span>"
            }

            url = `<iframe width="150" height="120"
                        src="${url}"
                        title="${title}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>`;
            image = `<img src="${image_path}/${image}" style='width:150px'>`;

            document.getElementById("project-title").innerHTML                = title;
            document.getElementById("project-slug").innerHTML                 = slug;
            document.getElementById("project-category").innerHTML             = category;
            document.getElementById("project-description").innerHTML          = description;
            document.getElementById("project-image").innerHTML                = image;
            document.getElementById("project-url").innerHTML                  = url;
            document.getElementById("project-meta_title").innerHTML           = meta_title;
            document.getElementById("project-meta_description").innerHTML     = meta_description;
            document.getElementById("project-meta_keyword").innerHTML         = meta_keyword;
            document.getElementById("project-status").innerHTML               = status;

            $('#modal_default').modal('show');
        }
    </script>

@endpush

