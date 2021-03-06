<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/cart.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css"><link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <style>
        .cart_item_total{
            position: relative;
        }
        .delete-product-cart{
            position: absolute;
            left: 133px;
           bottom: 1px;

        }
        .product_quantity input {
            min-width: 40px;
        }

    </style>

</head>
<body>

<div class="super_container">

	<!-- Header -->

	@include('masterFont.header')

	<!-- Menu -->

	<div class="menu menu_mm trans_300">
		<div class="menu_container menu_mm">
			<div class="page_menu_content">

				<div class="page_menu_search menu_mm">
					<form action="#">
						<input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">
					</form>
				</div>
				<ul class="page_menu_nav menu_mm">
					<li class="page_menu_item has-children menu_mm">
						<a href="index.html">Home<i class="fa fa-angle-down"></i></a>
						<ul class="page_menu_selection menu_mm">
							<li class="page_menu_item menu_mm"><a href="categories.html">Categories<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="product.html">Product<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="cart.html">Cart<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="checkout.html">Checkout<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="contact.html">Contact<i class="fa fa-angle-down"></i></a></li>
						</ul>
					</li>
					<li class="page_menu_item has-children menu_mm">
						<a href="categories.html">Categories<i class="fa fa-angle-down"></i></a>
						<ul class="page_menu_selection menu_mm">
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
						</ul>
					</li>
					<li class="page_menu_item menu_mm"><a href="index.html">Accessories<i class="fa fa-angle-down"></i></a></li>
					<li class="page_menu_item menu_mm"><a href="#">Offers<i class="fa fa-angle-down"></i></a></li>
					<li class="page_menu_item menu_mm"><a href="contact.html">Contact<i class="fa fa-angle-down"></i></a></li>
				</ul>
			</div>
		</div>

		<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>

		<div class="menu_social">
			<ul>
				<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url('images/cart.jpg')"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
									<ul>
										<li><a href="index.html">Home</a></li>
										<li><a href="categories.html">Categories</a></li>
										<li>Shopping Cart</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Cart Info -->

	<div class="cart_info">
		<div class="container">



			<div class="row">
				<div class="col">
					<!-- Column Titles -->
					<div class="cart_info_columns clearfix">
						<div class="cart_info_col cart_info_col_product">Product</div>
						<div class="cart_info_col cart_info_col_price">Price</div>
						<div class="cart_info_col cart_info_col_quantity">Quantity</div>
						<div class="cart_info_col cart_info_col_total">Total</div>
					</div>
				</div>
			</div>
			<div class="row cart_items_row">
				<div class="col">

					<!-- Cart Item -->
                    @if(\Illuminate\Support\Facades\Session::get('Cart') != null)
                    @foreach(\Illuminate\Support\Facades\Session::get('Cart')->products as $product)
					<div id="delete-product-{{$product['productInfo']->id}}" class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<!-- Name -->
						<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
							<div class="cart_item_image">
								<div><img src="{{asset('backEnd/storage').'/'.$product['productInfo']->image}}" alt="" style=""></div>
							</div>
							<div class="cart_item_name_container">
								<div class="cart_item_name"><a href="#">{{$product['productInfo']->name}}</a></div>
								<div class="cart_item_edit"><a href="#">Edit Product</a></div>
							</div>
						</div>
						<!-- Price -->
						<div id="" class="cart_item_price">{{number_format($product['productInfo']->price)}} VND</div>
						<!-- Quantity -->
						<div class="cart_item_quantity">
							<div class="product_quantity_container">
								<div class="product_quantity clearfix">
									<span>Qty</span>
									<input id="quantity_input" class="update-product-cart" data-id="{{$product['productInfo']->id}}" type="number" min="1" pattern="[0-9]*" value="{{$product['quantity']}}">
{{--									<div class="quantity_buttons">--}}
{{--										<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>--}}
{{--										<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>--}}
{{--									</div>--}}
								</div>
							</div>
						</div>
						<!-- Total -->
						<div class="cart_item_total"><span id="product-total-price-{{$product['productInfo']->id}}">{{number_format($product['price'])}} VND</span>
                            <a href="javascript:" id="" data-id="{{$product['productInfo']->id}}" class="btn btn-danger delete-product-cart"><i class="far fa-trash-alt"></i></a>

                        </div>
					</div>

                    @endforeach
                        @endif
				</div>

			</div>
			<div class="row row_cart_buttons">
				<div class="col">
					<div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
						<div class="button continue_shopping_button"><a href="{{route('shop.list')}}">Continue shopping</a></div>
						<div class="cart_buttons_right ml-lg-auto">
							<div class="button clear_cart_button"><a href="#">Clear cart</a></div>
							<div class="button update_cart_button"><a href="#">Update cart</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row row_extra">
				<div class="col-lg-4">

					<!-- Delivery -->
					<div class="delivery">
						<div class="section_title">Shipping method</div>
						<div class="section_subtitle">Select the one you want</div>
						<div class="delivery_options">
							<label class="delivery_option clearfix">Next day delivery
								<input type="radio" name="radio">
								<span class="checkmark"></span>
								<span class="delivery_price">$4.99</span>
							</label>
							<label class="delivery_option clearfix">Standard delivery
								<input type="radio" name="radio">
								<span class="checkmark"></span>
								<span class="delivery_price">$1.99</span>
							</label>
							<label class="delivery_option clearfix">Personal pickup
								<input type="radio" checked="checked" name="radio">
								<span class="checkmark"></span>
								<span class="delivery_price">Free</span>
							</label>
						</div>
					</div>

