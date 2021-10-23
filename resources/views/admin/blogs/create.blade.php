@extends('admin.layouts.app')
@push('css')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('title', 'Add Blog')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a> Add Blogs</li>
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
                                    <h5 class="card-title">Add Blogs</h5>
                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('blog create'))
                                        <div class="card-header-right col-md-9">
                                            <a type="button" href="{{ route('blog.index') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right ml-2"><i class="ti-angle-double-left"></i> Back</a>
                                            <a href="#" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-md-right" onclick="event.preventDefault();document.getElementById('submit-form').submit();"><i class="ti-save "></i>Save</a>                                        </div>
                                    @endif
                                </div>

                                <div class="page-body">
                                    <div class="card-block">
                                        <form method="POST" id="submit-form" action="{{ route('blog.store')}}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Blog Category ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-9">
                                                    <select name="blog_category_id" id="" class="form-control select-search @error('blog_category_id') is-invalid @enderror">
                                                        <option value="">Select blog category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" {{ (old('blog_category_id') ==  $category->id) ? 'selected=selected':'' }}>{{ $category->title }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('blog_category_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Title ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" onkeyup="titleSlug(this.value)" placeholder="Title" value="{{ old('title') }}">
                                                    @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Slug ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-9">
                                                    <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" value="{{ old('slug') }}">
                                                    @error('slug')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Blogger's Name ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Blogger's Name" value="{{ old('name') }}">
                                                    @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Image</label>
                                                <div class="col-lg-9">
                                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                                    @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Description</label>
                                                <div class="col-lg-9">
                                                    <textarea id="summernote" name="description" class="form-control" cols="30" rows="10" placeholder="Description">{{ old('description') }}</textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Meta Title</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" placeholder="Meta title" value="{{ old('meta_title') }}">
                                                    @error('meta_title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Meta Keywords</label>
                                                <div class="col-lg-9">
                                                    <textarea name="meta_keyword" id="" cols="30" rows="5" class="form-control @error('meta_keyword') is-invalid @enderror" placeholder="Meta keywords">{{ old('meta_keyword') }}</textarea>
                                                    @error('meta_keyword')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Meta Description</label>
                                                <div class="col-lg-9">
                                                    <textarea name="meta_description" id="" cols="30" rows="10" class="form-control @error('meta_description') is-invalid @enderror" placeholder="Meta Description">{{ old('meta_description') }}</textarea>
                                                    @error('meta_description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
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

        function titleSlug(title)
        {
            var slug = slugify(title);
            slug = slug.toLowerCase();
            document.getElementById("slug").value = slug;
        }
    </script>

    <script>
        $(document).ready(function() {
            $('.select-search').selectize({
                sortField: 'text'
            });
        });
    </script>


@endpush
