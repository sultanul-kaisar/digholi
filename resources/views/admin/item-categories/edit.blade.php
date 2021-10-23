@extends('admin.layouts.app')

@section('title', $itemCategory->title)

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a> Item Category</li>
                        <span class="breadcrumb-item active">{{ $itemCategory->title }}</span>
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
                                    <h5 class="card-title">{{ $itemCategory->title }}</h5>
                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('item category create'))
                                        <div class="card-header-right col-md-9">
                                            <a type="button" href="{{ route('item-category.index') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right  ml-2"><i class="ti-angle-double-left"></i> Back</a>
                                            <a href="#" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-md-right" onclick="event.preventDefault();document.getElementById('submit-form').submit();"><i class="ti-save "></i>Update</a>                                        </div>
                                    @endif
                                </div>

                                <div class="page-body">
                                    <div class="card-block">
                                        <form method="POST" id="submit-form" action="{{ route('item-category.update', $itemCategory->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Parent Category</label>
                                                <div class="col-lg-10">
                                                    <select name="parent_id" class="form-control select-search @error('parent_id') is-invalid @enderror">
                                                        <option value="">Select Parent Category</option>

                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" {{ (old('parent_id', $itemCategory->parent_id) == $category->id ) ? 'selected=selected':''}}>{{ $category->title }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('parent_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Active Status ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-10">
                                                    <select name="status" class="form-control select-search @error('status') is-invalid @enderror">
                                                        <option value="active" {{ (old('status', $itemCategory->status) == 'active' ) ? 'selected=selected':''}}>Enabled</option>
                                                        <option value="inactive" {{ (old('status', $itemCategory->status) == 'inactive' ) ? 'selected=selected':''}}>Disabled</option>
                                                    </select>
                                                    @error('status')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Title ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" onkeyup="titleSlug(this.value)" placeholder="Category Title" value="{{ old('title', $itemCategory->title) }}">
                                                    @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Slug ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-10">
                                                    <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" value="{{ old('slug', $itemCategory->slug) }}">
                                                    @error('slug')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Image</label>
                                                <div class="col-lg-10">
                                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                                    @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            @if(!is_null($itemCategory->image))
                                                <div class="row mb-3">
                                                    <div class="col-8 offset-2">
                                                        <img src="{{ asset('storage/uploads/item-categories/'. $itemCategory->image) }}" class="img-fluid">
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Description</label>
                                                <div class="col-lg-10">
                                                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Description">{{ old('description', $itemCategory->description) }}</textarea>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="form-group row">
                                                <h5 class="card-title">Meta Informations</h5>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Meta Title</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="meta_title" class="form-control" placeholder="Meta Title" value="{{ old('meta_title', $itemCategory->meta_title) }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Meta Keywords</label>
                                                <div class="col-lg-10">
                                                    <textarea name="meta_keyword" class="form-control" cols="30" rows="5" placeholder="Meta Keywords">{{ old('meta_keyword', $itemCategory->meta_keyword) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Meta Description</label>
                                                <div class="col-lg-10">
                                                    <textarea name="meta_description" class="form-control" cols="30" rows="10" placeholder="Meta Description">{{ old('meta_description', $itemCategory->description) }}</textarea>
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

    <script>
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
