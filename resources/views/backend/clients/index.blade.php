@extends('backend.layouts.app')

@section('title', 'Clients')



@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a> Clients</li>
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
                                    <h5 class="card-title">All Clients</h5>
                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('client create'))
                                        <div class="card-header-right col-md-9">
                                            <a type="button" href="{{ route('client.create') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right"><i class="icofont icofont-user-alt-3"></i> New Client</a>
                                        </div>
                                    @endif
                                </div>

                                <div class="page-body">
                                    <div class="card-block">
                                        <div class="table-responsive dt-responsive">
                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">

                                                <div class="content" >
                                                    <thead>
                                                        <tr>
                                                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('client view') || auth()->user()->can('client edit') || auth()->user()->can('client delete'))
                                                            <th>Action</th>
                                                            @endif
                                                            <th>Title</th>
                                                            <th>Image</th>
                                                            <th>URL</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach($clients as $client)
                                                        <tr>
                                                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('client view') || auth()->user()->can('client edit') || auth()->user()->can('client delete'))
                                                                <td class="">
                                                                    <div class="list-icons">
                                                                        <div class="dropdown">
                                                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                                <i class="ti-menu-alt"></i>
                                                                            </a>

                                                                            <div class="dropdown-menu dropdown-menu-right custom-dropdown-menu-right">
                                                                                @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('client view'))
                                                                                    <a href="#" class="dropdown-item" onclick="event.preventDefault();getClient('{{ $client->id }}', '{{ $client->title }}', '{{ $client->image }}', '{{ asset('storage/uploads/clients/') }}', '{{ $client->url }}', '{{ $client->description }}', '{{ $client->status }}');"><i class="ti-pencil-alt"></i> View</a>
                                                                                @endif

                                                                                @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('client edit'))
                                                                                    <a href="{{ route('client.edit', $client->id) }}" class="dropdown-item"><i class="ti-pencil-alt"></i> Edit</a>
                                                                                @endif

                                                                                @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('client delete'))
                                                                                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('delete-form{{$client->id}}').submit();"><i class="ti-trash"></i> Delete</a>
                                                                                    <form id="delete-form{{$client->id}}" action="{{ route('client.destroy', $client->id) }}" method="POST" style="display: none;">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                    </form>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            @endif
                                                            <td>{{ $client->title }}</td>
                                                            <td style="width:15%;">
                                                                <a href="{{ asset('storage/uploads/clients/'.$client->image) }}" data-toggle="lightbox">
                                                                    <img src="{{ asset('storage/uploads/clients/'.$client->image) }}" class="img-fluid">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                @if(!is_null($client->url))
                                                                    <a class="font-weight-bolder" href="{{ $client->url }}"  target="_blank">Click here</a>
                                                                @else
                                                                    Not set
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($client->status == "active")
                                                                    <span class="badge badge-success">Enabled</span>
                                                                @endif

                                                                @if($client->status == "inactive")
                                                                    <span class="badge badge-danger">Disabled</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <!-- Basic modal -->
                                            <div id="modal_default" class="modal fade" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div id="client-image" class="text-center"></div>
                                                            <h5 class="modal-title d-block mt-2 text-center" id="client-title"></h5>
                                                            <hr>
                                                            <div id="client-description" class="text-justify"></div>
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
        function getClient(id, title, image,image_path , url, description, status)
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
                status = "<span class='badge badge-success' style='font-size:55%!important;padding: .2125rem .375rem!important;'>Enabled</span>"
            }

            if(status == "inactive"){
                status = "<span class='badge badge-danger' style='font-size:55%!important;padding: .2125rem .375rem!important;'>Disabled</span>"
            }

            url = `<a class="custom-link" href="${url}" target="_blank">${title}</a> - ${status}`;
            image = `<img src="${image_path}/${image}" style='width:150px'>`;

            document.getElementById("client-title").innerHTML = url;
            document.getElementById("client-image").innerHTML = image;
            document.getElementById("client-description").innerHTML = description;

            $('#modal_default').modal('show');
        }
    </script>
@endpush

