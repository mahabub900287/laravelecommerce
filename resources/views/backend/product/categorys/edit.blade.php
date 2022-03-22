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
                <form action="{{route('backend.category.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id }}">
                    <div class="form-group col-md-6 ">
                        <label for="name" class="col-md-12"><h2>Category Name</h2></label>
                        <div class="col-md-12 col-sm-12 ">
                            <input type="text" class="form-control" name="name" id="name" value="{{$data->name}}">
                            @error('name')
                            <p class="alert alert-warning p-2 mt-1">{{ $message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="icon" class="col-md-12"name="parent" id="parent"><h2>Parent Category</h2></label>
                        <div class="col-md-12 col-sm-12 ">
                            <select class="form-control" name="parent" id="parent">
                                <option disabled selected>{{$data->parent_id}}</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="discription" class="col-md-12"><h2>Category Description</h2></label>
                        <div class="col-md-12 col-sm-12 ">
                            <textarea type="text" class="form-control" name="discription" id="discription">{{$data->discription}}</textarea>
                            @error('discription')
                            <p class="alert alert-warning p-2 mt-1">{{ $message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="icon" class="col-md-12"><h2>Category Icon</h2></label>
                        <div class="col-md-12 col-sm-12 ">
                            <input type="text" class="form-control" name="icon" id="icon" value="{{ $data->icon}}">
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
                            <td><img width="100" src="{{ asset('storage/category/'.$data->image)}}" alt="">
                            <p>Image Size 200px/266px</p>
                            @error('image')
                            <p class="alert alert-warning p-2 mt-1">{{ $message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="col-md-12 col-sm-12">
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
