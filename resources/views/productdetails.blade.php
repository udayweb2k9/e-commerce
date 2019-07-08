@extends('layouts.app_fullpage')
@section('page_title', 'Details')

@section('content')
<div class="colorlib-shop">
    <div class="container">
    <div class="alert alert-success" style="display:none">
        Data updated in Cart successfully.
    </div>
        <div class="row row-pb-lg">
            <div class="col-md-10 col-md-offset-1">
                <div class="product-detail-wrap">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="product-entry">
                                <div class="product-img" style="background-image: url(../../frontend/images/item-7.jpg);">
                                    <p class="tag"><span class="sale">Sale</span></p>
                                </div>
                                <div class="thumb-nail">
                                    <a href="#" class="thumb-img" style="background-image: url(../../frontend/images/item-11.jpg);"></a>
                                    <a href="#" class="thumb-img" style="background-image: url(../../frontend/images/item-12.jpg);"></a>
                                    <a href="#" class="thumb-img" style="background-image: url(../../frontend/images/item-16.jpg);"></a>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="product_id" id="product_id" value="{{ $shop['id'] }}" />
                        <input type="hidden" name="_token" id="csrf" value="{{ csrf_token() }}" />
                        <input type="hidden" name="selected_color" id="selected_color" value="" />
                        <input type="hidden" name="selected_size" id="selected_size" value="" />
                        <div class="col-md-7">
                            <div class="desc">
                                <h3>{{ $shop['product_name'] }}</h3>
                                <p class="price">
                                    <span>${{ $shop['product_price'] }}</span> 
                                    <span class="rate text-right">
                                        <i class="icon-star-full"></i>
                                        <i class="icon-star-full"></i>
                                        <i class="icon-star-full"></i>
                                        <i class="icon-star-full"></i>
                                        <i class="icon-star-half"></i>
                                        (74 Rating)
                                    </span>
                                </p>
                                <p><p>{!! $shop['product_description'] !!}</p></p>
                                <div class="color-wrap">
                                    <p class="color-desc">
                                        Color: 
                                        @foreach($product_color as $pcolor)
                                            <a href="javascript:void(0);" id="{{ $pcolor['id'] }}" style="background-color:{{ $pcolor['color_code'] }}" class="color "></a>                                            
                                        @endforeach
                                    </p>
                                </div>
                                <div class="size-wrap">
                                    <p class="size-desc">
                                        Size: 
                                        @foreach($product_size as $psize)
                                            <a href="javascript:void(0);"  id="{{ $psize['id'] }}" class="size size-1">{{ $psize['size_value'] }}</a>
                                        @endforeach
                                    </p>
                                </div>
                                <div class="row row-pb-sm">
                                    <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-btn">
                                <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                                    <i class="icon-minus2"></i>
                                </button>
                                </span>
                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                <span class="input-group-btn">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="icon-plus2"></i>
                                </button>
                                </span>
                            </div>
                            </div>
                                </div>
                                <p>
                                    <span id="add_to_cart"  class="btn btn-primary btn-addtocart"><i class="icon-shopping-cart"></i> Add to Cart</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-12 tabulation">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#description">Description</a></li>
                            <li><a data-toggle="tab" href="#manufacturer">Manufacturer</a></li>
                            <li><a data-toggle="tab" href="#review">Reviews</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="description" class="tab-pane fade in active">
                                {!! $shop['product_description'] !!}
                            </div>
                            <div id="manufacturer" class="tab-pane fade">
                                {!! $shop['product_manufacturer'] !!}
                            </div>
                            <div id="review" class="tab-pane fade">
                                @include('partial.review')
                            </div>
                        </div>
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

    var quantitiy=0;
        $('.quantity-right-plus').click(function(e){
            
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
                
                $('#quantity').val(quantity + 1);

                
                // Increment
            
        });

            $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
            
                // Increment
                if(quantity>0){
                $('#quantity').val(quantity - 1);
                }
        });

        $("#add_to_cart").click(function()
        {
            var cart_data = {};
            cart_data.quantity = $("#quantity").val();
            cart_data.product_id = $("#product_id").val();
            cart_data.selected_color = $("#selected_color").val();
            cart_data.selected_size = $("#selected_size").val();
            cart_data._token = $("#csrf").val();

            $.ajax({
                type: "POST",
                url: '../../addcart',
                data: cart_data,
                success: function(response){
                    console.log(response);
                    if(response == "success")
                    {
                        $(".alert-success").slideDown(500).delay(5000).slideUp(500);
                    }
                    
                }
            }); 
        });

        $('.color').click(function(){
            $('.color-wrap a').css({"border": "0"}); 
            $(this).css({"border": "2px solid yellow"});           
           
            $("#selected_color").val(this.id);
            
        });

        $('.size').click(function(){
            $('.size-desc a').css({"border": "0"}); 
            $(this).css({"border": "2px solid yellow"});           
           
            $("#selected_size").val(this.id);         
        });

       //$(selector).attr(attribute)
       //selected_color
       
        
    });
    </script>

@endsection

