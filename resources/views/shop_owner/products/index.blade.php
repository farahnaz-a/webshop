@extends('shop_owner.dashboard')


@section('title')
{{ config('app.name') }} | Admin Dashboard
@endsection

@section('shop')
active
@endsection

@section('breadcrumb')
<div class="container">
    <form action="">
        <div class="row">
            <div class="col-3">
                <button type="submit" style="border-radius:5px" class="btn btn-primary btn-block mg-b-10" href="">
                    <span class="text-white">Add Product</span>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Product Information</h5>

                        <div class="mb-2">
                            <label id="name">
                                Product Name:<span class="tx-danger">*</span>
                            </label>
                            <div>
                                <input type="text" for="name" name="name" class="form-control"
                                    placeholder="Product Name">
                            </div>
                            @error('name')
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
                            <select class="custom-select form-control" id="inputGroupSelect01">
                                <option value="" selected>--Select--</option>
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

            <div class="col-lg-4 col-sm-6">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div>
                            
                        </div>
                     <img src="" alt="">
                     <span>Category Name</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection