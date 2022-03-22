@extends('layouts.backedapp')
@section('title', 'Product Category |')
@section('content')
@include('sweetalert::alert')
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="text-info">Add Category</h3>
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
            <div class="x_content">
                <br />
                <form action="{{route('backend.category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6 ">
                        <label for="name" class="col-md-12"><h2>Category Name</h2></label>
                        <div class="col-md-12 col-sm-12 ">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Category Name">
                            @error('name')
                            <p class="alert alert-warning p-2 mt-1">{{ $message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row col-md-6 ">
                        <label for="parent" class="col-md-12"><h2>Parent Category</h2></label>
                        <div class="col-md-12 col-sm-12">
                            <select class="form-control" name="parent" id="parent">
                                <option disabled selected>Select Parent Category</option>
                               @foreach ($categories as $categorie)
                               <option value="{{$categorie->id}}">{{$categorie->name}}
                            </option>
                               @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12 ">
                        <label for="discription" class="col-md-12"><h2>Category Description</h2></label>
                        <div class="col-md-12 col-sm-12 ">
                            <textarea type="text" class="form-control" name="discription" id="discription" placeholder="Category-Description"></textarea>
                            @error('discription')
                            <p class="alert alert-warning p-2 mt-1">{{ $message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="icon" class="col-md-12"><h2>Category Icon</h2></label>
                        <div class="col-md-12 col-sm-12 ">
                            <input type="text" class="form-control" name="icon" id="icon" placeholder="Category Icon">
                            <p>Full Icon Class Name</p>
                            @error('icon')
                            <p class="alert alert-warning p-2 mt-1">{{ $message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="image" class="col-md-12"><h2>Category Image</h2></label>
                        <div class="col-md-12 col-sm-12 ">
                            <input type="file" class="form-control" name="image" id="image">
                            <p>Image Size 200px/266px</p>
                            @error('image')
                            <p class="alert alert-warning p-2 mt-1">{{ $message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="col-md-12 col-sm-12">
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="card">
                <div class="card-body1">
                    <h3 class="bg-dark text-light text-center p-3 m-0">All Banner Data</h3>
                    <table class="table table-dark table-striped  table-bordered table-hover">
                        <thead>
                        <tr class="text-center">
                           <th>Id</th>
                           <th>Category</th>
                            <th>Image</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($categories as $key=>$categorie)
                           <tr class="text-center">
                            <td>{{$key+1}}</td>
                            <td>{{$categorie->name}}</td>
                            <td><img width="50" src="{{ asset('storage/category/'.$categorie->image)}}" alt=""></td>
                            <td>{{$categorie->slug}}</td>
                            <td> <a href="{{route('backend.category.status',$categorie->id)}}" class="btn btn-sm btn-{{$categorie->status==1 ? "success":"warning"}}">{{ $categorie->status == 1 ? "Active":"Dactive"}}</a></td>
                            <td>
                                <a href="{{ route('backend.category.edit',$categorie->id) }}"class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{route('backend.category.destroy',$categorie->id)}}"class="btn btn-sm btn-warning">Delete</a>
                                <a href="{{route('backend.category.show',$categorie->id) }}"class="btn btn-sm btn-success">view</a>
                            </td>
                        </tr>
                        <tr class="text-center">
                          @if ($categorie->childs)
                            @foreach ($categorie->childs as $child)
                                <td></td>
                                <td>{{"--- $child->name"}}</td>
                                <td><img width="50" src="{{ asset('storage/category/'.$child->image)}}" alt=""></td>
                                <td>{{$child->slug}}</td>
                                <td> <a href="{{route('backend.category.status',$child->id)}}" class="btn btn-sm btn-{{$child->status==1 ? "success":"warning"}}">{{ $child->status == 1 ? "Active":"Dactive"}}</a></td>
                                <td>
                                    <a href="{{route('backend.category.edit',$child->id) }}"class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{route('backend.category.destroy',$child->id)}}"class="btn btn-sm btn-warning">Delete</a>
                                    <a href="{{route('backend.category.show',$child->id)}}"class="btn btn-sm btn-success">view</a>

                                </td>
                            @endforeach
                          @endif
                        </tr>
                         @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body1">
            <h3 class="bg-dark text-light text-center p-3 m-0">All Banner Data</h3>
            <table class="table table-dark table-striped  table-bordered table-hover">
                <thead>
                <tr class="text-center">
                   <th>Id</th>
                   <th>Category</th>
                    <th>Image</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($datatrashed as $data)
                   <tr class="text-center">
                    <td>{{$key+1}}</td>
                    <td>{{$data->name}}</td>
                    <td><img width="50" src="{{ asset('storage/category/'.$data->image)}}" alt=""></td>
                    <td>{{$data->slug}}</td>
                    <td> <a href="{{route('backend.category.status',$data->id)}}" class="btn btn-sm btn-{{$data->status==1 ? "success":"warning"}}">{{ $data->status == 1 ? "Active":"Dactive"}}</a></td>
                    <td>
                        <a href="{{route('backend.category.restore',$data->id)}}"class="btn btn-sm btn-info">Restor</a>
                        <button value="{{route('backend.category.harddelete',$data->id)}}" id="delete" class="btn btn-sm btn-danger">Hard Delete</button>
                    </td>
                </tr>
                 @endforeach
            </table>
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
