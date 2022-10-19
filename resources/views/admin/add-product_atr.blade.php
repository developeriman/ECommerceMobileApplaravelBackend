@extends('layouts.theme')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h3 style="color: black">Product Attribute Form</h3>
            <div>
                <a href="{{ route('ProductAttribute') }}"><button class="btn btn-danger">Back</button></a>
            </div>
        </div>
        <div class="card-body">
            <div class="example">
                <form action="{{ route('storeProductAttr') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black">Product Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 col-6">
                            <label for="seller_name" class="control-label mb-1">Seller Name</label>
                            <select id="seller_name" class="form-control" name="seller_id">
                                <option selected>Select Seller</option>
                                @foreach ($seller as $data)
                                    <option value="{{ $data->id }}">{{ $data->seller_name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('seller_name'))
                                <span class="text-danger">{{ $errors->first('seller_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">

                        <div class="mb-3 col-6">
                            <label for="desc_name" class="control-label mb-1">Seller Name</label>
                            <select id="desc_name" class="form-control" name="description_module_id">
                                <option selected>Description module</option>
                                @foreach ($description_module as $data)
                                    <option value="{{ $data->id }}">{{ $data->desc_name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('seller_name'))
                                <span class="text-danger">{{ $errors->first('desc_name') }}</span>
                            @endif
                        </div>

                         <div class="mb-3 col-6">
                            <label for="title" class="control-label mb-1">Title Name</label>
                            <select id="title" class="form-control" name="info_module_id">
                                <option selected>Title</option>
                                @foreach ($info_module as $data)
                                    <option value="{{ $data->id }}">{{ $data->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
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
