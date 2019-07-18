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
                            <h1>Checkout</h1>
                            <h2 class="bread"><span><a href="index.html">Home</a></span> <span><a href="cart.html">Shopping Cart</a></span> <span>Checkout</span></h2>
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
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-10 col-md-offset-1">
                <div class="process-wrap">
                    <div class="process text-center active">
                        <p><span>01</span></p>
                        <h3>Shopping Cart</h3>
                    </div>
                    <div class="process text-center active">
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
        <div class="row">
            <div class="col-md-7">
            
            <input type="hidden" id="_token" name="_token" class="form-control" value="{{ csrf_token() }}" />   
            <input type="hidden" id="order_id" name="order_id" class="form-control" value="{{ $cart[0]['order_id'] }}" />   
                <h2>Billing Details</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="country">Select Country</label>
                            <div class="form-field">
                            <i class="icon icon-arrow-down3"></i>
                            <select name="country" id="country" class="form-control">
                                <option value="">Select country</option>
                                <option value="1">Alaska</option>
                                <option value="2">China</option>
                                <option value="3">Japan</option>
                                <option value="4">Korea</option>
                                <option value="5">Philippines</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="col-md-6">
                                <label for="fname">First Name</label>
                                <input type="text" id="fname" class="form-control" value="" placeholder="Your firstname">
                            </div>
                            <div class="col-md-6">
                                <label for="lname">Last Name</label>
                                <input type="text" id="lname" class="form-control" value="" placeholder="Your lastname">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="companyname">Company Name</label>
                            <input type="text" id="companyname" class="form-control" value="" placeholder="Company Name">
                        </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="fname">Address</label>
                            <input type="text" id="address" class="form-control" placeholder="Enter Your Address">
                        </div>
                        <div class="form-group">
                            <input type="text" id="address2" class="form-control" placeholder="Second Address">
                        </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="companyname">Town/City</label>
                                <input type="text" id="towncity" class="form-control" placeholder="Town or City">
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="col-md-6">
                                <label for="stateprovince">State/Province</label>
                                <input type="text" id="stateprovince" class="form-control" placeholder="State Province">
                            </div>
                            <div class="col-md-6">
                                <label for="zippostalcode">Zip/Postal Code</label>
                                <input type="text" id="zippostalcode" class="form-control" placeholder="Zip / Postal">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="email">E-mail Address</label>
                                <input type="text" id="email" class="form-control" placeholder="State Province">
                            </div>
                            <div class="col-md-6">
                                <label for="Phone">Phone Number</label>
                                <input type="text" id="phone" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="radio">
                                    <label><input type="radio" name="optradio">Create an Account? </label>
                                    <label><input type="radio" name="optradio"> Ship to different address</label>
                                </div>
                            </div>
                        </div>
                </div>
            
            </div>
            <div class="col-md-5">
                <div class="cart-detail">
                    <h2>Cart Total </h2>
                    <ul>
                        <li>
                            <ul>
                                @foreach($cart as $details)
                                    <li><span>{{ $details['product_quantity'] }} x {{ $details['product_name'] }}</span> <span>${{ $details['product_price'] }}</span></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><span>Shipping</span> <span>$0.00</span></li>
                        <li><span>Order Total</span> <span id="order_total">${{ $total }}</span></li>
                    </ul>
                </div>
                <div class="cart-detail">
                    <h2>Payment Method</h2>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="radio">
                                <label><input type="radio" value="1" name="optradio">Direct Bank Tranfer</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="radio">
                                <label><input type="radio" value="2" name="optradio">Check Payment</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="radio">
                                <label><input type="radio" value="3" name="optradio">Paypal</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label><input type="checkbox" value="">I have read and accept the terms and conditions</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p><a href="javascript:void(0);" id="place_order" class="btn btn-primary">Place an order</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        var CSRF_TOKEN = $('#_token').val();
        $("#place_order").click(function(){
            let country = $('#country').val();
            let fname = $('#fname').val();
            let lname = $('#lname').val();
            let companyname = $('#companyname').val();
            let address = $('#address').val();
            let address2 = $('#address2').val();
            let towncity = $('#towncity').val();
            let stateprovince = $('#stateprovince').val();
            let zippostalcode = $('#zippostalcode').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let order_id = $('#order_id').val();
            let payment_method = $("input[name='optradio']:checked").val();
            let order_total = $("#order_total").html();
            //alert(order_total);
    
            $.ajax({
                url: 'placeorder',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN, 
                    country:country,
                    fname:fname,
                    lname:lname,
                    companyname:companyname,
                    address:address,
                    address2:address2,
                    towncity:towncity,
                    stateprovince:stateprovince,
                    zippostalcode:zippostalcode,
                    email:email,
                    phone:phone,
                    payment_method:payment_method,
                    order_total:order_total,
                    order_id:order_id
                },
                dataType: 'JSON',
                success: function (data) { 
                    alert(data);
                }
            }); 
        });
    });    
</script>
@endsection
