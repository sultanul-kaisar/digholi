@extends('admin.layouts.app')

@section('title', 'Team Members')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a> Team Members</li>
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
                                    <h5 class="card-title">All Team Members</h5>
                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('team create'))
                                        <div class="card-header-right col-md-9">
                                            <a type="button" href="{{ route('team.create') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right"><i class="icofont icofont-plus-circle"></i> Add Team Members</a>
                                        </div>
                                    @endif
                                </div>

                                <div class="page-body">
                                    <div class="card-block">
                                        <div class="table-responsive dt-responsive">
                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('team view') || auth()->user()->can('team edit') || auth()->user()->can('team delete'))
                                                        <th>Action</th>
                                                    @endif
                                                    <th>Title</th>
                                                    <th>Image</th>
                                                    <th>Department</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($teams as $team)
                                                    <tr>
                                                        @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('team view') || auth()->user()->can('team edit') || auth()->user()->can('team delete'))
                                                            <td class="">
                                                                <div class="list-icons">
                                                                    <div class="dropdown">
                                                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                            <i class="ti-menu-alt"></i>
                                                                        </a>

                                                                        <div class="dropdown-menu dropdown-menu-right custom-dropdown-menu-right">
                                                                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('team view'))
                                                                                <a href="#" class="dropdown-item"
                                                                                   onclick="event.preventDefault();
                                                                                       getteam(
                                                                                       '{{ $team->id }}',
                                                                                       '{{ $team->title }}',
                                                                                       '{{ $team->slug }}',
                                                                                       '{{ $team->team_department->title }}',
                                                                                       '{{ $team->description }}',
                                                                                       '{{ $team->address }}',
                                                                                       '{{ $team->phone }}',
                                                                                       '{{ $team->email }}',
                                                                                       '{{ $team->image }}',
                                                                                       '{{ asset('storage/uploads/teams/') }}',
                                                                                       '{{ $team->url }}',
                                                                                       '{{ $team->facebook }}',
                                                                                       '{{ $team->instagram }}',
                                                                                       '{{ $team->twitter }}',
                                                                                       '{{ $team->status }}');
                                                                                       ">
                                                                                    <i class="ti-pencil-alt"></i> View</a>
                                                                            @endif

                                                                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('team edit'))
                                                                                <a href="{{ route('team.edit', $team->id) }}" class="dropdown-item"><i class="ti-pencil-alt"></i> Edit</a>
                                                                            @endif

                                                                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('team delete'))
                                                                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('delete-form{{$team->id}}').submit();"><i class="ti-trash"></i> Delete</a>
                                                                                <form id="delete-form{{$team->id}}" action="{{ route('team.destroy', $team->id) }}" method="POST" style="display: none;">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                </form>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @endif
                                                        <td>{{ $team->title }}</td>
                                                        <td style="width:15%;">
                                                            <a href="{{ asset('storage/uploads/teams/'.$team->image) }}" data-toggle="lightbox">
                                                                <img src="{{ asset('storage/uploads/teams/'.$team->image) }}" class="img-fluid" style="width: 50%!important;">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            {{ $team->team_department->title }}
                                                        </td>
                                                        <td>
                                                            @if($team->status == "active")
                                                                <span class="badge badge-success">Enabled</span>
                                                            @endif

                                                            @if($team->status == "inactive")
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
                                                                    <td id="team-image"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Title</th>
                                                                    <td id="team-title"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Slug</th>
                                                                    <td id="team-slug"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Department</th>
                                                                    <td id="team-department"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Address</th>
                                                                    <td id="team-address"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Phone</th>
                                                                    <td id="team-phone"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <td id="team-email"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>URL</th>
                                                                    <td id="team-url"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Facebook</th>
                                                                    <td id="team-facebook"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Instagram</th>
                                                                    <td id="team-instagram"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Twitter</th>
                                                                    <td id="team-twitter"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Status</th>
                                                                    <td id="team-status"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="white-space:pre-wrap; word-wrap:break-word" colspan="2" id="team-description" class="text-center"></td>
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
        function getteam(id, title, slug, department, description, address, phone, email, image, image_path , url, facebook, instagram, twitter, status)
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

            phone = `<a class="custom-link" href="tel:${phone}" target="_blank">${phone}</a>`;
            email = `<a class="custom-link" href="mailto:${email}" target="_blank">${email}</a>`;
            url = `<a class="custom-link" href="${url}" target="_blank">${url}</a>`;
            facebook = `<a class="custom-link" href="${facebook}" target="_blank">${facebook}</a>`;
            instagram = `<a class="custom-link" href="${instagram}" target="_blank">${instagram}</a>`;
            twitter = `<a class="custom-link" href="${twitter}" target="_blank">${twitter}</a>`;
            image = `<img src="${image_path}/${image}" style='width:150px'>`;

            document.getElementById("team-title").innerHTML         = title;
            document.getElementById("team-slug").innerHTML          = slug;
            document.getElementById("team-department").innerHTML    = department;
            document.getElementById("team-description").innerHTML   = description;
            document.getElementById("team-address").innerHTML       = address;
            document.getElementById("team-phone").innerHTML         = phone;
            document.getElementById("team-email").innerHTML         = email;
            document.getElementById("team-image").innerHTML         = image;
            document.getElementById("team-url").innerHTML           = url;
            document.getElementById("team-facebook").innerHTML      = facebook;
            document.getElementById("team-instagram").innerHTML     = instagram;
            document.getElementById("team-twitter").innerHTML       = twitter;
            document.getElementById("team-status").innerHTML        = status;

            $('#modal_default').modal('show');
        }
    </script>


@endpush

