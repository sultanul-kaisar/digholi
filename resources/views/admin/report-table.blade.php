@extends('admin.layouts.app')

@section('title', 'Report Table')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                            <a href="{{route('report-table')}}"><i class="feather icon-table"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Report Table</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="card-block">
                    <button type="button" id="form-input-btn" class="btn btn-primary m-b-20">Submit Form</button>
                    <div class="dt-responsive table-responsive">
                        <table id="form-input-table" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>
                                        <input type="text" class="form-control" id="row-1-age" name="row-1-age" value="61">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="row-1-position" name="row-1-position" value="System Architect">
                                    </td>
                                    <td>
                                        <select class="form-control" size="1" id="row-1-office" name="row-1-office">
                                            <option value="Edinburgh" selected="selected">
                                                Edinburgh
                                            </option>
                                            <option value="London">
                                                London
                                            </option>
                                            <option value="New York">
                                                New York
                                            </option>
                                            <option value="San Francisco">
                                                San Francisco
                                            </option>
                                            <option value="Tokyo">
                                                Tokyo
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>
                                        <input type="text" class="form-control" id="row-2-age" name="row-2-age" value="63">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="row-2-position" name="row-2-position" value="Accountant">
                                    </td>
                                    <td>
                                        <select size="1" class="form-control" id="row-2-office" name="row-2-office">
                                            <option value="Edinburgh">
                                                Edinburgh
                                            </option>
                                            <option value="London">
                                                London
                                            </option>
                                            <option value="New York">
                                                New York
                                            </option>
                                            <option value="San Francisco">
                                                San Francisco
                                            </option>
                                            <option value="Tokyo" selected="selected">
                                                Tokyo
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
    <script src="{{asset('assets/backend/files/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

@endpush
