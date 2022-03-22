@extends('layouts.backedapp')
@section('title','All Banner |')
@section('content')
@include('sweetalert::alert')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>All Banner<small><a class="btn btn-primary" href="{{ route ('backend.banner.create')}}">Add Banner</a></small></h2>
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
                        <th>Discription</th>
                        <th>Created_Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    @foreach ($datas as $data)
                       <tr class="text-center">
                           <td>{{ $data->id }}</td>
                           <td><img src="{{ asset('storage/banner/'.$data->photo)}}" width='65' alt=""></td>
                           <td>{{ $data->title}}</td>
                           <td>{{Str::limit($data->discription, 25, '...') }}</td>
                           <td>{{ $data->created_at}}</td>
                           <td> <a href="{{route('backend.banner.status',$data->id)}}" class="btn btn-sm btn-{{$data->status==1 ? "success":"warning"}}">{{ $data->status == 1 ? "Active":"Dactive"}}</a></td>
                           <td>
                            <a href="{{ route('backend.banner.edit',$data->id )}}" class="btn btn-sm btn-primary">Edit</a>
                            <form class="d-inline" action="{{route('backend.banner.destroy',$data->id )}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-primary">Delete</button>
                            </form>
                           </td>

                       </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3 class="bg-dark text-light text-center p-3 m-0">Delete Banner Data</h3>
                <table class="table table-dark table-striped  table-bordered table-hover">
                    <thead>
                    <tr class="text-center">
                       <th>Id</th>
                       <th>Image</th>
                        <th>Title</th>
                        <th>Discription</th>
                        <th>Created_Date</th>
                        <td>Status</td>
                        <th>Action</th>
                    </tr>
                </thead>
                    @foreach ($datatrashed as $data)
                       <tr class="text-center">
                           <td>{{ $data->id }}</td>
                           <td><img src="{{ asset('storage/banner/'.$data->photo)}}" width='65' alt=""></td>
                           <td>{{ $data->title}}</td>
                           <td>{{Str::limit($data->discription, 25, '...') }}</td>
                           <td>{{ $data->created_at}}</td>
                           <td> <a href="" class="btn btn-sm btn-warning">{{ $data->status == 1 ? "Active":"Dactive"}}</a></td>
                           <td>
                            <a href="{{ route('backend.banner.restore',$data->id)}}" class="btn btn-sm btn-warning">Restore</a>
                            <button value="{{ route('backend.banner.harddelete',$data->id)}}" id="delete" class="btn btn-sm btn-danger">Hard Delete</button>
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
