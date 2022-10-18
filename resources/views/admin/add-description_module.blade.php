@extends('layouts.theme')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h3 style="color: black">Description Form</h3>
            <div>
                <a href="{{ route('indexDesModule') }}"><button class="btn btn-danger">Back</button></a>
            </div>
        </div>
        <div class="card-body">
            <div class="example">
                <form action="{{ route('storeDesModule') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black">Description
                                Name</label>
                            <input type="text" name="desc_name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('desc_name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row prd-textarea">

                        <div class="mb-3 col-6">
                            <label for="exampleFormControlTextarea1" style="color:black;">Long Description
                            </label><br>
                            <textarea name="long_desc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @if ($errors->has('long_desc'))
                                <span class="text-danger">{{ $errors->first('long_desc') }}</span>
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
