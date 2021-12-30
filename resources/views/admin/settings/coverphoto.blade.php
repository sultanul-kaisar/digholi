@extends('admin.layouts.app')

@section('title', 'Cover Photos')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- @if(! empty($coverphotos)) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="tile">
                                <!-- <div class="tile-title-md">Index Photo</div> -->
                                <div class="profile-image-section mx-auto text-center">
                                    @php
                                        $index_src = empty($coverphotos->index_photo) ? '' : asset('public/storage/uploads/coverphotos/'. $coverphotos->index_photo);
                                    @endphp

                                    <img src="{{ $index_src }}" alt="" class="img-fluid">
                                </div>
                                <form action="{{ route('index-photo-update') }}" method="POST" enctype="multipart/form-data">
                                    <div class="tile-body">
                                        @csrf
                                        <div class="form-group">
                                            <label for="image">Index Photo</label>
                                            <input class="form-control @error('index_photo') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="index_photo" id="index_photo" type="file" placeholder="Your image" value="{{ old('index_photo') }}">
                                            @error('index_photo')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="tile-footer clearfix">
                                        <button class="btn btn-primary float-right" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="tile">
                                <!-- <div class="tile-title-md">About Photo</div> -->
                                <div class="profile-image-section mx-auto text-center">
                                    @php
                                        $about_src = empty($coverphotos->about_photo) ? '' : asset('public/storage/uploads/coverphotos/'. $coverphotos->about_photo);
                                    @endphp
                                    <img src="{{ $about_src }}" alt="" class="img-fluid">
                                </div>
                                <form action="{{ route('about-photo-update') }}" method="POST" enctype="multipart/form-data">
                                    <div class="tile-body">
                                        @csrf
                                        <div class="form-group">
                                            <label for="image">About Photo</label>
                                            <input class="form-control @error('about_photo') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="about_photo" id="about_photo" type="file" placeholder="Your image" value="{{ old('about_photo') }}">
                                            @error('about_photo')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="tile-footer clearfix">
                                        <button class="btn btn-primary float-right" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="tile">
                                <!-- <div class="tile-title-md">Team Photo</div> -->
                                <div class="profile-image-section mx-auto text-center">
                                    @php
                                        $team_src = empty($coverphotos->team_photo) ? '' : asset('public/storage/uploads/coverphotos/'. $coverphotos->team_photo);
                                    @endphp
                                </div>
                                <form action="{{ $team_src }}" method="POST" enctype="multipart/form-data">
                                    <div class="tile-body">
                                        @csrf
                                        <div class="form-group">
                                            <label for="image">Team Photo</label>
                                            <input class="form-control @error('team_photo') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="team_photo" id="team_photo" type="file" placeholder="Your image" value="{{ old('team_photo') }}">
                                            @error('team_photo')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="tile-footer clearfix">
                                        <button class="btn btn-primary float-right" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="tile">
                                <!-- <div class="tile-title-md">Service Photo</div> -->
                                <div class="profile-image-section mx-auto text-center">
                                    @php
                                        $service_src = empty($coverphotos->service_photo) ? '' : asset('public/storage/uploads/coverphotos/'. $coverphotos->service_photo);
                                    @endphp
                                </div>
                                <form action="{{ $service_src }}" method="POST" enctype="multipart/form-data">
                                    <div class="tile-body">
                                        @csrf
                                        <div class="form-group">
                                            <label for="image">Service Photo</label>
                                            <input class="form-control @error('service_photo') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="service_photo" id="service_photo" type="file" placeholder="Your image" value="{{ old('service_photo') }}">
                                            @error('service_photo')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="tile-footer clearfix">
                                        <button class="btn btn-primary float-right" type="submit">Save</button>
                                    </div>
                                </form>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="tile">
                            <!-- <div class="tile-title-md">Portfolio Photo</div> -->
                            <div class="profile-image-section mx-auto text-center">
                                @php
                                    $portfolio_src = empty($coverphotos->portfolio_photo) ? '' : asset('public/storage/uploads/coverphotos/'. $coverphotos->portfolio_photo);
                                @endphp
                            </div>
                            <form action="{{ $portfolio_src }}" method="POST" enctype="multipart/form-data">
                                <div class="tile-body">
                                    @csrf
                                    <div class="form-group">
                                        <label for="image">Portfolio Photo</label>
                                        <input class="form-control @error('portfolio_photo') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="portfolio_photo" id="portfolio_photo" type="file" placeholder="Your image" value="{{ old('portfolio_photo') }}">
                                        @error('portfolio_photo')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tile-footer clearfix">
                                    <button class="btn btn-primary float-right" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="tile">
                            <!-- <div class="tile-title-md">Gallery Photo</div> -->
                            <div class="profile-image-section mx-auto text-center">
                                @php
                                    $gallery_src = empty($coverphotos->gallery_photo) ? '' : asset('public/storage/uploads/coverphotos/'. $coverphotos->gallery_photo);
                                @endphp
                            </div>
                            <form action="{{ $gallery_src }}" method="POST" enctype="multipart/form-data">
                                <div class="tile-body">
                                    @csrf
                                    <div class="form-group">
                                        <label for="image">Gallery Photo</label>
                                        <input class="form-control @error('gallery_photo') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="gallery_photo" id="gallery_photo" type="file" placeholder="Your image" value="{{ old('gallery_photo') }}">
                                        @error('gallery_photo')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tile-footer clearfix">
                                    <button class="btn btn-primary float-right" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="tile">
                            <!-- <div class="tile-title-md">Blog Photo</div> -->
                            <div class="profile-image-section mx-auto text-center">
                                @php
                                    $blog_src = empty($coverphotos->blog_photo) ? '' : asset('public/storage/uploads/coverphotos/'. $coverphotos->blog_photo);
                                @endphp
                            </div>
                            <form action="{{ $blog_src }}" method="POST" enctype="multipart/form-data">
                                <div class="tile-body">
                                    @csrf
                                    <div class="form-group">
                                        <label for="image">Blog Photo</label>
                                        <input class="form-control @error('blog_photo') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="blog_photo" id="blog_photo" type="file" placeholder="Your image" value="{{ old('blog_photo') }}">
                                        @error('blog_photo')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tile-footer clearfix">
                                    <button class="btn btn-primary float-right" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="tile">
                            <!-- <div class="tile-title-md">Contact Photo</div> -->
                            <div class="profile-image-section mx-auto text-center">
                                @php
                                    $contact_src = empty($coverphotos->contact_photo) ? '' : asset('public/storage/uploads/coverphotos/'. $coverphotos->contact_photo);
                                @endphp
                            </div>
                            <form action="{{ $contact_src }}" method="POST" enctype="multipart/form-data">
                                <div class="tile-body">
                                    @csrf
                                    <div class="form-group">
                                        <label for="image">Contact Photo</label>
                                        <input class="form-control @error('contact_photo') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="contact_photo" id="contact_photo" type="file" placeholder="Your image" value="{{ old('contact_photo') }}">
                                        @error('contact_photo')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tile-footer clearfix">
                                    <button class="btn btn-primary float-right" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
        <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning clearfix">
                <span style="display: inline-block;position: relative;font-size: 15px;font-weight: 700;top: 8px;">
                    No Cover-photo found. Add new cover-photos...
                </span>
                        <button class="btn btn-primary float-right" type="submit">Save</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-6">
                        <div class="tile">
                            <div class="tile-title-md">Index Photo</div>
                            <div class="tile-body">
                                <div class="form-group">
                                    <label for="image">Index Photo</label>
                                    <input class="form-control @error('index_photo') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="index_photo" id="index_photo" type="file" placeholder="Your image" value="{{ old('index_photo') }}">
                                    @error('index_photo')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="tile">
                            <div class="tile-body">
                                <div class="form-group">
                                    <label for="image">About Photo</label>
                                    <input class="form-control @error('about_photo') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="about_photo" id="about_photo" type="file" placeholder="Your image" value="{{ old('about_photo') }}">
                                    @error('about_photo')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="tile">
                            <div class="tile-body">
                                <div class="form-group">
                                    <label for="image">Team Photo</label>
                                    <input class="form-control @error('team_photo') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="team_photo" id="team_photo" type="file" placeholder="Your image" value="{{ old('team_photo') }}">
                                    @error('team_photo')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="tile">
                            <div class="tile-body">
                                <div class="form-group">
                                    <label for="image">Service Photo</label>
                                    <input class="form-control @error('service_photo') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="service_photo" id="service_photo" type="file" placeholder="Your image" value="{{ old('service_photo') }}">
                                    @error('service_photo')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="tile">
                            <div class="tile-body">
                                <div class="form-group">
                                    <label for="image">Portfolio Photo</label>
                                    <input class="form-control @error('portfolio_photo') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="portfolio_photo" id="portfolio_photo" type="file" placeholder="Your image" value="{{ old('portfolio_photo') }}">
                                    @error('portfolio_photo')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="tile">
                            <div class="tile-body">
                                <div class="form-group">
                                    <label for="image">Gallery Photo</label>
                                    <input class="form-control @error('gallery_photo') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="gallery_photo" id="gallery_photo" type="file" placeholder="Your image" value="{{ old('gallery_photo') }}">
                                    @error('gallery_photo')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="tile">
                            <div class="tile-body">
                                <div class="form-group">
                                    <label for="image">Blog Photo</label>
                                    <input class="form-control @error('blog_photo') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="blog_photo" id="blog_photo" type="file" placeholder="Your image" value="{{ old('blog_photo') }}">
                                    @error('blog_photo')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="tile">
                            <div class="tile-body">
                                <div class="form-group">
                                    <label for="image">Contact Photo</label>
                                    <input class="form-control @error('contact_photo') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="contact_photo" id="contact_photo" type="file" placeholder="Your image" value="{{ old('contact_photo') }}">
                                    @error('contact_photo')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection
