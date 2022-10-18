@extends('layouts.theme')
@section('content')
<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <h4 class="card-title mb-0">Desciption Module</h4>
            </div>
            <div>
                <a href="{{ route('indexAddDesModule') }}"><button class="btn btn-primary">Desciption Module</button></a>
            </div>
        </div>
        <div style="margin-top: 40px;">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th style="width: 10%;">Description Name</th>
                        <th style="width: 40%;">Long Description</th>
                        <th style="width: 20%; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($description_module as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->desc_name }}</td>
                        <td>{{ $data->long_desc }}</td>
                        <td style="text-align: center;">
                            <a class="btn btn-info actbtn" title="edit" href="{{ url('admin/description-module/edit/'.$data->id) }}"><i class="fas fa-edit" title="edit"></i></a>
                            <a class="btn btn-danger actbtn" href="{{ url('/admin/description-module/delete/'.$data->id) }}"><i class="fas fa-trash" name="delete"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection