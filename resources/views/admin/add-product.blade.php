@extends('layouts.theme')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h3 style="color: black">Product Form</h3>
            <div>
                <a href="{{ route('indexProduct') }}"><button class="btn btn-danger">Back</button></a>
            </div>
        </div>
        <div class="card-body">
            <div class="example">
                <form action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black">Product Name</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('product_name'))
                                <span class="text-danger">{{ $errors->first('product_name') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 col-6">
                            <label for="brand_id" class="control-label mb-1" style="color:black">Brand Name</label>
                            <select id="brand_id" class="form-control" name="brand_id">
                                <option selected>Brand Name</option>
                                @foreach ($brand as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('brand_id'))
                                <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                            @endif
                        </div>

                    </div>


                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="seller_id" class="control-label mb-1" style="color:black">Selller Name</label>
                            <select id="seller_id" class="form-control" name="seller_id">
                                <option selected>Seller Name</option>
                                @foreach ($seller as $data)
                                    <option value="{{ $data->id }}">{{ $data->seller_name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('seller_id'))
                                <span class="text-danger">{{ $errors->first('seller_id') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 col-6">
                            <label for="info_id" class="control-label mb-1" style="color:black">Info Module Name</label>
                            <select id="info_id" class="form-control" name="info_id">
                                <option selected>Info Module</option>
                                @foreach ($info_module as $data)
                                    <option value="{{ $data->id }}">{{ $data->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('info_id'))
                                <span class="text-danger">{{ $errors->first('info_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                      
                        <div class="mb-3 col-6">
                            <label for="description_id" class="control-label mb-1" style="color:black">Info Module Name</label>
                            <select id="description_id" class="form-control" name="description_id">
                                <option selected>Description Module</option>
                                @foreach ($description_module as $data)
                                    <option value="{{ $data->id }}">{{ $data->desc_name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('description_id'))
                                <span class="text-danger">{{ $errors->first('description_id') }}</span>
                            @endif
                        </div>  
                    </div>

                    <div class="row">

                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black" style="color:black">Prodcut Image</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('product_image'))
                                <span class="text-danger">{{ $errors->first('product_image') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black" >Prodcut Banner
                                Image</label>
                            <input type="file" name="product_banner_image" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('product_banner_image'))
                                <span class="text-danger">{{ $errors->first('product_banner_image') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-12">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between">
                                    <h5 style="color: black;text-align:center">Product Variation</h5>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <button type="submit" class="btn btn-primary ml-3">Add Product Variation </button>

                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <button type="submit" class="btn btn-primary ml-3">Submit</button>

                            </div>
                        </div>

                </form>
            </div>
        </div>
    </div>
@endsection