{{--					<!-- Coupon Code -->--}}
					<div class="coupon">
						<div class="section_title">Coupon code</div>
						<div class="section_subtitle">Enter your coupon code</div>
						<div class="coupon_form_container">
							<form action="#" id="coupon_form" class="coupon_form">
								<input type="text" class="coupon_input" required="required">
								<button class="button coupon_button"><span>Apply</span></button>
							</form>
						</div>
					</div>
				</div>

				<div class="col-lg-6 offset-lg-2">
					<div class="cart_total">
						<div class="section_title">Cart total</div>
						<div class="section_subtitle">Final info</div>
						<div class="cart_total_container">
							<ul>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Subtotal</div>
									<div id="total-price-1" class="cart_total_value ml-auto">{{\Illuminate\Support\Facades\Session::get('Cart') ? number_format(\Illuminate\Support\Facades\Session::get('Cart')->totalPrice) : 0}} VND</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Shipping</div>
									<div class="cart_total_value ml-auto">Free</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Total</div>
									<div id="total-price-2" class="cart_total_value ml-auto">{{\Illuminate\Support\Facades\Session::get('Cart') ? number_format(\Illuminate\Support\Facades\Session::get('Cart')->totalPrice) : 0}} VND</div>
								</li>
							</ul>
						</div>
						<div class="button checkout_button"><a href="{{route('carts.checkout')}}">Proceed to checkout</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	@include('masterFont.footer')
</div>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/cart.js"></script>
<script src="https://use.fontawesome.com/releases/v5.14.0/js/all.js" data-auto-replace-svg="nest"></script>
<script>
    $(document).ready(function () {
        let origin = location.origin
        $('.delete-product-cart').click(function (){
            let id = $(this).attr('data-id');
                $.ajax({
                    url: origin +'/'+ id + '/deleteProduct',
                    method: 'GET',
                    success: function (result){

                        if (result != null){
                            $('#delete-product-' + id).remove();
                            $('#total-quantity').html(result.totalQuantity)
                            $('#total-price-1').html(result.totalPriceCart + ' VND')
                            $('#total-price-2').html(result.totalPriceCart + ' VND')
                        }else{
                            $('#total-quantity').html(0)
                            $('#total-price-1').html(0)
                            $('#total-price-2').html(0)
                        }
                        alertify.warning('delete product success');
                    }
                })
        })



        $('.update-product-cart').change(function () {

            let qtyNew = $(this).val();
            let id = $(this).attr('data-id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url : origin + '/shop-cart/update/' + id,
                method: 'post',
                data: {
                    quantity: qtyNew
                },
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                    let data = result.productUpdate;
                    $('#total-quantity').html(result.totalQuantity)
                    $('#total-price-1').html(result.totalPriceCart + ' VND')
                    $('#total-price-2').html(result.totalPriceCart + ' VND')
                    $('#product-total-price-'+id).html(data.price + ' VND');
                    alertify.success('update success');
                }
            })
        });
    })
</script>
</body>
</html>

