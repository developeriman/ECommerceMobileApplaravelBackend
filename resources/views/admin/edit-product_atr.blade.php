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
                    <div class="row pl-3">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Product Attribute Name</label>
                            <input type="text" name="name" value="{{ $productAttribute->name }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            @if ($errors->has('name'))
                                <span class="text-danger ">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-6">
                            <label for="seller_name" class="control-label mb-1">Seller Name</label>
                            <select id="seller_name" class="form-control" name="seller_id">
                                @foreach ($seller as $seller)
                                    <option value="{{ $seller->id }}"
                                        {{ $seller->id == $productAttribute->seller_id ? 'selected' : '' }}>
                                        {{ $seller->seller_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row pl-3">
                        <div class="mb-3 col-6">
                            <label for="desc_name" class="control-label mb-1">Seller Name</label>
                            <select id="desc_name" class="form-control" name="description_module_id">
                                @foreach ($description_module as $description_module)
                                    <option value="{{ $description_module->id }}"
                                        {{ $description_module->id == $productAttribute->description_module_id ? 'selected' : '' }}>
                                        {{ $description_module->desc_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label for="title" class="control-label mb-1">Title </label>
                            <select id="title" class="form-control" name="info_module_id">
                                @foreach ($info_module as $info_module)
                                    <option value="{{ $info_module->id }}"
                                        {{ $info_module->id == $productAttribute->info_module_id ? 'selected' : '' }}>
                                        {{ $info_module->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{ $productAttribute->id }}">
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
