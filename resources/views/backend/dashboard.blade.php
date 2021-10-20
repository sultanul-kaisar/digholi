@extends('backend.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
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
                                    <h5 class="card-title">Basic Statics</h5>
                                </div>

                                <div class="page-body">
                                    <div class="card-block">
                                        <div class="table-responsive dt-responsive">
                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr><th>Title</th>
                                                    <th>Total</th></tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>Projects</td>
                                                        <td>{{ $projects->count() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Blogs</td>
                                                        <td>{{ $blogs->count() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Galleries</td>
                                                        <td>{{ $galleries->count() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Clients</td>
                                                        <td>{{ $clients->count() }}</td>
                                                    </tr>
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
