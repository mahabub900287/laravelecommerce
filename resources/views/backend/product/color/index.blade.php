@extends('layouts.backedapp')
@section('title', 'Product color |')
@section('content')
@include('sweetalert::alert')
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="text-info">Add Color</h3>
            </div>
            <div class="x_content">
                <br />
                <form action="{{route('backend.color.store')}}" method="POST">
                    @csrf
                    <div class="form-group col-md-12 ">
                        <label for="name" class="col-md-12"><h2>Color Name</h2></label>
                        <div class="col-md-12 col-sm-12 ">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Category Name">
                            @error('name')
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
    <div class="col-md-6 ">
        <div class="x_panel">
            <div class="card">
                <div class="card-body1">
                    <h3 class="bg-dark text-light text-center p-3 m-0">All Color Data</h3>
                    <table class="table table-dark table-striped  table-bordered table-hover">
                        <thead>
                        <tr class="text-center">
                           <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($colors as $color)
                           <tr class="text-center">
                            <td>{{ $color->id }}</td>
                            <td>{{ $color->name }}</td>
                            <td>

                                <a href="" class="btn btn-sm btn-success">view</a>
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
