@extends('shop_owner.dashboard')


@section('title')
{{ config('app.name') }} | Admin Dashboard
@endsection

@section('shop')
active
@endsection

@section('breadcrumb')
<div class="container">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-3">
                <button type="submit" style="border-radius:5px" class="btn btn-primary btn-block mg-b-10" href="">
                    <span class="text-white">Add Product</span>
                </button>
            </div>
        </div>
        @if (session('category_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('category_success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (session('product_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('product_success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Product Information</h5>
                        <div class="mb-2">
                            <label id="product_name">
                                Product Name:<span class="tx-danger">*</span>
                            </label>
                            <div>
                                <input type="text" for="product_name" name="product_name" class="form-control"
                                    placeholder="Product Name">
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
                                    placeholder="Product Description" rows="5"></textarea>

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
                            <div class="input-group-prepend d-block">
                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            </div>
                            <select name="size" required class="custom-select form-control" id="inputGroupSelect01">
                                <option>--Select--</option>
                                <option value="small">Small</option>
                                <option value="medium">Medium</option>
                                <option value="large">Large</option>
                            </select>
                            @error('size')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label id="price">
                                Price<span class="tx-danger">*</span>
                            </label>
                            <div>
                                <input type="text" for="price" name="price" class="form-control" placeholder="Price">
                            </div>
                            @error('price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div class="mb-2">
                    </div>
                </div>
            </div>

            {{-- Categories --}}
            <div class="col-lg-4 col-sm-6">
                <div class="card p-3" style="width: 18rem; ">
                    <div class="card-head">
                        <span>Category Name</span>
                    </div>
                    <div class="card-body">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                        </div>
                        <select name="category_id" class="custom-select form-control" id="inputGroupSelect01">
                            <option>--Select--</option>
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="vard-footer">
                        <!-- Button Category modal -->
                        <button type="button" class="btn btn-primary btn-sm " data-toggle="modal"
                            data-target="#caregoryModal" style="border-radius: 5px">
                            Add Category
                        </button>
                    </div>
                </div>
            </div>

            <input type="hidden" value="{{ $shop->id }}" name="shop_id">

            {{-- Extras --}}
            <div class="col-lg-4 col-sm-6">
                <div class="card p-3" style="width: 18rem;">
                    <div class="card-head">
                        <span>Extas</span>
                    </div>
                    <div class="card-body">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="extras">Options</label>
                        </div>
                        <select required name="extras_id" class="custom-select form-control" id="extras">
                            <option>--Select--</option>
                            @foreach ($extras as $item)
                            <option value="{{ $item->id }}">{{ $item->extras_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="-card-footer">
                        <!-- Button extras modal -->
                        <button type="button" class="btn btn-primary btn-sm " data-toggle="modal"
                            data-target="#extraModal" style="border-radius: 5px">
                            Add extras
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <!--Category Modal -->
    <div class="modal fade" id="caregoryModal" tabindex="-1" role="dialog" aria-labelledby="caregoryModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add a Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $shop->id }}" name="shop_id">
                    <div class="modal-body">
                        <div class="row">
                            <label class="col-sm-4 form-control-label" id="name">
                                Name:<span class="tx-danger">*</span>
                            </label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" required for="name" name="name" class="form-control"
                                    placeholder="Category name">
                            </div>
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <br>

                        <div class="row">
                            <label class="col-sm-4 form-control-label" id="image">
                                Image:<span class="tx-danger">*</span>
                            </label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="file" required for="image" name="image" class="form-control"
                                    placeholder="iamge">
                            </div>
                            @error('image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <!-- Extras Modal -->
    <div class="modal fade" id="extraModal" tabindex="-1" role="dialog" aria-labelledby="extraModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add a Extras</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('extras.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $shop->id }}" name="shop_id">
                    <div class="modal-body">
                        <div class="row">
                            <label class="col-sm-4 form-control-label" id="extras_name">
                                Name:<span class="tx-danger">*</span>
                            </label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" required for="extras_name" name="extras_name" class="form-control"
                                    placeholder="Extras name">
                            </div>
                            @error('extras_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-sm-4 form-control-label" id="price">
                                Price:<span class="tx-danger">*</span>
                            </label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" required for="price" name="price" class="form-control"
                                    placeholder="Enter The Price">
                            </div>
                            @error('price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection