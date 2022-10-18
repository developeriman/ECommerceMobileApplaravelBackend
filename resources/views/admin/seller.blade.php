@extends('layouts.theme')
@section('content')
<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <h4 class="card-title mb-0">Seller</h4>
            </div>
            <div>
                <a href="{{ route('indexAddSeller') }}"><button class="btn btn-primary">Add Seller</button></a>
            </div>
        </div>
        <div style="margin-top: 40px;">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10%;">#</th>
                        <th style="width: 15%;">Store Name</th>
                        <th style="width: 15%;">Seller Name</th>
                        <th style="width: 15%;"> Email</th>
                        <th style="width: 10%;"> Phone</th>
                        <th style="width: 10%;"> Password</th>
                      
                        <th style="width: 20%; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($seller as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->store_name }}</td>
                        <td>{{ $data->seller_name }}</td>
                         <td>{{ $data->email }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->password }}</td>
                        <td style="text-align: center;">
                            <a class="btn btn-info actbtn" title="edit" href="{{ url('admin/seller/edit/'.$data->id) }}"><i class="fas fa-edit" title="edit"></i></a>
                            <a class="btn btn-danger actbtn" href="{{ url('/admin/seller/delete/'.$data->id) }}"><i class="fas fa-trash" name="delete"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection