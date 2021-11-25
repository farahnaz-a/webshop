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
    <div class="col-lg-4 col-md-6 col-sm-12">
        <a style="border-radius:5px" class="btn btn-success btn-block mg-b-10" href="{{ route('shops.create') }}">
            <span class="text-white">+Add Shop</span>

        </a>
    </div>
</div>

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


{{-- @if (session('update'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif --}}

@if (session('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('delete') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('deny'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('deny') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


<div class="row ">

    @foreach ($shops as $shop)
    <div class="col-lg-4 col-sm-6" style="margin-top: 30px">

        <div class="card">
            <div class="card-header">
                <a href="{{ route('shops.show',$shop->id) }}">
                    <h3 class="card-body-title text-center">{{ $shop->shop_name }}</h3>
                </a>
            </div>
            <div class="card-body">
                <a href="{{ route('shops.show',$shop->id) }}">
                    <img style="object-fit: cover;" class="card-img-top img-fluid"
                        src="{{ asset('uploads/shop')}}/{{ $shop->image }}" alt="Image">
                </a>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('shops.show',$shop->id) }}" class="btn btn-primary btn-sm">View</a>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                    data-target="#delete">
                    Delete
                </button>
            </div>
        </div>

    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog"
        aria-labelledby="deleteTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     By deleting this shop you will delete all information and products which is belogs to this shop. <b>Are you sure?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="{{route('shops.destroy',$shop->id)}}" method="POST">
                        {{ method_field('DELETE') }}
                        @csrf
                        <a class="btn btn-danger" href="{{route('shops.destroy',$shop->id)}}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
    
                            <span>Delete</span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>



@endsection