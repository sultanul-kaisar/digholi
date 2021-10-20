@extends('backend.layouts.app')

@section('title', $comment->name)

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a>Edit Comment</li>
                        <span class="breadcrumb-item active">{{ $comment->name }}</span>
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
                                    <h5 class="card-title">{{ $comment->name }}</h5>
                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('comment create'))
                                        <div class="card-header-right col-md-9">
                                            <a type="button" href="{{ route('comment.index') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right ml-2"><i class="ti-angle-double-left"></i> Back</a>
                                            <a href="#" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-md-right" onclick="event.preventDefault();document.getElementById('submit-form').submit();"><i class="ti-save "></i>Save</a>                                        </div>
                                    @endif
                                </div>

                                <div class="page-body">
                                    <div class="card-block">
                                        <form method="POST" id="submit-form" action="{{ route('comment.update', $comment->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Active Status ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-10">
                                                    <select name="status" class="form-control select-search @error('status') is-invalid @enderror">
                                                        <option value="active" {{ (old('status', $comment->status) == 'active' ) ? 'selected=selected':''}}>Enabled</option>
                                                        <option value="inactive" {{ (old('status', $comment->status) == 'inactive' ) ? 'selected=selected':''}}>Disabled</option>
                                                    </select>
                                                    @error('status')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Name ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name', $comment->name) }}">
                                                    @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Body</label>
                                                <div class="col-lg-10">
                                                    <textarea name="body" class="form-control" cols="30" rows="10" placeholder="Body">{{ old('body', $comment->body) }}</textarea>
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
        $(document).ready(function() {
            $('.select-search').selectize({
                sortField: 'text'
            });
        });
    </script>


@endpush
