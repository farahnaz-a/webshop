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
    <span class="breadcrumb-item active">Add a Shop</span>
</nav>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
            <h6 class="card-body-title">Add a Shop</h6>
            <p class="mg-b-20 mg-sm-b-30">One Email can hold only one shop<span class="tx-danger">*</span></p>
            
            <form action="{{ route('shops.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
            <div class="row">
                <label class="col-sm-4 form-control-label" id="woner_name">
                    Owner Name:<span class="tx-danger">*</span>
                </label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" for="owner_name" name="owner_name" class="form-control" placeholder="Woner name">
                </div>
                @error('owner_name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label" id="shop_name">
                    Shop Name:<span class="tx-danger">*</span>
                </label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" for="shop_name" name="shop_name" class="form-control" placeholder="Shop name">
                </div>
                @error('shop_name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
                <!-- row -->

            <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label" id="email">Email:<span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input for="email" name="email" type="text" class="form-control" placeholder="Email">
                </div>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label" for="phone_number">Phone: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input for="phone_number" name="phone_number" type="text" class="form-control" placeholder="Phone">
                </div>
                @error('phone_number')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            
            <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label" id="address">Address:<span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input for="address" name="address" type="text" class="form-control" placeholder="Adddress">
                </div>
                @error('address')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label" id="domain_name">Domain Name: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input for="domain_name" name="domain_name" type="text" class="form-control" placeholder="Domain Name">
                </div>
                @error('domain_name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label" id="image">Shop Thumbnail:<span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <label class="custom-file">
                        <input for="image" name="image" type="file" id="file" class="custom-file-input">
                        <span class="custom-file-control"></span>
                      </label>
                </div>
                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label" id="details">Details:<span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <textarea for="details" name="details" rows="4" class="form-control" placeholder="Details"></textarea>
                </div>
                @error('details')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-layout-footer mg-t-30 text-right">
                <button type="submit" class="btn btn-info mg-r-5">Submit Form</button>
            </div><!-- form-layout-footer -->

            </form>
        </div><!-- card -->
    </div>
</div>

@endsection