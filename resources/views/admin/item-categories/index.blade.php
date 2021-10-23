@extends('admin.layouts.app')

@section('title', 'Item Categories')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a> Item Category</li>
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
                                    <h5 class="card-title">All Item Categories</h5>
                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('item-category create'))
                                        <div class="card-header-right col-md-9">
                                            <a type="button" href="{{ route('item-category.create') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right"><i class="icofont icofont-plus-circle"></i> New Item Category</a>
                                        </div>
                                    @endif
                                </div>

                                <div class="page-body">
                                    <div class="card-block">
                                        <div class="table-responsive dt-responsive">
                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('item category edit') || auth()->user()->can('item category delete'))
                                                        <th>Action</th>
                                                    @endif
                                                    <th>Title</th>
                                                    <th>Slug</th>
                                                    <th>Parent Category</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($itemCategories as $itemCategory)
                                                    <tr>
                                                        @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('item category edit') || auth()->user()->can('item category delete'))
                                                            <td class="">
                                                                <div class="list-icons">
                                                                    <div class="dropdown">
                                                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                            <i class="ti-menu-alt"></i>
                                                                        </a>

                                                                        <div class="dropdown-menu dropdown-menu-right custom-dropdown-menu-right">
                                                                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('item category edit'))
                                                                                <a href="{{ route('item-category.edit', $itemCategory->id) }}" class="dropdown-item"><i class="ti-pencil-alt"></i> View / Edit</a>
                                                                            @endif

                                                                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('item category delete'))
                                                                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('delete-form{{$itemCategory->id}}').submit();"><i class="ti-trash"></i> Delete</a>
                                                                                <form id="delete-form{{$itemCategory->id}}" action="{{ route('item-category.destroy', $itemCategory->id) }}" method="POST" style="display: none;">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                </form>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @endif
                                                        <td>{{  $itemCategory->title }}</td>
                                                        <td>{{  $itemCategory->slug }}</td>
                                                        <td>
                                                            @if(!is_null($itemCategory->parent))
                                                                {{ $itemCategory->parent->title }}
                                                            @else
                                                                --
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($itemCategory->status == "active")
                                                                <span class="badge badge-success">Enabled</span>
                                                            @endif

                                                            @if($itemCategory->status == "inactive")
                                                                <span class="badge badge-danger">Disabled</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
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


@endpush

