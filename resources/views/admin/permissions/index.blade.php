@extends('admin.layouts.app')

@section('title', 'Permission')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('permission.index')}}">Permissions</a> </li>
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
                                    <h4>All Permission</h4>
                                    <div class="card-header-right col-md-9">
                                        <a type="button" href="{{ route('permission.create') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right"><i class="fa fa-plus-circle"></i>New Permission</a>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    @if($pages->isEmpty())
                                        <div class="col-8 offset-2">
                                            <div class="text-center">
                                                <div class="alert alert-danger border-0 alert-dismissible">
                                                    <span class="font-weight-semibold">Oh snap!</span> No permission found. Please  <a href="{{ route('permission.create') }}" class="alert-link">try creating</a> new permission.
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @foreach($pages as $page)
                                        <div class="col-lg-4">
                                            <div class="card card-body custom-border-top" style="min-height:266px!important;">
                                                <div class="text-center">
                                                    <h4 class="mb-0 font-weight-bold">{{ ucwords($page->title) }}</h4>
                                                </div>
                                                <div class="card card-body bg-light mb-0">
                                                    @if($page->title == 'global')
                                                        <ul class="list list-unstyled mb-0">
                                                            <li><i class="fa fa-check-square-o"></i> {{ $page->title }}</li>
                                                        </ul>
                                                    @elseif($page->title == 'setting')
                                                        <ul class="list list-unstyled mb-0">
                                                            <li><i class="fa fa-check-square-o"></i> {{ $page->title }} view</li>
                                                            <li><i class="fa fa-check-square-o"></i> {{ $page->title }} edit</li>
                                                        </ul>
                                                    @else
                                                        <ul class="list list-unstyled mb-0">
                                                            <li><i class="fa fa-check-square-o"></i> {{ $page->title }} view</li>
                                                            <li><i class="fa fa-check-square-o"></i> {{ $page->title }} create</li>
                                                            <li><i class="fa fa-check-square-o"></i> {{ $page->title }} edit</li>
                                                            <li><i class="fa fa-check-square-o"></i> {{ $page->title }} delete</li>
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
