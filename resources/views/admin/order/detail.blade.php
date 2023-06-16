@extends('admin.master')
@section('title')
    Order Detail Page
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">

            <div class="card my-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Order Basic information
                </div>
                <div class="card-body">
                    <h4 class="text-center text-success">{{session('message')}}</h4>
                    <table id="datatablesSimple">
                       <tr>
                           <th>Order No</th>
                           <th>{{$order->id}}</th>
                       </tr>
                        <tr>
                            <th>Order Date</th>
                            <th>{{$order->order_date}}</th>
                        </tr>
                        <tr>
                            <th>Order Total</th>
                            <th>{{$order->order_total}}</th>
                        </tr>
                        <tr>
                            <th>Tax Total</th>
                            <th>{{$order->tax_toral}}</th>
                        </tr>
                        <tr>
                            <th>Shipping total</th>
                            <th>{{$order->shippping_total}}</th>
                        </tr>
                        <tr>
                            <th>Customer Info</th>
                            <th>{{$order->customer_info}}</th>
                        </tr>
                        <tr>
                            <th>Payment Type</th>
                            <th>{{$order->payment_type}}</th>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <th>{{$order->payment_status}}</th>
                        </tr>
                        <tr>
                            <th>Delivery Status</th>
                            <th>{{$order->delivery_status}}</th>
                        </tr>


                    </table>
                </div>
            </div>
            <div class="card my-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Order Product Information
                </div>
                <div class="card-body">
                    <h4 class="text-center text-success">{{session('message')}}</h4>
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($order->orderDetails as $orderDetail)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$orderDetail->product_name}}</td>
                                <td>{{$orderDetail->product_price}}</td>
                                <td>{{$orderDetail->product_quantity}}</td>
                                <td>{{$orderDetail->product_price * $orderDetail->product_quantity}}</td>
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




