@extends('layouts.backedapp')
@section('title', 'Add Banner |')
@section('content')
@include('sweetalert::alert')
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Update Banner<small><a class="btn btn-primary" href="{{ route ('backend.banner.index')}}">All Banner</a></small></h2>
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
                <form action="{{route('backend.banner.update',$banner->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    @csrf
                    @method('PUT')
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Title</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="title" value="{{$banner->title}}">
                            @error('title')
                            <p class="alert alert-danger p-2 mt-1">{{ $message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Banner Discription</label>
                        <div class="col-md-9 col-sm-9 ">
                            <textarea class="form-control" rows="3" name="discription" >{{$banner->discription}}</textarea>
                            @error('discription')
                            <p class="alert alert-danger p-2 mt-1">{{ $message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Banner Photo</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="file" class="form-control mb-1" name="photo" value="{{$banner->discription}}" id="imgClickAndChange" onclick="changeImage()">
                            <img src="{{ asset('storage/banner/'.$banner->photo)}}" width='65' alt="">
                            @error('photo')
                            <p class="alert alert-danger p-2 mt-1">{{ $message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script language="javascript">
    function changeImage() {
        let url=$('#delete').val();
        if (document.getElementById("imgClickAndChange")
        {
            document.getElementById("imgClickAndChange").src ="url";
        }
        else
        {
            document.getElementById("imgClickAndChange").src = "url";
        }
    }
</script>
@endsection


