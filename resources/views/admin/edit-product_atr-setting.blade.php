@extends('layouts.theme')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h3 style="color: black">Edit Product Attribute Value Form</h3>
            <div>
                <a href="{{ route('indexBrand') }}"><button class="btn btn-danger">Back</button></a>
            </div>
        </div>
        <div class="card-body">
            <div class="example">
                <form method="post" action="{{ route('updateSettingAttributes') }}">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label"  style="color: black">Product Attribute Value</label>
                            <input type="text" name="value" value="{{ $productAttributeValue->value }}"
                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @if ($errors->has('value'))
                                <span class="text-danger ">{{ $errors->first('value') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label"  style="color: black">Product Attribute Stock</label>
                            <input type="text" name="stock" value="{{ $productAttributeValue->stock }}"
                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @if ($errors->has('stock'))
                                <span class="text-danger ">{{ $errors->first('stock') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" style="color: black" class="form-label">Product Attribute Price</label>
                            <input type="text" name="price" value="{{ $productAttributeValue->price }}"
                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @if ($errors->has('price'))
                                <span class="text-danger ">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                        <div class="md-3 col-6">
                            <input type="hidden" name="id" value="{{ $productAttributeValue->id }}">
                            <button type="submit" class="btn btn-primary ml-3">Submit</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
