@extends('layouts.theme')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h3 style="color: black">Edit Product Form</h3>
            <div>
                <a href="{{ route('indexProduct') }}"><button class="btn btn-danger">Back</button></a>
            </div>
        </div>
        <div class="card-body">
            <div class="example">
                <form method="post" action="{{ route('updateProduct') }}">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label" style="color:black">Product Name</label>
                            <input type="text" name="product_name" value="{{ $product->product_name }}"
                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @if ($errors->has('product_name'))
                                <span class="text-danger ">{{ $errors->first('product_name') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 col-6">
                            <label for="name" class="control-label mb-1" style="color: black">Brand Name</label>
                            <select id="name" class="form-control" name="brand_id">Brand Name
                                @foreach ($brand as $brand)
                                    <option value="{{ $brand->id }}"
                                        {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="seller_name" class="control-label mb-1" style="color: black">Seller Name</label>
                            <select id="seller_name" class="form-control" name="seller_id">Seller Name
                                @foreach ($seller as $seller)
                                    <option value="{{ $seller->id }}"
                                        {{ $seller->id == $product->seller_id ? 'selected' : '' }}>
                                        {{ $seller->seller_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label for="desc_name" class="control-label mb-1" style="color: black">Info Title</label>
                            <select id="title" class="form-control" name="info_id">Info Title
                                @foreach ($info_module as $info_module)
                                    <option value="{{ $info_module->id }}"
                                        {{ $info_module->id == $product->info_id ? 'selected' : '' }}>
                                        {{ $info_module->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            
                        <div class="mb-3 col-6">
                            <label for="desc_name" class="control-label mb-1" style="color:black">Descripton Name</label>
                            <select id="desc_name" class="form-control" name="description_id">Description Name
                                @foreach ($description_module as $description_module)
                                    <option value="{{ $description_module->id }}"
                                        {{ $description_module->id == $product->description_id ? 'selected' : '' }}>
                                        {{ $description_module->desc_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
