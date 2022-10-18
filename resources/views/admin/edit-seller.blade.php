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
                <form method="post" action="{{ route('updateSeller') }}">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Store Name</label>
                            <input type="text" name="store_name" value="{{ $seller->store_name }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            @if ($errors->has('name'))
                                <span class="text-danger ">{{ $errors->first('store_name') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Seller Name</label>
                            <input type="text" name="seller_name" value="{{ $seller->seller_name }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            @if ($errors->has('seller_name'))
                                <span class="text-danger ">{{ $errors->first('seller_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="text" name="email" value="{{ $seller->email }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            @if ($errors->has('email'))
                                <span class="text-danger ">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Phone</label>
                            <input type="text" name="phone" value="{{ $seller->phone }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            @if ($errors->has('phone'))
                                <span class="text-danger ">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Password</label>
                                <input type="text" name="password" value="{{ $seller->password }}" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                @if ($errors->has('password'))
                                    <span class="text-danger ">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <input type="hidden" name="id" value="{{ $seller->id }}">
                            <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
