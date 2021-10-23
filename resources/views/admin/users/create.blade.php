@extends('admin.layouts.app')

@section('title', 'Add User')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a> Add User</li>
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
                                    <h4>Add User</h4>
                                    <div class="card-header-right col-md-9">
                                        <a type="button" href="{{ route('user.index') }}" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right ml-2"><i class="ti-angle-double-left"></i> Back</a>
                                        <a href="#" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-md-right" onclick="event.preventDefault();document.getElementById('submit-form').submit();"><i class="ti-save "></i>Save</a>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="submit-form" action="{{ route('user.store')}}">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Role ( <span class="text-danger">*</span> )</label>
                                            <div class="col-lg-10">
                                                <select name="role" id="role-select" class="form-control role-select">
                                                    <option value="">Select role</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->name }}" {{ (old('role') == $role->name) ? 'selected=selected' : '' }}>{{ $role->name }}</option>
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
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" value="{{ old('name') }}">
                                                @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Email ( <span class="text-danger">*</span> )</label>
                                            <div class="col-lg-10">
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}">
                                                @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Password ( <span class="text-danger">*</span> )</label>
                                            <div class="col-lg-10">
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                                @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <span class="form-text text-justify text-muted" style="font-size:14px;">
                                                    <span class="text-warning">**password hint: </span>
                                                    <span>
                                                        password must be 8 characters long &
                                                        at least contains one numeric value,
                                                        one uppercase letter,
                                                        one lowercase letter,
                                                        one special character,

                                                    </span>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Confirm Password ( <span class="text-danger">*</span> )</label>
                                            <div class="col-lg-10">
                                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password">
                                                @error('password_confirmation')
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
