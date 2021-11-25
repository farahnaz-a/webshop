@extends('admin.dashboard')


@section('title')
{{ config('app.name') }} | Admin Dashboard
@endsection

@section('shop')
active
@endsection

@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Dashboard</a>
    <span class="breadcrumb-item active">All Shop</span>
</nav>
@endsection

@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


{{-- @if (session('update'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{ session('update') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif --}}

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


<div class="row ">
    <div class="col-md-6 col-sm-12 mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Shop Details</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">
                        <img width="400px;" class="img-fluid text-center"
                            src="{{ asset('uploads/shop') }}/{{ $shop->image }}" alt="shop image">
                    </li>
                    <li class="list-group-item">
                        <strong>Owner Name:</strong> <span>{{ $shop->owner_name }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>API SECRET:</strong> <span>{{ $shop->token }}</span> <a
                            class="btn btn-info btn-sm text-right" onclick="alert('Are you sure?')"
                            href="{{ route('generate.api', $shop->id) }}">Generate new key</a>
                    </li>
                    <li class="list-group-item">
                        <strong>Owner Email:</strong> <span>{{ $shop->email }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Owner Email:</strong> <span>{{ $shop->phone_number }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Shop Name:</strong> <span>{{ $shop->shop_name }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Domain Name:</strong> <span>{{ $shop->domain_name }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Address:</strong> <span>{{ $shop->address }}</span>
                    </li>

                    <li class="list-group-item">
                        <strong>Shop Details:</strong>
                        <p>
                            {{ $shop->details }}
                        </p>
                    </li>
                </ul>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-info" data-toggle="modal" data-target="#editShop">Edit info</button>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <h4 class="text-center">API ROUTES</h4>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>API Call</th>
                    <th>Redirection</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <a target="_blank"
                            href="{{ URL::to('/') }}/shop-api/api={Your_token_here}">{{ URL::to('/') }}/shop-api/api={Your_token_here}</a>
                    </td>
                    <td>Redirects to your shop details</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <a target="_blank"
                            href="{{ URL::to('/') }}/shop-api/products/api={Your_token_here}">{{ URL::to('/') }}/shop-api/products/api={Your_token_here}</a>
                    </td>
                    <td>Redirects to your product lists</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <a target="_blank"
                            href="{{ URL::to('/') }}/shop-api/product/{Your_product_id}/api={Your_token_here}">{{ URL::to('/') }}/shop-api/product/{Your_product_id}/api={Your_token_here}</a>
                    </td>
                    <td>Redirects to your product details</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-12">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Extras</th>
                    <th scope="col">Size</th>
                    <th scope="col">Price</th>
                    <th scope="col">Details</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->product_name }}</td>


                    <td>
                        @foreach (extras($item->id) as $extra)
                        {{ $loop->index + 1 }}. {{ $extra->extra->extras_name}} <br>
                        @endforeach
                    </td>

                    <td>${{ $item->price}}</td>
                    <td>
                        <a class="">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#{{ $item->id }}Details">
                                Details
                            </button>
                        </a>
                    </td>
                    <td>

                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal"
                            data-target="#{{ $item->id }}Edit">
                            Edit
                        </button>

                    </td>
                    <td>
                        <form action="{{route('products.destroy',$item->id)}}" method="POST">
                            {{ method_field('DELETE') }}
                            @csrf
                            <a class="btn btn-sm btn-danger" href="{{route('products.destroy',$item->id)}}"
                                onclick="event.preventDefault(); this.closest('form').submit();">

                                <span>Delete</span>
                            </a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
                <form action="{{ route('shops.update',$shop->id) }}" method="POST" enctype="multipart/form-data">
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



@foreach ($product as $item)

<!--Details Modal -->
<div class="modal fade" id="{{ $item->id }}Details" tabindex="-1" role="dialog" aria-labelledby="detailsTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Product Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Prodict name</th>
                            <td>{{$item->product_name }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td>
                                <img src="{{ asset('uploads/product') }}/{{ $item->image }}" alt="" width="100">
                            </td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>
                                {{ $item->productCategories->name }}
                            </td>
                        </tr>

                        <tr>
                            <th>Details</th>
                            <td>
                                {{ $item->details }}
                            </td>
                        </tr>

                        <tr>
                            <th>Extras</th>
                            <td>
                                @foreach (extras($item->id) as $extra)
                                {{ $loop->index + 1 }}.{{ $extra->extra->extras_name}} <br>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>
                                {{ $item->price }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>




<!--Edit Modal -->
<div class="modal fade" id="{{ $item->id }}Edit" tabindex="-1" role="dialog" aria-labelledby="detailsTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Product Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('products.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="mb-2">
                        <label id="product_name">
                            Product Name:<span class="tx-danger">*</span>
                        </label>
                        <div>
                            <input type="text" for="product_name" name="product_name" class="form-control"
                                value="{{$item->product_name}}">
                        </div>
                        @error('product_name')product_name
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label id="details">
                            Product Description:<span class="tx-danger">*</span>
                        </label>
                        <div>
                            <textarea for="details" name="details" class="form-control"
                                placeholder="Product Description" rows="5">{{$item->details}}</textarea>

                        </div>
                        @error('details')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label id="image">
                            Image<span class="tx-danger">*</span>
                        </label>
                        <div>
                            <input type="file" for="image" name="image" class="form-control" placeholder="Image">
                        </div>
                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('uploads/product') }}/{{ $item->image }}" alt="" width="70%">
                    </div>



                    {{-- <div class="mb-2">
                        <div class="input-group-prepend d-block">
                            <label class="input-group-text" for="inputGroupSelect01">Select Size</label>
                        </div>
                        @if ($item->size != null)
                        <select name="size" required class="custom-select form-control" id="inputGroupSelect01">
                            <option value="{{ $item->size }}">{{ ucfirst($item->size)}}</option>
                    @if ($item->size != 'small')
                    <option value="small">Small</option>
                    @endif
                    @if ($item->size != 'medium')
                    <option value="medium">Medium</option>
                    @endif
                    @if ($item->size != 'large')
                    <option value="large">Large</option>
                    @endif
                    </select>
                    @else
                    <select name="size" required class="custom-select form-control" id="inputGroupSelect01">
                        <option>--No Size Selected--</option>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                    @endif

                    @error('size')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div> --}}

                <div class="mb-2">
                    <label id="price">
                        Price<span class="tx-danger">*</span>
                    </label>
                    <div>
                        <input type="text" for="price" name="price" class="form-control" value="{{ $item->price }}">
                    </div>
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-2">
                    <label id="price">
                        Price<span class="tx-danger">*</span>
                    </label>
                    <div>
                        <select name="category_id" class="custom-select form-control" id="inputGroupSelect01">

                            @foreach ($categories as $category)
                            @if ($category->id == $item->category_id)
                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif

                            @endforeach
                        </select>
                    </div>
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                <div class="mb-2">
                    <label id="price">
                        Extras
                    </label>
                    <div>
                        <select required multiple name="extras_id[]" class="custom-select form-control" id="extras">

                            @foreach (extras($item->id) as $extra)
                            <option selected value="{{ $extra->extra->id}}">{{ $extra->extra->extras_name}}</option>
                            @endforeach

                            @foreach ($extras as $product_extra)

                            @if (getProductExtras($item->id, $product_extra->id)->doesntExist())
                            <option value="{{ $product_extra->id }}">{{ $product_extra->extras_name }}</option>
                            @endif

                            @endforeach

                        </select>
                    </div>
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm " style="border-radius: 5px">
                Update
            </button>
        </div>
        </form>
    </div>
</div>
</div>
@endforeach

@endsection