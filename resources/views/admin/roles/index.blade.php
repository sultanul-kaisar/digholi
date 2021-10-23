@extends('admin.layouts.app')

@section('title', 'Roles')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i>Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a>All Roles</li>
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
                                    <h4>All Roles</h4>
                                    <div class="card-header-right col-md-9">
                                        <a type="button" href="{{ route('role.create') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right"><i class="fa fa-plus-circle"></i>New Role</a>
                                    </div>
                                </div>
                                <div class="page-body">
                                    <div class="card-block">
                                        <div class="table-responsive dt-responsive">
                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Name</th>
                                                    <th>Permissions</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($roles as $role)
                                                    <tr>
                                                        <td>
                                                            @if(auth()->user()->hasrole('developer'))
                                                                <div class="list-icons">
                                                                    <div class="dropdown">
                                                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                            <i class="ti-menu-alt"></i>
                                                                        </a>

                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a href="{{ route('role.edit', $role->id) }}" class="dropdown-item"><i class="ti-pencil-alt"></i> Edit</a>
                                                                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('delete-form{{$role->id}}').submit();"><i class="ti-trash"></i> Delete</a>
                                                                            <form id="delete-form{{$role->id}}" action="{{ route('role.destroy', $role->id) }}" method="POST" style="display: none;">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                @if($role->name == 'super admin')
                                                                    <span class="badge badge-danger">
                                    Modification restricted
                                </span>
                                                                @elseif($role->name == 'uncategorized')
                                                                    <span class="badge badge-danger">
                                        Modification restricted
                                    </span>
                                                                @else
                                                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('role edit') || auth()->user()->can('role delete'))
                                                                        <div class="list-icons">
                                                                            <div class="dropdown">
                                                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                                    <i class="ti-menu-alt"></i>
                                                                                </a>

                                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('role edit'))
                                                                                        <a href="{{ route('role.edit', $role->id) }}" class="dropdown-item"><i class="ti-pencil-alt"></i> Edit</a>
                                                                                    @endif

                                                                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('role delete'))
                                                                                        <a href="{{ route('admin.dashboard') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('delete-form{{$role->id}}').submit();"><i class="ti-trash"></i> Delete</a>
                                                                                        <form id="delete-form{{$role->id}}" action="{{ route('role.destroy', $role->id) }}" method="POST" style="display: none;">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                        </form>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <span class="badge badge-danger">
                                            Modification restricted
                                        </span>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td>{{ ucfirst($role->name) }}</td>
                                                        <td>
                                                            @if($role->permissions->isEmpty())
                                                                <span class="badge badge-danger mb-2" style="font-size: 12px;">
                                    No permissions
                                </span>
                                                            @else
                                                                @foreach($role->permissions as $permission)
                                                                    <span class="badge badge-success mb-2" style="font-size: 12px;">
                                        {{ str_replace(['-', '_'], ' ', $permission->name) }}
                                    </span>
                                                                @endforeach
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

@endpush
