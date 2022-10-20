@extends('layouts.theme')
@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="align-items-center">
            <h1 class="h3">Attribute Details</h1>
        </div>
    </div>

    <div class="row">
        <!-- Small table -->
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">
                        Name
                    </strong>
                </div>

                <div class="card-body">
                    <table class="table aiz-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Value</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productAttributeValue as $key => $attribute_value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>
                                        {{ $attribute_value->value }}
                                    </td>
                                    <td>
                                        {{ $attribute_value->price }}
                                    </td>
                                    <td>
                                        {{ $attribute_value->stock }}
                                    </td>

                                    <td style="text-align: center;">
                                        <a class="btn btn-info actbtn" title="edit"
                                            href="{{ url('admin/product_atr/setting/edit/' . $attribute_value->id) }}"><i
                                                class="fas fa-edit" title="edit"></i></a>
                                        <a class="btn btn-danger actbtn"
                                            href="{{ url('admin/product_atr/setting/delete/'.$attribute_value->id) }}"><i
                                                class="fas fa-trash" name="delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6" style="color:black">Add New Attribute Value</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('storeAttributeValue') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Attribute Name</label>
                            <input type="hidden" name="attribute_id" value="{{ $productAttribute->id }}">
                            <input type="text" placeholder="Name" name="name"
                                value="{{ $productAttribute->name }}"class="form-control" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Attribute Value</label>
                            <input type="text" placeholder="Name" id="value" name="value" class="form-control"
                                required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="price">Attribute Price</label>
                            <input type="text" placeholder="Price" id="price" name="price" class="form-control"
                                required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="stock">Attribute Stock</label>
                            <input type="text" placeholder="Stock" id="stock" name="stock" class="form-control"
                                required>
                        </div>
                        <div class="form-group mb-3 text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
