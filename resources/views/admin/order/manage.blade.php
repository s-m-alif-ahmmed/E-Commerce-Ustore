@extends('admin.master')
@section('title')
    All Order Information
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
                            <th>Order No</th>
                            <th>Category Info</th>
                            <th>Order Total</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->category->name.'{'.$order->customer->moblie.'}'}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>
                                    @if($order->status == 1) Published @else Unpublished @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.order-detail', ['id' => $order->id])}}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{route('admin.order-invoice', ['id' => $order->id])}}" class="btn btn-success btn-sm">invoice</a>
                                    <a href="{{route('admin.order-delete', ['id' => $order->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this')">Delete</a>
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



