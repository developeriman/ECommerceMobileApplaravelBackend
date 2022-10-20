@extends('layouts.theme')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h3 style="color: black">Category Form</h3>
            <div>
                <a href="{{ route('indexCategory') }}"><button class="btn btn-danger">Back</button></a>
            </div>
        </div>
        <div class="card-body">
            <div class="example">
                <form action="{{ route('storeCategory') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black">Category Name</label>
                            <input type="text" name="category_name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('category_name'))
                                <span class="text-danger">{{ $errors->first('category_name') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black">Category Icon</label>
                            <input type="file" name="category_icon" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('category_icon'))
                                <span class="text-danger">{{ $errors->first('category_icon') }}</span>
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
