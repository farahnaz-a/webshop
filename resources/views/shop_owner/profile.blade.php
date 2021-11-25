@extends('shop_owner.dashboard')


@section('title')
{{ config('app.name') }} | User Dashboard
@endsection

{{-- @section('dashboard')
active
@endsection --}}

@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('shop_owner.dashboard')}}">Dashboard</a>
    <span class="breadcrumb-item active">User Profile</span>
</nav>
@endsection

@section('content')

@if (session('upload_image'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('upload_image') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


@if (session('update_image'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('update_image') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


@if (session('update_info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('update_info') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


@if (session('update_pass'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('update_pass') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session('deny_pass'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('deny_pass') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif




<div class="row">
    <div class="col-md-4 mb-4 mb-md-0">
        <div class="card h-100 mx-auto" style="max-width: 22rem;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Update Profile Image</h5>
                <form class="d-flex flex-column h-100" action="{{ route('user.profileimage',Auth::user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        @if ($profileImage)
                        <div class="text-center">
                            <img width="70" height="70" src="{{ asset('uploads/userProfile') }}//{{ $profileImage->image }}"
                                alt="profie iamge" class="rounded-circle">
                        </div>
                        <br>
                        <br>
                        <label for="image">Change Image</label>
                        @else
                        <label for="image">Upload Image</label>
                        @endif
                        <input type="file" class="form-control" name="image" id="image">
                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-auto">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4 mb-md-0">
        <div class="card h-100 mx-auto" style="max-width: 22rem;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Update user info</h5>
                <form class="d-flex flex-column h-100" method="POST" action="{{ route('user.profileinfo',Auth::user()->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                    </div>
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                    </div>
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-auto">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 mx-auto" style="max-width: 22rem;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Update password</h5>
                <form class="d-flex flex-column" method="POST" action="{{ route('user.profilepassword') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" class="form-control" name="current_password" id="current_password">
                    </div>
                    @error('current_password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror


                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror


                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>
                    @error('password_confirmation')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-auto">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')

@endsection