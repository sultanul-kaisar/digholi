@extends('admin.layouts.app')

@section('title', 'Create Permission')

@section('content')
    <div class="page-header card"style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i>Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Create Permission</a> </li>
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
                                    <h4>Basic Content</h4>
                                    <div class="card-header-right col-md-9">
                                        <a type="button" href="{{ route('permission.index') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right  ml-2"><i class="ti-angle-double-left"></i> Back</a>
                                        <a href="#" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-md-right" onclick="event.preventDefault();document.getElementById('submit-form').submit();"><i class="ti-save "></i>Save</a>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="submit-form" action="{{ route('permission.store')}}">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Title ( <span class="text-danger">*</span> )</label>
                                            <div class="col-lg-10">
                                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                                                @error('title')
                                                <div class="text-danger mb-3">{{ $message }}</div>
                                                @enderror
                                                <span class="form-text text-justify text-muted" style="font-size:14px;">
                                                <span class="text-warning">**Hint: </span>
                                                only specify crud name.
                                                It will automatically generate all related permissions for the crud.
                                                e.g. If you want a crud for categories, just put "category" as CRUD name.
                                                It will generate follwing permissions for category: category view, category create, category edit, category delete
                                            </span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

