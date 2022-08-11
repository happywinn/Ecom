
	$(document).ready(function (){

		loadcart();
		loadwishlist();
		function loadcart()
		{
			$.ajax({
				method:'GET',
				url:'/load-cart-data',
				success: function (response){
					$('.cart-count').html('');
					$('.cart-count').html(response.count);
					//$('.cart-count').html(response.count+shoppingCart.countCart());
				}
			});
			
			
			// $('.cart-count').html();
		

		}

		function loadwishlist()
		{
			$.ajax({
				method:'GET',
				url:'/load-wishlist-count',
				success: function (response){
					$('.wish-count').html('');
					$('.wish-count').html(response.count);
				}
			});
			
		}


		$('.addToCartBtn1').click(function (e) {
			e.preventDefault();

			var product_id = $(this).closest('.product_data').find('.prod_id').val();
			var product_qty = $(this).closest('.product_data').find('.qty-input').val();

			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

			$.ajax({
				method: "POST",
				url: "/add-to-cart",
				data: {
					'product_id': product_id,
					'product_qty': product_qty,
				},
				success: function(response){
					Swal.fire(response.status);
					loadcart();
				}
			});

		});


		// $('.addToCartBtn').click(function (e) {
		// 	e.preventDefault();

		// 	var product_id = $(this).closest('.product_data').find('.prod_id').val();
		// 	var product_qty = $(this).closest('.product_data').find('.qty-input').val();


		// 	shoppingCart.addItemToCart(product_id, product_qty);
		// 	loadcart();
		// });

		// $('.addToCartBtn1').click(function (e) {
		// 	e.preventDefault();

		// 	var product_id = $(this).closest('.product_data').find('.prod_id').val();
		// 	var product_qty = $(this).closest('.product_data').find('.qty-input').val();

		
		// 	shoppingCart.addItemToCart(product_id, product_qty);
		// 	loadcart();

		// });

		
		// $('.increment-btn').click(function (e) {
			$(document).on('click','.increment-btn', function(e) {
			e.preventDefault();

			var inc_value = $(this).closest('.product_data').find('.qty-input').val();
			var value = parseInt(inc_value,10);
			value = isNaN(value)? 0 : value;
			if(value < 10)
			{
				value++;
			    $(this).closest('.product_data').find('.qty-input').val(value);

			}
		});
		// $('.decrement-btn').click(function (e) {
			$(document).on('click','.decrement-btn', function(e) {
			e.preventDefault();
			var dec_value = $(this).closest('.product_data').find('.qty-input').val();
			var value = parseInt(dec_value,10);
			value = isNaN(value)? 0 : value;
			if(value > 1)
			{
				value --;
			    $(this).closest('.product_data').find('.qty-input').val(value);
			}
		});



		// $('.changeQuantity').click(function (e) {
			$(document).on('click','.changeQuantity', function(e) {
			e.preventDefault();

			var prod_id = $(this).closest('.product_data').find('.prod_id').val();
			var qty = $(this).closest('.product_data').find('.qty-input').val();

			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
			$.ajax({
				method:"POST",
				url:"update-cart",
				data:{
					'prod_id':prod_id,
					'prod_qty':qty,
				},
				success: function (data){
					//alert(JSON.stringify(data));
					$('.cartitems').load(location.href+" .cartitems");
				}
			});
		});



		// $('.delete-cart-item').click(function (e) {
			$(document).on('click','.delete-cart-item', function(e) {
			e.preventDefault();
			
			var prod_id = $(this).closest('.product_data').find('.prod_id').val();
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
			$.ajax({
				method:"POST",
				url:"delete-cart-item",
				data:{
					'prod_id':prod_id,
				},
				success: function (response){
					//window.location.reload();

					$('.cartitems').load(location.href+" .cartitems");

					Swal.fire(response.status,"success");
					loadcart();
				}
			});
		});

		// $('.delete-cart-all').click(function (e) {
			$(document).on('click','.delete-cart-all', function(e) {
		  	e.preventDefault();
		  	
		  	var user_id = $(this).closest('.user_cart').find('.user_id').val();

		  	//alert(user_id);

		  	$.ajaxSetup({
		  	    headers: {
		  	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  	    }
		  	});
		  	$.ajax({
		  		method:"POST",
		  		url:'/delete-cart-all',
		  		data:{
		  			'user_id':user_id,
		  		},
		  		success: function (response){
		  			loadcart();
		  			Swal.fire(response.status,"Successful");
					$('.cartitems').load(location.href+" .cartitems");

		  		}
		  	});
		  });

		

		$('.cart-to-db').click(function (e) {
			e.preventDefault();

			//var product_id = $(this).closest('.product_data').find('.prod_id').val();
			//var product_qty = $(this).closest('.product_data').find('.qty-input').val();

			
			var total_carts = shoppingCart.listCart();
			//alert(JSON.stringify(total_carts));
			//loadcart();

			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});


			$.ajax({
				method: "POST",
				url: "/add-to-cart",
				data:JSON.stringify(total_carts),
				success: function(response){

				}
			});

			//localStorage.clear();
			localStorage.removeItem('shoppingCart');
			

			setTimeout(function() {
				location.href ="/cart";
			},1000);

		});


		// $('.addToWishlist').click(function (e) {
		// 	e.preventDefault();

		// 	var prod_id = $(this).closest('.product_data').find('.prod_id').val();
			
		// 	shoppingWish.addItemToWish(prod_id);
		// 	loadwish();

		// });

		$('.addToWishlist').click(function (e) {
			e.preventDefault();

			var prod_id = $(this).closest('.product_data').find('.prod_id').val();
			
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

			$.ajax({
				method:"POST",

				url: "/add-to-wishlist",
				data: {
					'prod_id': prod_id
				},
				success: function (response){
					Swal.fire(response.status);
					loadwishlist();
					
				},error:function() {
					alert("Error");
				}

			});
		});



		$('.wish-to-db').click(function (e) {
			e.preventDefault();

			//var product_id = $(this).closest('.product_data').find('.prod_id').val();
			//var product_qty = $(this).closest('.product_data').find('.qty-input').val();

			
			var total_wishs = shoppingWish.listWish();
			//alert(JSON.stringify(total_wishs));
			//loadwish();

			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});


			$.ajax({
				method: "POST",
				url: "/add-to-wishlist",
				data:JSON.stringify(total_wishs),
				success: function(response){
					
				}
			});

			//localStorage.clear();
			localStorage.removeItem('shoppingWish');

			//location.href = "/wishlist";
			setTimeout(function() {
				location.href ="/wishlist";
			},1000);
		});


		$('.delete-wish-all').click(function (e) {
		  	e.preventDefault();
		  	
		  	var user_id = $(this).closest('.user_wish').find('.user_id').val();

		  	//alert(user_id);

		  	$.ajaxSetup({
		  	    headers: {
		  	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  	    }
		  	});

		  	$.ajax({
		  		method:"POST",
		  		url:'/delete-wish-all',
		  		data:{
		  			'user_id':user_id,
		  		},
		  		success: function (response){
		  			
		  			Swal.fire(response.status,"Successful");
		  			$('.wishitems').load(location.href+" .wishitems");
		  		}
		  	});
		  });


		  // $('.remove-wishlist-item').click(function (e) {
			$(document).on('click','.remove-wishlist-item', function(e) {
			e.preventDefault();

			var prod_id = $(this).closest('.product_data').find('.prod_id').val();
			
			//alert(prod_id);

			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

			$.ajax({
				method:"POST",
				url:"/delete-wishlist-item",
				data:{
					'prod_id':prod_id,
				},
				success: function (response){
					loadwishlist();
					Swal.fire(response.status);
		  			$('.wishitems').load(location.href+" .wishitems");

				}
			});
		});


		$('.place-order').on("click", function(){
			let valid = true;
			$('[required]').each(function() {
			  if ($(this).is(':invalid') || !$(this).val()) valid = false;
			})
			// if (!valid) alert("error please fill all fields!");
			if(!valid) false;
		  });

		
		$(".card-product-grid").slice(0,17).show();
		  $("#loadMore").click(function(e){
			e.preventDefault();
			$(".card-product-grid:hidden").slice(0,12).fadeIn("slow");
			
			if($(".card-product-grid:hidden").length == 0){
			   $("#loadMore").fadeOut("slow");
			  }
	  	});

		// Apply Coupon
		$('#ApplyCoupon').submit(function(){
			var code = $('#coupon_code').val();
			//alert(code);
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
			$.ajax({

				type:"post",
				data:{code:code},
				url: '/coupon',
				success: function(response) {
					if(response.status == true ){
						
						//window.location.reload();
						$('.coupon_span').html(response.code);
						$('.discount_span').html(response.discount);
						$('.total_span').html(response.total);
						$('#coupon_delete').css('display','inline');
						$('.coupon_alert').css('display','none');
						$('#coupon_code').val('');
						
					}
					else {
						// alert(response.message);
						$('#coupon_code').val('');
						$('.coupon_alert').css('display','block');
					}
					
				},error:function() {
					alert("Error");
				}
			})
		});


		// Remove Coupon
		$('.RemoveCoupon').submit(function(){
			//var code = $('#coupon_code').val();
			var message ="send";
			
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
			$.ajax({

				type:"delete",
				data:{message:message},
				url: '/coupon',
				success: function(response) {
					//alert(response.total);

					$('#coupon_delete').css('display','none');
					$('.coupon_span').html('');
					$('.discount_span').html('');
					$('.total_span').html(response.total);
					
				},error:function(response) {
					
					alert("Error");
				}
			});
		});

	});


	