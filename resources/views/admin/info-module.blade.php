@extends('layouts.theme')
@section('content')
<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <h4 class="card-title mb-0">Info Module</h4>
            </div>
            <div>
                <a href="{{ route('indexAddInfoModule') }}"><button class="btn btn-primary">Info Module</button></a>
            </div>
        </div>
        <div style="margin-top: 40px;">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th style="width: 10%;">Title </th>
                        <th style="width: 10%;">publisher</th>
                        <th style="width: 10%;">developer</th>
                        <th style="width: 10%;">relase_date</th>
                        <th style="width: 10%;">platform</th>
                        <th style="width: 10%;">related_link</th>
                        <th style="width: 20%; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($info_module as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->publisher }}</td>
                        <td>{{ $data->developer }}</td>
                        <td>{{ $data->relase_date }}</td>
                        <td>{{ $data->region }}</td>
                        <td>{{ $data->platform }}</td>
                        <td>{{ $data->related_link }}</td>
                        <td style="text-align: center;">
                            <a class="btn btn-info actbtn" title="edit" href="{{ url('admin/info-module/edit/'.$data->id) }}"><i class="fas fa-edit" title="edit"></i></a>
                            <a class="btn btn-danger actbtn" href="{{ url('/admin/info-module/delete/'.$data->id) }}"><i class="fas fa-trash" name="delete"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection