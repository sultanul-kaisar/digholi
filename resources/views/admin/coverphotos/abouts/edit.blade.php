@extends('admin.layouts.app')
@push('css')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('title','index ' .$index->id)

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#"></a>Index Photo</li>
                        <span class="breadcrumb-item active">Index Photo {{ $index->id }}</span>
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
                                    <h4>index Photo {{ $index->id }}</h4>
                                    <div class="card-header-right col-md-9">
                                        <a type="button" href="{{ route('index.index') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right ml-2"><i class="ti-angle-double-left"></i> Back</a>
                                        <a href="#" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-md-right" onclick="event.preventDefault();document.getElementById('submit-form').submit();"><i class="ti-save "></i>Update</a>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="submit-form" action="{{ route('index.update', $index->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Active Status ( <span class="text-danger">*</span> )</label>
                                            <div class="col-lg-10">
                                                <select name="status" class="form-control select-search @error('status') is-invalid @enderror">
                                                    <option value="active" {{ (old('status', $index->status) == 'active' ) ? 'selected=selected':''}}>Enabled</option>
                                                    <option value="inactive" {{ (old('status', $index->status) == 'inactive' ) ? 'selected=selected':''}}>Disabled</option>
                                                </select>
                                                @error('status')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Title</label>
                                            <div class="col-lg-10">
                                                <textarea id="summernote" name="title" class="form-control" cols="30" rows="10" placeholder="Title">{{ old('title', $index->title) }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Image ( <span class="text-danger">*</span> )</label>
                                            <div class="col-lg-10">
                                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                                @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        @if(!is_null($index->image))
                                            <div class="row mb-3">
                                                <div class="col-9 offset-2">
                                                    <img src="{{ asset('public/storage/uploads/coverphotos/indexes/'. $index->image) }}" class="img-fluid" style="width:20%;">
                                                </div>
                                            </div>
                                        @endif
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

@push('js')

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 160
            });
        });
        function slugify(text)
        {
            return text
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/[&\/\\#@,+()$~%.'":*?<>{}]/g,'')              // Replace ?
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, '');            // Trim - from end of text
        }
    </script>

@endpush
