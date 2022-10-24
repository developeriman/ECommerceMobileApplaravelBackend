@extends('layouts.theme')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h3 style="color: black">Edit Brand Form</h3>
            <div>
                <a href="{{ route('indexBrand') }}"><button class="btn btn-danger">Back</button></a>
            </div>
        </div>
        <div class="card-body">
            <div class="example">
                <form method="post" action="{{ route('updateBrand') }}">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label" style="color:black">Brand Name</label>
                            <input type="text" name="name" value="{{ $brand->name }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            @if ($errors->has('name'))
                                <span class="text-danger ">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                            <div class="mb-3 col-6">
                            <label for="category_name" class="control-label mb-1"></label>
                            <select id="category_name" class="form-control" name="category_id">Category Name
                                @foreach ($category as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $brand->category_id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <input type="hidden" name="id" value="{{ $brand->id }}">
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
