@extends('frontEnd.master')
@section('title')
    cart
@endsection
@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="#">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <img src="{{ asset('frontEndAsset') }}/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="{{ asset('frontEndAsset') }}/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="{{ asset('frontEndAsset') }}/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="{{ asset('frontEndAsset') }}/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                    </div>
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <h4 class="text-center">{{session('message')}}</h4>

                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($sum=0)
                                    @foreach($cart_products as $cart_product)
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <a title="Remove this item" onclick="return confirm('Are you sure to delete this..')" class="remove" href="{{route('cart.remove', ['id' => $cart_product->id])}}">×</a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href=""><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{ asset($cart_product->attributes->image) }}"></a>
                                        </td>
                                        <td class="product-name">
                                            <a href="">{{$cart_product->name}}</a>
                                        </td>
                                        <td class="product-price">
                                            <span class="amount">{{$cart_product->price}}</span>
                                        </td>
                                        <td class="product-quantity">
                                            <div class="quantity buttons_added">
                                                <form action="{{route('cart.update', ['id' => $cart_product->id])}}" method="POST">
                                                    @csrf
                                                    <input type="number" size="4" name="quantity" class="input-text qty text" value="{{$cart_product->quantity}}" min="1" step="1">
                                                    <button type="submit">Update</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">{{$cart_product->price * $cart_product->quantity}}</span>
                                        </td>
                                    </tr>
                                    @php($sum = $sum + ($cart_product->price * $cart_product->quantity))
                                    @endforeach
                                    </tbody>
                                </table>
                            <div class="cart-collaterals">
                                <div class="cross-sells">
                                    <h2>You may be interested in...</h2>
                                    <ul class="products">
                                        <li class="product">
                                            <a href="">
                                                <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="{{ asset('frontEndAsset') }}/img/product-2.jpg">
                                                <h3>Ship Your Idea</h3>
                                                <span class="price"><span class="amount">£20.00</span></span>
                                            </a>
                                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                        </li>
                                        <li class="product">
                                            <a href="">
                                                <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="{{ asset('frontEndAsset') }}/img/product-4.jpg">
                                                <h3>Ship Your Idea</h3>
                                                <span class="price"><span class="amount">£20.00</span></span>
                                            </a>
                                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cart_totals ">
                                    <h2>Cart Totals</h2>
                                    <table cellspacing="0">
                                        <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">{{$sum}}</span></td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Tax Amount</th>
                                            <td><span class="amount">{{$tax = ($sum * 15)/100 }}</span></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>{{$shipping = 100 }}</td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">{{$orderTotal = $sum + $tax + $shipping}}</span></strong> </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <?php Session::put('sum', $sum); ?>
                                </div>
                                <h2>
                                    <a class="shipping-calculator-button" href="{{route('checkout')}}" aria-expanded="false">checkout</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
