@extends('admin.layouts.app')

@section('title', 'Account Settings')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a> Account Settings</li>
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
                                    <div class="card-header">
                                        <h4>General Settings</h4>
                                        <div class="card-header-right col-md-9">
                                            <a href="#" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-md-right" onclick="event.preventDefault();document.getElementById('submit-general').submit();"><i class="ti-save "></i>Save</a>

                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <form method="POST" id="submit-general" action="{{ route('admin.my-account.general', auth()->user()->id)}}">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Full Name</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" value="{{ old('name', auth()->user()->name) }}">
                                                    @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Email</label>
                                                <div class="col-lg-10">
                                                    <input type="text" disabled class="form-control " value="{{ auth()->user()->email }}">
                                                    @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Avatar -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Avater Settings</h4>
                                        <div class="card-header-right col-md-9">
                                            <a href="#" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-md-right" onclick="event.preventDefault();document.getElementById('submit-avatar').submit();"><i class="ti-save "></i>Save Avater</a>

                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <form method="POST" id="submit-avatar" action="{{ route('admin.my-account.avatar', auth()->user()->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Upload File</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" placeholder="User avatar">
                                                    @error('avatar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Profile -->

                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile Settings</h4>
                                        <div class="card-header-right col-md-9">
                                            <a href="#" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-md-right" onclick="event.preventDefault();document.getElementById('submit-profile').submit();"><i class="ti-save "></i>Save Profile</a>

                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <form method="POST" id="submit-profile" action="{{ route('admin.my-account.profile', auth()->user()->id)}}">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Phone Number ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number" value="{{ (!is_null(auth()->user()->user_profile) ?  old('phone', auth()->user()->user_profile->phone) :  old('phone')) }}">
                                                    @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Address</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" value="{{ (!is_null(auth()->user()->user_profile) ?  old('address', auth()->user()->user_profile->address) :  old('address')) }}">
                                                    @error('address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Facebook</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" placeholder="Facebook profile url" value="{{ (!is_null(auth()->user()->user_profile) ?  old('facebook', auth()->user()->user_profile->facebook) :  old('facebook')) }}">
                                                    @error('facebook')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Twitter</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror" placeholder="Twitter profile url" value="{{ (!is_null(auth()->user()->user_profile) ?  old('twitter', auth()->user()->user_profile->twitter) :  old('twitter')) }}">
                                                    @error('twitter')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

{{--                                            <div class="form-group row">--}}
{{--                                                <label class="col-form-label col-lg-2">Instagram</label>--}}
{{--                                                <div class="col-lg-10">--}}
{{--                                                    <input type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" placeholder="Instagram profile url" value="{{ (!is_null(auth()->user()->user_profile) ?  old('instagram', auth()->user()->user_profile->instagram) :  old('instagram')) }}">--}}
{{--                                                    @error('instagram')--}}
{{--                                                    <div class="text-danger">{{ $message }}</div>--}}
{{--                                                    @enderror--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </form>
                                    </div>
                                </div>

                                <!-- Security -->

                                <div class="card">
                                    <div class="card-header">
                                        <h4>Password Settings</h4>
                                        <div class="card-header-right col-md-9">
                                            <a href="#" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-md-right" onclick="event.preventDefault();document.getElementById('submit-security').submit();"><i class="ti-save "></i>Save Password</a>

                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <form method="POST" id="submit-security" action="{{ route('admin.my-account.security', auth()->user()->id)}}">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Old Password ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-10">
                                                    <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Old password">
                                                    @error('old_password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">New Password ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-10">
                                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password">
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
                                                <label class="col-form-label col-lg-2">Confirm New Password ( <span class="text-danger">*</span> )</label>
                                                <div class="col-lg-10">
                                                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm New Password">
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
    </div>


@endsection
