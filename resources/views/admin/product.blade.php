 @extends('layouts.theme')
 @section('content')
     <div class="card mb-4">
         <div class="card-body">
             <div class="d-flex justify-content-between">
                 <div>
                     <h4 class="card-title mb-0" style="color: black">All Prodcut</h4>
                 </div>
                 <div>
                     <a href="{{ route('indexAddProduct') }}"><button class="btn btn-primary">Add Prodcut</button></a>
                 </div>
             </div>
             <div style="margin-top: 40px;">
                 <table class="table">
                     <thead>
                         <tr>
                             <th style="width: 5%;">#</th>
                             <th style="width: 10%;">Product Name</th>
                             <th style="width: 10%;">Brand Name</th>
                             <th style="width: 10%;">Seller Name</th>
                             <th style="width: 10%;">Info Name</th>
                             <th style="width: 10%;">Descrition Name</th>
                         
                             <th style="width: 10%; text-align: center;">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($product as $data)
                             <tr>
                                 <td>{{ $data->id }}</td>
                                 <td>{{ $data->product_name }}</td>
                         <td>{{optional($data->brand)->name}}</td>
                         <td>{{optional($data->seller)->seller_name}}</td>
                         <td>{{optional($data->info_module)->title}}</td>
                         <td>{{optional($data->description_module)->desc_name}}</td>

                                 <td style="text-align: center;">
                                     <a class="btn btn-info actbtn" title="edit"
                                         href="{{ url('admin/product/edit/' . $data->id) }}"><i class="fas fa-edit"
                                             title="edit"></i></a>
                                     <a class="btn btn-danger actbtn"
                                         href="{{ url('/admin/product/delete/' . $data->id) }}"><i class="fas fa-trash"
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
