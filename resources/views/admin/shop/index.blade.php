@extends('admin.dashboard')


@section('title')
{{ config('app.name') }} | Admin Dashboard
@endsection

@section('shop')
active
@endsection

@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Admin Panel</a>
    <span class="breadcrumb-item active">All Shop</span>
</nav>
@endsection

@section('content')

<div class="row">
    <div class="col-3">
        <a style="border-radius:5px" class="btn btn-primary btn-block mg-b-10" href="{{ route('shops.create') }}">
            <span class="text-white">Add Shop</span>

        </a>
    </div>
</div>
<br>
<br>

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
@endif


@if (session('update'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
@endif

@if (session('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
@endif

@if (session('deny'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
@endif


<div class="row">

    @foreach ($shops as $shop)
    <div class="col-lg-4 col-md-6">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title text-center">{{ $shop->name }}</h6>
            <div class="card bd-0 ">
                <img class="card-img-top img-fluid" src="{{ asset('uploads/shop')}}/{{ $shop->image }}" alt="Image">
            </div>
        </div><!-- card -->
    </div>
    @endforeach


</div>



@endsection