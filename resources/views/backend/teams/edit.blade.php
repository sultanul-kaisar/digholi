@extends('backend.layouts.app')

@section('title', $team->title)

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a>Team </li>
                        <span class="breadcrumb-item active">{{ $team->title }}</span>
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
                                    <h5 class="card-title">{{ $team->title }}</h5>
                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('team edit'))
                                        <div class="card-header-right col-md-9">
                                            <a type="button" href="{{ route('team.index') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right ml-2"><i class="ti-angle-double-left"></i> Back</a>
                                            <a href="#" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-md-right" onclick="event.preventDefault();document.getElementById('submit-form').submit();"><i class="ti-save "></i>Save</a>                                        </div>
                                    @endif
                                </div>

                                <div class="page-body">
                                    <div class="card-block">
                                        <form method="POST" id="submit-form" action="{{ route('team.update', $team->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Active Status ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-9">
                                                    <select name="status" class="form-control select-search @error('status') is-invalid @enderror">
                                                        <option value="active" {{ (old('status', $team->status) == 'active' ) ? 'selected=selected':''}}>Enabled</option>
                                                        <option value="inactive" {{ (old('status', $team->status) == 'inactive' ) ? 'selected=selected':''}}>Disabled</option>
                                                    </select>
                                                    @error('status')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Team Department ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-9">
                                                    <select name="team_department_id" id="" class="form-control select-search @error('team_department_id') is-invalid @enderror">
                                                        <option value="">Select team department</option>
                                                        @foreach($departments as $department)
                                                            <option value="{{ $department->id }}" {{ (old('team_department_id', $team->team_department_id) ==  $department->id) ? 'selected=selected':'' }}>{{ $department->title }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('team_department_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Title ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" onkeyup="titleSlug(this.value)" placeholder="Team Member Name" value="{{ old('title', $team->title) }}">
                                                    @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Slug ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-9">
                                                    <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" value="{{ old('slug', $team->slug) }}">
                                                    @error('slug')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Image ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-9">
                                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                                    @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            @if(!is_null($team->image))
                                                <div class="row mb-4">
                                                    <div class="col-8 offset-3">
                                                        <img src="{{ asset('storage/uploads/teams/'. $team->image) }}" class="img-fluid">
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Address</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" value="{{ old('address', $team->address) }}">
                                                    @error('address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Phone</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" value="{{ old('phone', $team->phone) }}">
                                                    @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Email</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email', $team->email) }}">
                                                    @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">URL</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" placeholder="URL" value="{{ old('url', $team->url) }}">
                                                    @error('url')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Facebook</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" placeholder="Facebook profile link" value="{{ old('facebook', $team->facebook) }}">
                                                    @error('facebook')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Instagram</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" placeholder="Instagram profile link" value="{{ old('instagram', $team->instagram) }}">
                                                    @error('instagram')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Twitter</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror" placeholder="Twitter profile link" value="{{ old('twitter', $team->twitter) }}">
                                                    @error('twitter')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Description</label>
                                                <div class="col-lg-9">
                                                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Description">{{ old('description', $team->description) }}</textarea>
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
