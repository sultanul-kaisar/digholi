@extends('admin.layouts.app')

@section('title', 'SEO Settings')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a> SEO Settings</li>
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
                                <!-- General -->
                                <div class="card">
                                    <div class="card-header header-elements-inline">
                                        <h5 class="card-title">SEO Settings</h5>
                                        <div class="header-elements">
                                            <a type="button" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right" onclick="event.preventDefault();document.getElementById('submit-seo').submit();"><i class="ti-save"></i>Save SEO</a>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <form method="POST" id="submit-seo" action="{{ route('admin.system.seo.store')}}">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Meta Title</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="site_meta_title" class="form-control @error('site_meta_title') is-invalid @enderror" placeholder="Meta Title" value="{{ old('site_meta_title', get_setting('site_meta_title')) }}">
                                                    @error('site_meta_title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Meta Author</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="site_meta_author" class="form-control @error('site_meta_author') is-invalid @enderror" placeholder="Meta Author" value="{{ old('site_meta_author', get_setting('site_meta_author')) }}">
                                                    @error('site_meta_author')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Meta URL</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="site_meta_url" class="form-control @error('site_meta_url') is-invalid @enderror" placeholder="Meta URL" value="{{ old('site_meta_url', get_setting('site_meta_url')) }}">
                                                    @error('site_meta_url')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Site Type</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="site_meta_type" class="form-control @error('site_meta_type') is-invalid @enderror" placeholder="Site Type: website" value="{{ old('site_meta_type', get_setting('site_meta_type')) }}">
                                                    @error('site_meta_type')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Robot Text</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="site_meta_robot" class="form-control @error('site_meta_robot') is-invalid @enderror" placeholder="Robot Text: INDEX, FOLLOW" value="{{ old('site_meta_robot', get_setting('site_meta_robot')) }}">
                                                    @error('site_meta_robot')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Twitter Author</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="site_twitter_author" class="form-control @error('site_twitter_author') is-invalid @enderror" placeholder="Twitter Author: @username" value="{{ old('site_twitter_author', get_setting('site_twitter_author')) }}">
                                                    @error('site_twitter_author')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Twitter Card</label>
                                                <div class="col-lg-10">
                                                    <select name="site_twitter_card" class="form-control twitter-card-select @error('site_twitter_card') is-invalid @enderror">
                                                        <option value="">Select Twitter Card</option>
                                                        <option value="summary" {{ (old('site_twitter_card', get_setting('site_twitter_card') == "summary")) ? 'selected=selected' : ''}}>Summary</option>
                                                        <option value="summary_large_image" {{ (old('site_twitter_card', get_setting('site_twitter_card') == "summary_large_image")) ? 'selected=selected' : ''}}>Summary Large Image</option>
                                                        <option value="app" {{ (old('site_twitter_card', get_setting('site_twitter_card') == "app")) ? 'selected=selected' : ''}}>App</option>
                                                        <option value="player" {{ (old('site_twitter_card', get_setting('site_twitter_card') == "player")) ? 'selected=selected' : ''}}>Player</option>
                                                    </select>
                                                    @error('site_twitter_card')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Meta Keywords</label>
                                                <div class="col-lg-10">
                                                    <textarea name="site_meta_keyword" class="form-control @error('site_meta_keyword') is-invalid @enderror" cols="30" rows="5" placeholder="Meta keywords: keyword one, keyword two">{{ old('site_meta_keyword', get_setting('site_meta_keyword')) }}</textarea>
                                                    @error('site_meta_keyword')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Meta Description</label>
                                                <div class="col-lg-10">
                                                    <textarea name="site_meta_description" class="form-control @error('site_meta_description') is-invalid @enderror" cols="30" rows="10" placeholder="Meta Description">{{ old('site_meta_description', get_setting('site_meta_description')) }}</textarea>
                                                    @error('site_meta_description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- FB og:image -->
                                <div class="card">
                                    <div class="card-header header-elements-inline">
                                        <h5 class="card-title">Facebook OG Image</h5>
                                        <div class="header-elements">
                                            <a type="button" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right" onclick="event.preventDefault();document.getElementById('submit-og-image').submit();"><i class="ti-save"></i>Save</a>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <form method="POST" id="submit-og-image" action="{{ route('admin.seo.og.image')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Facebook OG Image</label>
                                                <div class="col-lg-10">
                                                    <input type="file" name="site_meta_image" class="form-control-uniform-custom @error('site_meta_image') is-invalid @enderror" placeholder="site_meta_image">
                                                    @error('site_meta_image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-8 offset-2">
                                                    <img src="{{ asset('storage/uploads/settings/backend/'. get_setting('site_meta_image') ) }}" class="img-fluid">
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
    </div>


@endsection
