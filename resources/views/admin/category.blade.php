 @extends('layouts.theme')
 @section('content')
     <div class="card mb-4">
         <div class="card-body">
             <div class="d-flex justify-content-between">
                 <div>
                     <h4 class="card-title mb-0" style="color: black">All Category</h4>
                 </div>
                 <div>
                     <a href="{{ route('indexAddCategory') }}"><button class="btn btn-primary">Add Category</button></a>
                 </div>
             </div>
             <div style="margin-top: 40px;">
                 <table class="table">
                     <thead>
                         <tr>
                             <th style="width: 10%;">#</th>
                             <th style="width: 10%;"> Name</th>
                             <th style="width: 10%;"> Icon</th>
                             <th style="width: 10%;"> Home</th>
                             <th style="width: 10%;"> 3 dots</th>
                             <th style="width: 20%; text-align: center;">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($category as $data)
                             <tr>
                                 <td>{{ $data->id }}</td>
                                 <td>{{ $data->category_name }}</td>
                                 <td> <img
                                         src="{{ !empty($data->category_icon) ? url('/upload/logo/' . $data->category_icon) : url('/upload/nofound.png') }}"
                                         alt="" style="width:30px;height:30px; border:1px solid #000" width="200"
                                         height="80">
                                 </td>

                                 <td>
                                     <input type="checkbox" data-toggle="switchbutton" checked data-onstyle="success"
                                         data-offstyle="danger">

                                 </td>
                                 <td> <input type="checkbox" data-toggle="switchbutton" checked data-onstyle="success"
                                         data-offstyle="danger">
                                 </td>
                                 <td style="text-align: center;">
                                     <a class="btn btn-info actbtn" title="edit"
                                         href="{{ url('admin/category/edit/' . $data->id) }}"><i class="fas fa-edit"
                                             title="edit"></i></a>
                                     <a class="btn btn-danger actbtn"
                                         href="{{ url('/admin/category/delete/' . $data->id) }}"><i class="fas fa-trash"
                                             name="delete"></i></a>
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 @endsection
