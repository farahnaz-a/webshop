@extends('shop_owner.dashboard')


@section('title')
{{ config('app.name') }} | User Dashboard
@endsection

{{-- @section('shop')
active
@endsection --}}

@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('shop_owner.dashboard') }}">Dashboard</a>
    <span class="breadcrumb-item active">User Profile</span>
</nav>

@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Shop Details</h5>
                <table class="table table-striped table responsive">
                    <tbody>
                        <tr>
                            <th>Thumbnail</th>
                            <td>
                                <img width="200px;" class="img-fluid text-center"
                                src="{{ asset('uploads/shop') }}/{{ $shop->image }}" >
                            </td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>
                                {{ $shop->owner_name }}
                            </td>
                        </tr>
                        <tr>
                            <th> API SECRET</th>
                            <td>
                                {{ $shop->token }}
                            </td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>
                                {{ $shop->phone_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>Shop Name</th>
                            <td>
                                {{ $shop->shop_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>Domain Name</th>
                            <td>
                                {{ $shop->domain_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>
                                {{ $shop->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>Shop Details</th>
                            <td>
                                {{ $shop->details }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-info" data-toggle="modal" data-target="#editShop">Edit info</button>
            </div>
        </div>
    </div>
</div>


<!-- Shop Edit Modal -->
<div class="modal fade" id="editShop" tabindex="-1" role="dialog" aria-labelledby="editShopTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Shop Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('shopDetails.update',$shop->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <label class="col-sm-4 form-control-label" id="woner_name">
                            Owner Name:<span class="tx-danger">*</span>
                        </label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" for="owner_name" name="owner_name" class="form-control" value="{{ $shop->owner_name }}">
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
                            <input type="text" for="shop_name" name="shop_name" class="form-control" value="{{ $shop->shop_name }}">
                        </div>
                        @error('shop_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                        <!-- row -->
                
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label" id="email">Email:<span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input for="email" name="email" type="text" class="form-control" value="{{ $shop->email }}">
                        </div>
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label" for="phone_number">Phone: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input for="phone_number" name="phone_number" type="text" class="form-control" value="{{ $shop->phone_number }}" >
                        </div>
                        @error('phone_number')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label" id="address">Address:<span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input for="address" name="address" type="text" class="form-control" value="{{ $shop->address }}">
                        </div>
                        @error('address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label" id="domain_name">Domain Name: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input for="domain_name" name="domain_name" type="text" class="form-control" value="{{ $shop->domain_name }}">
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
                        <label class="col-sm-4 form-control-label" id="image">
                        </label>

                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <img class="img-fluid" src="{{ asset('uploads/shop') }}/{{ $shop->image }}" alt="Thumbnail">
                        </div>
                        
                    </div>
                   
                
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label" id="details">Details:<span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <textarea for="details" name="details" rows="4" class="form-control"> {{ $shop->details }}</textarea>
                        </div>
                        @error('details')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                
                    <div class="form-layout-footer mg-t-30 text-right">
                        <button type="submit" class="btn btn-info mg-r-5">Submit Form</button>
                    </div><!-- form-layout-footer -->
    
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>

@endsection

