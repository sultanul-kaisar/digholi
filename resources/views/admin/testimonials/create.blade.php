@extends('admin.layouts.app')

@section('title', 'Testimonials')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a> Add Testimonials</li>
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
                                    <h4>Add Testimonial</h4>
                                    <div class="card-header-right col-md-9">
                                        <a type="button" href="{{ route('testimonial.index') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right ml-2"><i class="ti-angle-double-left"></i> Back</a>
                                        <a href="#" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-md-right" onclick="event.preventDefault();document.getElementById('submit-form').submit();"><i class="ti-save "></i>Save</a>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="submit-form" action="{{ route('testimonial.store')}}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Title ( <span class="text-danger">*</span> )</label>
                                            <div class="col-lg-10">
                                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Cient Title" value="{{ old('title') }}">
                                                @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Designation ( <span class="text-danger">*</span> )</label>
                                            <div class="col-lg-10">
                                                <input type="text" id="designation" name="designation" class="form-control @error('designation') is-invalid @enderror" placeholder="Designation" value="{{ old('designation') }}">
                                                @error('designation')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Company</label>
                                            <div class="col-lg-10">
                                                <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" placeholder="Company" value="{{ old('company') }}">
                                                @error('company')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
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

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Description</label>
                                            <div class="col-lg-10">
                                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10" placeholder="Description">{{ old('description') }}</textarea>
                                                @error('description')
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

@endpush
