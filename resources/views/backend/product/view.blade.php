@extends('layouts.backedapp')
@section('title', 'Product Category |')
@section('content')
    <div class="card justify-content-center align-items-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h6>Product Details</h6>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id::</th>
                                <td>{{ $view_product->id }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <th><img width="50" src="{{ asset('storage/products/' . $view_product->photo) }}" alt=""></th>
                            </tr>
                            <tr>
                                <th>Multipale Image</th>
                                <td>
                                    @foreach ($gellary as $galleries)
                                    <img width="50" src="{{ asset('storage/productgallery/'.$galleries->photo) }}" alt=""></th>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{ $view_product->price }}</td>
                            </tr>
                            <tr>
                                <th>Sale Price</th>
                                <td>{{ $view_product->sale_price }}</td>
                            </tr>
                            <tr>
                                <th>Categorys</th>
                                <td>
                                    @foreach ($view_product->categories as $categorie)
                                        <span class="text-info">{{ $categorie->name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Color</th>
                                <td>
                                    @foreach ($view_product->colors as $color)
                                        <span class="text-info">{{ $color->name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Size</th>
                                <td>
                                    @foreach ($view_product->Sizes as $Size)
                                        <span class="text-info">{{ $Size->name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Quantity</th>
                                <td>
                                    {{ $view_product->quantity }}
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
