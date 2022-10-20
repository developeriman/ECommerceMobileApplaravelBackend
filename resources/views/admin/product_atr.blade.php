@extends('layouts.theme')
@section('content')
<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <h4 class="card-title mb-0">Product Attribute</h4>
            </div>
            <div>
                <a href="{{ route('indexAddProductAttribute') }}"><button class="btn btn-primary">Add Product Attribute</button></a>
            </div>
        </div>
        <div style="margin-top: 40px;">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10%;">#</th>
                        <th style="width: 10%;">Name</th>
                        <th style="width: 20%;">Value</th>
                      
                        <th style="width: 20%; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product_atr as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td> <span> Value:{{$data->value}} Price:{{$data->price}} Stock:{{$data->stock}}</span></td>
                       
                        <td style="text-align: center;">
                            <a class="btn btn-info actbtn" title="edit" href="{{ url('admin/product_atr/edit/'.$data->id) }}"><i class="fas fa-edit" title="edit"></i></a>
                            <a class="btn btn-danger actbtn" href="{{ url('/admin/product_atr/delete/'.$data->id) }}"><i class="fas fa-trash" name="delete"></i></a>
                            <a class="btn btn-info actbtn" href="{{ url('/admin/product_atr/setting/'.$data->id) }}"><i class="fa fa-cog"  name="setting"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection