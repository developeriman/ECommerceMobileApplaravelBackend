@extends('layouts.theme')
@section('content')
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <h3 style="color: black">Edit Product Attribute Form</h3>
        <div>
            <a href="{{ route('indexBrand') }}"><button class="btn btn-danger">Back</button></a>
        </div>
    </div>
    <div class="card-body">
    <div class="example">
        <form method="post" action="{{ route('updateProductAttribute') }}">
            @csrf
            <div class="mb-3 col-6">
                <label for="exampleInputEmail1" class="form-label">Product Attribute Name</label>
                <input type="text" name="name" value="{{ $productAttribute->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @if($errors->has('name'))
                    <span class="text-danger ">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <input type="hidden" name="id" value="{{ $productAttribute->id }}">
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </form>
    </div>
    </div>
</div>
@endsection