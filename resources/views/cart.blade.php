@extends('layouts.app_fullpage')
@section('page_title', 'About')
@section('banner')
<aside id="colorlib-hero" class="breadcrumbs">
    <div class="flexslider">
        <ul class="slides">
        <li style="background-image: url(images/cover-img-1.jpg);">
            <div class="overlay"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                        <div class="slider-text-inner text-center">
                            <h1>Shopping Cart</h1>
                            <h2 class="bread"><span><a href="index.html">Home</a></span> <span><a href="shop.html">Product</a></span> <span>Shopping Cart</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        </ul>
    </div>
</aside>
@endsection
@section('content')
<div class="colorlib-shop">
    @if(count($cart) >0)
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-10 col-md-offset-1">
                <div class="process-wrap">
                    <div class="process text-center active">
                        <p><span>01</span></p>
                        <h3>Shopping Cart</h3>
                    </div>
                    <div class="process text-center">
                        <p><span>02</span></p>
                        <h3>Checkout</h3>
                    </div>
                    <div class="process text-center">
                        <p><span>03</span></p>
                        <h3>Order Complete</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-pb-md">
            <div class="col-md-10 col-md-offset-1">
                <div class="product-name">
                    <div class="one-forth text-center">
                        <span>Product Details</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Price</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Quantity</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Total</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Remove</span>
                    </div>
                </div>
                @foreach($cart as $details)
                    <div class="product-cart">
                        <div class="one-forth">
                            <div class="product-img" style="background-image: url(frontend/images/item-6.jpg);">
                            </div>
                            <div class="display-tc">
                                <h3>{{ $details['product_name'] }}</h3>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="price">${{ $details['product_price'] }}</span>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="{{ $details['product_quantity'] }}" min="1" max="100">
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="price">${{ $details['product_price_total'] }}</span>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <a href="#" class="closed"></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="total-wrap">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="#">
                                <div class="row form-group">
                                    <div class="col-md-9">
                                        <input type="text" name="quantity" class="form-control input-number" placeholder="Your Coupon Number...">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="submit" value="Apply Coupon" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3 col-md-push-1 text-center">
                            <div class="total">
                                <div class="sub">
                                    <p><span>Subtotal:</span> <span>${{ $subtotal }}</span></p>
                                    <p><span>Delivery:</span> <span>${{ $delivary }}</span></p>
                                </div>
                                <div class="grand-total">
                                    <p><span><strong>Total:</strong></span> <span>${{ $total }}</span></p>
                                </div>
                                <div class="grand-total">
                                    <p><a href="{{ $redirect }}"class="btn btn-primary">Checkout</a></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            Yet to add a product in cart
        </div>
    </div>
    @endif
</div>
@endsection

