@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a> {{ $user->name }}</li>
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
                                    <h4>Edit User</h4>
                                    <div class="card-header-right col-md-9">
                                        <a type="button" href="{{ route('user.index') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right ml-2"><i class="ti-angle-double-left"></i> Back</a>
                                        <a href="#" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-md-right" onclick="event.preventDefault();document.getElementById('submit-form').submit();"><i class="ti-save "></i>Update</a>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="submit-form" action="{{ route('user.update', $user->id)}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Role ( <span class="text-danger">*</span> )</label>
                                            <div class="col-lg-10">
                                                <select name="role" id="role-select" class="form-control role-select">
                                                    <option value="">Select role</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->name }}"  {{ (old('role') || $user->roles->contains($role->id)) ? 'selected' : '' }}>{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('role')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Full Name ( <span class="text-danger">*</span> )</label>
                                            <div class="col-lg-10">
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" value="{{ old('name', $user->name) }}">
                                                @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Email</label>
                                            <div class="col-lg-10">
                                                <input type="text" disabled class="form-control" value="{{ $user->email }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Active Status ( <span class="text-danger">*</span> )</label>
                                            <div class="col-lg-10">
                                                <select name="status" id="status-select" class="form-control status-select">
                                                    <option value="">Select Active Status</option>
                                                    <option value="active" {{ (old('status', $user->status) == 'active') ? 'selected=selected' : ''}}>Enable</option>
                                                    <option value="inactive" {{ (old('status', $user->status) == 'inactive') ? 'selected=selected' : ''}}>Disabled</option>
                                                    <option value="block" {{ (old('status', $user->status) == 'block') ? 'selected=selected' : ''}}>Block</option>
                                                </select>
                                                @error('status')
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
