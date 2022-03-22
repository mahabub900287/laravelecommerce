@extends('layouts.backedapp')
@section('title', 'Product Category |')
@section('content')
<div class="card p-4">
    <div class="card-header">
       <h3>Product Category Ditails <a class="btn btn-sm btn-info" href="{{ route('backend.category.index') }}">All Product</a></h3>
    </div>
<div class="card_body">
    <div class="col-md-12 p-0 m-0">
        <table class="table table-dark table-striped table-bordered">
            <tr class="justify-content-center">
              <th>Image:</th>
              <td><img width="100" src="{{ asset('storage/category/'.$s_category->image)}}" alt="">
            </tr>
            <tr>
                <th>Id:</th>
                <td>{{$s_category->id}}</td>
            </tr>

            <tr>
                <th>Product Category Name:</th>
                <td>{{$s_category->name}}</td>
            </tr>
            <tr>
                <th>Slug:</th>
                <td>{{$s_category->slug}}</td>
            </tr>
            <tr>
                <th>Parent id:</th>
                <td>{{$s_category->parent_id}}</td>
            </tr>
            <tr>
                <th>Discription:</th>
                <td>{{$s_category->discription}}</td>
            </tr>
            <tr>
                <th>Icon:</th>
                <td>{{$s_category->icon}}</td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>{{$s_category->status}}</td>
            </tr>
     </div>
    </div>
   </div>
@endsection
