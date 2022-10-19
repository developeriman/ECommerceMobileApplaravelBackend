@extends('layouts.theme')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h3 style="color: black">Info Module Form</h3>
            <div>
                <a href="{{ route('indexInfoModule') }}"><button class="btn btn-danger">Back</button></a>
            </div>
        </div>
        <div class="card-body">
            <div class="example">
                <form action="{{ route('storeInfoModule') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black"> Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black"> Publisher</label>
                            <input type="text" name="publisher" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('publisher'))
                                <span class="text-danger">{{ $errors->first('publisher') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black">Developer Name</label>
                            <input type="text" name="developer" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('developer'))
                                <span class="text-danger">{{ $errors->first('developer') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black">Relase Date</label>
                            <input type="date" name="relase_date" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('relase_date'))
                                <span class="text-danger">{{ $errors->first('relase_date') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black">Platform Name</label>
                            <input type="text" name="platform" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('platform'))
                                <span class="text-danger">{{ $errors->first('platform') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black">Region Name</label>
                            <input type="text" name="region" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('region'))
                                <span class="text-danger">{{ $errors->first('region') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="row">
                           <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black">Related Link</label>
                            <input type="text" name="related_link" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('related_link'))
                                <span class="text-danger">{{ $errors->first('related_link') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 col-6">
                            <button type="submit" class="btn btn-primary ml-3">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
