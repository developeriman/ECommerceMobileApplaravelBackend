@extends('layouts.theme')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h3 style="color: black">Seller Form</h3>
            <div>
                <a href="{{ route('indexSeller') }}"><button class="btn btn-danger">Back</button></a>
            </div>
        </div>
        <div class="card-body">
            <div class="example">
                <form action="{{ route('storeSeller') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black">Store Name</label>
                            <input type="text" name="store_name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('store_name'))
                                <span class="text-danger">{{ $errors->first('store_name') }}</span>
                            @endif
                        </div>

                            <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black">Seller Name</label>
                            <input type="text" name="seller_name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('seller_name'))
                                <span class="text-danger">{{ $errors->first('seller_name') }}</span>
                            @endif
                        </div>

                          <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                            <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black">Phone</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                          </div>
                          <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail" class="form-label" style="color:black">Password</label>
                            <input type="text" name="password" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                    <button type="submit" class="btn btn-primary ml-3">Open Seller Account</button>

                            </div>
                        </div>

                </form>
            </div>
        </div>
    </div>
@endsection
