@extends('layouts.backedapp')
@section('title', 'Add Product|')
@section('content')
@include('sweetalert::alert')
@can('add products')
<section>
 <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="text-info">Add Product</h3>
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
                <form action="{{route('backend.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6 ">
                        <label for="name" class="col-md-12"><h2>Category Name</h2></label>
                        <div class="col-md-12 col-sm-12 ">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Category Name"value="{{$product->title}}">
                            @error('name')
                            <p class="alert alert-warning p-2 mt-1">{{ $message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="photo" class="col-md-12"><h2>Photo</h2></label>
                        <div class="col-md-12 col-sm-12">
                                <input type="file"  class="form-control" name="photo">
                        </div>
                        @error('photo')
                        <p class="alert alert-warning p-2 mt-1">{{ $message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="price" class="col-md-12"><h2>Product Price</h2></label>
                        <div class="col-md-12 col-sm-12">
                                <input type="text"  class="form-control" name="price" value="{{ $product->price }}">
                                @error('price')
                                <p class="alert alert-warning p-2 mt-1">{{ $message}}</p>
                                @enderror
                            </div>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="sale_price" class="col-md-12"><h2>Sale Price</h2></label>
                        <div class="col-md-12 col-sm-12">
                                <input type="text"  class="form-control" name="sale_price" value="{{ $product->sale_price }}">
                                @error('sale_price')
                                <p class="alert alert-warning p-2 mt-1">{{ $message}}</p>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group  col-md-6 ">
                        <label for="quantity" class="col-md-12"><h2>Quantity</h2></label>
                        <div class="col-md-12 col-sm-12">
                                <input type="text"  class="form-control" name="quantity" value="{{$product->quantity}}">
                        </div>
                        @error('quantity')
                        <p class="alert alert-warning p-2 mt-1">{{ $message}}</p>
                        @enderror
                    </div>
                    <div class="form-group  col-md-6 ">
                        <label class="col-md-12"><h2>Category</h2></label>
                        <div class="col-md-12 col-sm-12">
                            <select class="select_multiple form-control" name="categories[]"
                              multiple="multiple">
                                @foreach ($categories as $categorie)
                                <option value="{{$categorie->id}}"{{($categorie->slug == $product->id?'selected':'')}}>{{$categorie->name}}</option>
                                @endforeach
                                @foreach ($product->categories as $categorie)
                                <span class="text-info">{{ $categorie->name }}</span>
                            @endforeach
                              </select>
                              @error('categories')
                              <p class="alert alert-warning p-2 mt-1">{{ $message}}</p>
                              @enderror
                        </div>
                    </div>
                    <div class="form-group  col-md-12">
                        <label class="col-md-12"><h2>Size</h2></label>
                        <div class="col-md-12 col-sm-12">
                            <select class="select_multiple form-control" name="sizes[]"
                            multiple="multiple">
                            @foreach ($size as $sizes)
                            <option value="{{$sizes->id}}"{{($sizes->id == $product->id?'selected':'')}}>{{$sizes->name}}</option>
                            @endforeach
                              </select>
                              @error('sizes')
                              <p class="alert alert-warning p-2 mt-1">{{ $message}}</p>
                              @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-12 ">
                        <label class="col-md-12"><h2>Color</h2></label>
                        <div class="col-md-12 col-sm-12">
                            <select class="select_multiple form-control" name="colors[]"
                            multiple="multiple">
                                {{-- @foreach ($color as $colors)
                                <option value="{{$colors->id}} {{($colors->id == $product->id?'selected':'')}} ">{{$colors->name}}</option>
                                @endforeach --}}
                              </select>
                              @error('colors')
                              <p class="alert alert-warning p-2 mt-1">{{ $message}}</p>
                              @enderror
                        </div>

                        </div>
                    </div>
                    <div class="form-group row col-md-12 ">
                        <label for="parent" class="col-md-12"><h2>Discription</h2></label>
                        <div class="col-md-12 col-sm-12">
                               <textarea name="discription" class="form-control summernote">{{$product->discription}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row col-md-12 ">
                        <label for="parent" class="col-md-12"><h2>Short Discription</h2></label>
                        <div class="col-md-12 col-sm-12">
                               <textarea name="short_discription" class="form-control summernote">{{$product->short_discription}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row col-md-12 ">
                        <label for="parent" class="col-md-12"><h2>Additional_Info</h2></label>
                        <div class="col-md-12 col-sm-12">
                               <textarea name="additional_info" class="form-control summernote">{{ $product->additional_info}}</textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12 ">
                        <label for="gallery_photo" class="col-md-12"><h2>Photo</h2></label>
                        <div class="col-md-12 col-sm-12">
                                <input type="file"  class="form-control" name="gallery_photo[]" multiple >
                        </div>
                        @error('gallery_photo')
                        <p class="alert alert-warning p-2 mt-1">{{ $message}}</p>
                        @enderror
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
</section>
@endcan
@endsection
@section('backend_css')
<script src="//cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.css"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endsection
@section('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.all.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
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
    <script>
        $('.summernote').summernote({
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
      $(document).ready(function() {
    $('.select_multiple').select2();
     });
    </script>
    @endsection
