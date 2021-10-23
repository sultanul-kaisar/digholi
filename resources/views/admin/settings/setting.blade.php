@extends('admin.layouts.app')

@section('title', 'General Settings')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a>General Settings</li>
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
                            <div class="card">
                                <div class="card-header">
                                    <h5>General Settings</h5>
                                    <div class="card-header-right col-md-9">
                                        <a type="button" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right" onclick="event.preventDefault();document.getElementById('submit-general').submit();"><i class="ti-save"></i>Save</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="submit-general" action="{{ route('admin.system.general.store')}}">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Site Title</label>
                                            <div class="col-lg-10">
                                                <input type="text" name="site_title" class="form-control @error('site_title') is-invalid @enderror" placeholder="Site Title" value="{{ old('site_title', get_setting('site_title')) }}">
                                                @error('site_title')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Site Tagline</label>
                                            <div class="col-lg-10">
                                                <input type="text" name="site_tagline" class="form-control @error('site_tagline') is-invalid @enderror" placeholder="Site Tagline" value="{{ old('site_tagline', get_setting('site_tagline')) }}">
                                                @error('site_tagline')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Site URL</label>
                                            <div class="col-lg-10">
                                                <input type="text" name="site_url" class="form-control @error('site_url') is-invalid @enderror" placeholder="Site URL" value="{{ old('site_url', get_setting('site_url')) }}">
                                                @error('site_url')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Site Description</label>
                                            <div class="col-lg-10">
                                                <textarea name="site_description" class="form-control @error('site_description') is-invalid @enderror" cols="30" rows="10" placeholder="Site Description">{{ old('site_description', get_setting('site_description')) }}</textarea>
                                                @error('site_description')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Local -->
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <h5 class="card-title">Local Settings</h5>
                                    <div class="header-elements">
                                        <a type="button" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right" onclick="event.preventDefault();document.getElementById('submit-local').submit();"><i class="ti-save"></i>Save Local</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form method="POST" id="submit-local" action="{{ route('admin.system.local.store')}}">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Site Timezone</label>
                                            <div class="col-lg-10">
                                                <select name="site_time_zone" class="form-control timezone-select @error('site_time_zone') is-invalid @enderror">
                                                    <option value="">Select Timezone</option>
                                                    <option value="Asia/Dhaka" {{ (old('site_time_zone', get_setting('site_time_zone') == "Asia/Dhaka")) ? 'selected=selected' : ''}}>Asia/Dhaka</option>
                                                    <option value="Asia/Kolkata" {{ (old('site_time_zone', get_setting('site_time_zone') == "Asia/Kolkata")) ? 'selected=selected' : ''}}>Asia/Kolkata</option>
                                                    <option value="Asia/Karachi" {{ (old('site_time_zone', get_setting('site_time_zone') == "Asia/Karachi")) ? 'selected=selected' : ''}}>Asia/Karachi</option>
                                                    <option value="Asia/Kathmandu" {{ (old('site_time_zone', get_setting('site_time_zone') == "Asia/Kathmandu")) ? 'selected=selected' : ''}}>Asia/Kathmandu</option>
                                                    <option value="Asia/Colombo" {{ (old('site_time_zone', get_setting('site_time_zone') == "Asia/Colombo")) ? 'selected=selected' : ''}}>Asia/Colombo</option>
                                                    <option value="Asia/Thimbu" {{ (old('site_time_zone', get_setting('site_time_zone') == "Asia/Thimbu")) ? 'selected=selected' : ''}}>Asia/Thimbu</option>
                                                </select>
                                                @error('site_time_zone')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Site Date Format</label>
                                            <div class="col-lg-10">
                                                <input type="text" name="site_date_format" class="form-control @error('site_date_format') is-invalid @enderror" placeholder="Site Date Formate: F j, Y g:i a" value="{{ old('site_date_format', get_setting('site_date_format')) }}">
                                                @error('site_date_format')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Site Logo -->
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <h5 class="card-title">Site Logo</h5>
                                    <div class="header-elements">
                                        <a type="button" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right" onclick="event.preventDefault();document.getElementById('submit-logo').submit();"><i class="ti-save"></i>Save Site Logo</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form method="POST" id="submit-logo" action="{{ route('admin.system.logo.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Site Logo</label>
                                            <div class="col-lg-10">
                                                <input type="file" name="site_logo" class="form-control-uniform-custom @error('site_logo') is-invalid @enderror" placeholder="Site Logo">
                                                @error('site_logo')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label class="col-form-label">Width</label>
                                                <input type="text" name="site_logo_width" class="form-control @error('site_logo_width') is-invalid @enderror" placeholder="Site Logo Width: 300" value="{{ old('site_logo_width') }}">
                                                @error('site_logo_width')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label class="col-form-label">Height</label>
                                                <input type="text" name="site_logo_height" class="form-control @error('site_logo_height') is-invalid @enderror" placeholder="Site Logo Height: 150" value="{{ old('site_logo_height') }}">
                                                @error('site_logo_height')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="">
                                                <img src="{{ asset('storage/uploads/settings/frontend/'. get_setting('site_logo') ) }}" class="img-fluid">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Site Admin Logo -->
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <h5 class="card-title">Site Admin Logo</h5>
                                    <div class="header-elements">
                                        <a type="button" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right" onclick="event.preventDefault();document.getElementById('submit-admin-logo').submit();"><i class="ti-save"></i>Save Admin Logo</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form method="POST" id="submit-admin-logo" action="{{ route('admin.system.admin-logo.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Site Admin Logo</label>
                                            <div class="col-lg-10">
                                                <input type="file" name="site_admin_logo" class="form-control-uniform-custom @error('site_admin_logo') is-invalid @enderror" placeholder="site_admin_logo">
                                                @error('site_admin_logo')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label class="col-form-label">Width</label>
                                                <input type="text" name="site_logo_width" class="form-control @error('site_logo_width') is-invalid @enderror" placeholder="Site Logo Width: 300" value="{{ old('site_logo_width') }}">
                                                @error('site_logo_width')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label class="col-form-label">Height</label>
                                                <input type="text" name="site_logo_height" class="form-control @error('site_logo_height') is-invalid @enderror" placeholder="Site Logo Height: 150" value="{{ old('site_logo_height') }}">
                                                @error('site_logo_height')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="">
                                                <img src="{{ asset('storage/uploads/settings/backend/'. get_setting('site_admin_logo') ) }}" class="img-fluid">
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
