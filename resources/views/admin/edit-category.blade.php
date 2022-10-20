@extends('layouts.theme')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h3 style="color: black">Edit Category Form</h3>
            <div>
                <a href="{{ route('indexCategory') }}"><button class="btn btn-danger">Back</button></a>
            </div>
        </div>
        <div class="card-body">
            <div class="example">
                <form method="post" action="{{ route('updateCategory') }}">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Category Name</label>
                            <input type="text" style="color: black" name="cateory_name"
                                value="{{ $category->category_name }}" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            @if ($errors->has('cateory_name'))
                                <span class="text-danger ">{{ $errors->first('cateory_name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-6">


                            <label for="image" class="col-sm-3 col-form-label" style="color:black"> Edit category
                                Icon:</label><br>
                            <input type="file" name="category_icon" class="myfrm form-control">

                            @if ($errors->has('category_icon'))
                                <span class="text-danger pl-3">{{ $errors->first('category_icon') }}</span>
                            @endif
                        </div>
                     
                        <div class="form-group col-md-4">
                            <img style="width:150px;height:160px; border:1px solid #000"
                                src="{{ !empty($category->category_icon) ? url('/upload/logo/' . $category->category_icon) : url('/upload/nofound.png') }}">

                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $category->id }}">   <br>
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
