@extends('admin.layouts.app')

@section('title', 'Cover Photos')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a>Cover Photos</li>
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
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="tile">
                                                <form action="#" method="POST" enctype="multipart/form-data">
                                                    <div class="tile-title-md">Profile image</div>
                                                    <div class="profile-image-section mx-auto text-center">
                                                        <img src="{{ asset('public/storage/uploads/cover_photos/'.$cover_photo->index) }}" alt="Profile Image" class="img-fluid">
                                                    </div>
                                                    <div class="tile-body">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="image">Image</label>
                                                            <input class="form-control @error('image') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="image" id="image" type="file" placeholder="Your image" value="{{ old('image') }}">
                                                            @error('image')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="tile-footer clearfix">
                                                        <button class="btn btn-primary float-right" type="submit">Save</button>
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
            </div>
        </div>
    </div>


@endsection
