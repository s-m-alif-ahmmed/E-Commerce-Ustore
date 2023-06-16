@extends('admin.master')
@section('title')
    Manage Product
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">

            <div class="card my-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Product Information
                </div>
                <div class="card-body">
                    <h4 class="text-center text-success">{{session('message')}}</h4>
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Selling Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->category_name}}</td>
                            <td><img src="{{asset($product->image)}}" alt="" height="50" width="70"/></td>
                            <td>{{$product->selling_price}}</td>
                            <td>
                                @if($product->status == 1) Published @else Unpublished @endif
                            </td>
                            <td>
                                <a href="{{route('product.detail', ['id' => $product->id])}}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{route('product.edit', ['id' => $product->id])}}" class="btn btn-success btn-sm">Edit</a>
                                <a href="{{route('product.delete', ['id' => $product->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection


