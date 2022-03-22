@extends('layouts.backedapp')
@section('title','All Product |')
@section('content')
@include('sweetalert::alert')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>All Banner<small><a class="btn btn-primary" href="{{ route('backend.product.create')}}">Add Product</a></small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                            class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3 class="bg-dark text-light text-center p-3 m-0">All Banner Data</h3>
                <table class="table table-dark table-striped  table-bordered table-hover">
                    <thead>
                    <tr class="text-center">
                       <th>Id</th>
                       <th>Image</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Sale_Price</th>
                        <th>Category</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th width=200px>Action</th>
                    </tr>
                </thead>
                    @foreach ($products as $product)
                      <tr>
                          <td>{{$product->id }}</td>
                          <td><img width="50" src="{{asset('storage/products/'.$product->photo) }}" alt=""></td>
                          <td>{{$product->title }}</td>
                          <td>{{$product->price }}</td>
                          <td>{{$product->sale_price }}</td>
                          <td>
                              @foreach ($product->categories as $categorie)
                              <span class="text-info">{{$categorie->name}}</span>
                              @endforeach
                          </td>
                          <td>
                            @foreach ($product->sizes as $size)
                            <span class="text-success">{{$size->name}}</span>
                            @endforeach
                          </td>
                          <td>
                            @foreach ($product->colors as $color)
                            <span class="text-primary">{{$color->name}}</span>
                            @endforeach
                          </td>
                          <td>{{$product->quantity }}</td>
                          <td>{{$product->status}}</td>
                          <td>
                              <a href="{{route('backend.product.view',$product->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                              <a href="{{ route('backend.product.edit',$product->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                              <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                          </td>
                      </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('backend_css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.css"></script>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.all.min.js"></script>
    <script>
        let url=$('#delete').val();

        $('#delete').on('click',function(){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=url;
            }
            })
        })

    </script>
    @endsection
