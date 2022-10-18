@extends('layouts.theme')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h3 style="color: black">Edit Description Module</h3>
            <div>
                <a href="{{ route('indexDesModule') }}"><button class="btn btn-danger">Back</button></a>
            </div>
        </div>
        <div class="card-body">
            <div class="example">
                <form method="post" action="{{ route('updateDesModule') }}">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label"  style="color:black;">Description Name</label>
                            <input type="text" name="desc_name" value="{{ $description_module->desc_name }}"
                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @if ($errors->has('desc_name'))
                                <span class="text-danger ">{{ $errors->first('desc_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row prd-textarea">
                        <div class="mb-3 col-6">
                            <label for="exampleFormControlTextarea1" style="color:black;">Long Description</label><br><br>
                            <textarea name="long_desc" class="form-control" id="exampleFormControlTextarea1" rows="3">\{{ $description_module->long_desc }}</textarea>
                            @if ($errors->has('long_desc'))
                                <span class="text-danger">{{ $errors->first('long_desc') }}</span>
                            @endif
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{ $description_module->id }}">
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
