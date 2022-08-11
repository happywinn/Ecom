@extends('layouts.Category')

<head>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
	<script>
		$( function() {
			$( "#slider-range" ).slider({
				range: true,
				min: 0,
				max: 6000000,
				values: [ 500000, 6000000 ],
				slide: function( event, ui ) {
					$( "#amount_start" ).val(  ui.values[ 0 ] );

					$( "#amount_end" ).val( ui.values[ 1 ] );
				}
			});
		} );
	</script>
</head>
@section('content')

<!-- ================COMPONENT FILTER TOP 2 ================================= -->
<div style="margin-top: 100px">
	<div class="card my-4 py-2">
	<div class="card-body d-flex align-items-center">
		<nav class="flex-fill"> 
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
		     <li class="breadcrumb-item"><a href="{{route('home.collection')}}">Collections</a></li>
		    <li class="breadcrumb-item"><a href="{{route('home.items',$category->name)}}">{{$category->name}}</a></li>
		   
		</ol>  
		</nav> <!-- col.// -->
	</div>
	</div> <!-- card.// -->
</div>


<!-- ======= header ============ -->
<h3 class="text-center" style="color: #996868;">{{$category->name}}</h3>

<!-- =============== SECTION ITEMS =============== -->
<section  class="">
	<h2 class="text-center" style="margin: 10px;padding: 10px;"></h2>
	<div class="row row-sm">
		<div class="col-3">
			<!-- ======== COMPONENT FILTER CAT ================= -->
			<div class="card mb-3">
				<div class="card-body">
					<h5 class="card-title">Product type</h5>
					<ul class="list-menu">
						<li>
							<span>{{$category->name}} <span class="badge badge-pill badge-light float-right">{{$featured_products->count()}}</span> </span>
						</li>
					</ul>
				</div>
			</div> <!-- card.// -->

			<!-- =============== COMPONENT FILTER BRAND COUNT ================== -->
			<div class="card mb-3">
				<div class="card-body">
					<h5 class="card-title">Brands</h5>
   				  @foreach($brands as $brand)
					<label class="custom-control custom-checkbox">
						<input type="checkbox"  class="custom-control-input brand_check" name="brand" value="{{$brand->name}}">
						<div class="custom-control-label">{{$brand->name}}  <b class="badge badge-pill badge-light float-right">{{$brand->product->count()}}</b>  
						</div>
					</label>	
 			      @endforeach
				</div>
			</div> <!-- card.// -->

			<!-- ========== COMPONENT FILTER RANGE ==================== -->
			<div class="card mb-3">
				<div class="card-body">
					<p>
						<label for="amount">Price range:</label>
						<div id="slider-range"></div>
						<br>
						<input size="4" type="text" id="amount_start" name="start_price" value="500000" style="font-size: 13px;"> <span style="margin-left: 3rem;font-weight: bold;">MMK</span> 
						<input size="4" type="text" id="amount_end" name="end_price" value="6000000" style="font-size: 13px;" class="float-right">
					</p>		 
					<button onclick="send()" class="btn-sm btn-dark">Range</button>



					<!-- ---------------- -->

				</div>
			</div> <!-- card.// -->

			<!-- ========== COMPONENT FILTER START  ========== -->
			<div class="card mb-3">
				<div class="card-body">
					<h5 class="card-title">Rating</h5>

					<label class="custom-control custom-checkbox">
						<input type="checkbox" checked="" class="custom-control-input">
						<div class="custom-control-label text-warning"> 
							<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
							<i class="fa fa-star"></i> <i class="fa fa-star"></i>
						</div>
					</label>

					<label class="custom-control custom-checkbox">
						<input type="checkbox"  checked="" class="custom-control-input">
						<div class="custom-control-label text-warning"> 
							<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
							<i class="fa fa-star"></i> 
						</div>
					</label>

					<label class="custom-control custom-checkbox">
						<input type="checkbox"   checked="" class="custom-control-input">
						<div class="custom-control-label text-warning"> 
							<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
						</div>
					</label>

					<label class="custom-control custom-checkbox">
						<input type="checkbox"  checked="" class="custom-control-input">
						<div class="custom-control-label text-warning"> 
							<i class="fa fa-star"></i> <i class="fa fa-star"></i> 

						</div>
					</label>

				</div>
			</div> <!-- card.// -->
		</div>
		<!-- ========== PriceRange =========== -->

		<div class="col-1"></div>
		<div class="col-8">
			<div class="row row=sm" id="updateDiv">
			  
				@include('frontend.partials.product-filter')
			 
			</div>
		</div>
	</div> <!-- row.// -->
	<a href="#" id="loadMore">Show More</a>
</section>



<!-- =============== SECTION ITEMS .//END =============== -->
@endsection

@section('scripts')
<script>
	function send() {
		var start = $('#amount_start').val();
		var end  =  $('#amount_end').val();

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: 'get',
			url: '{{route("home.items",$category->name)}}',
			data: "start="+start + "& end=" +end,
			dataType: "json",
			success: function (data){
				var output = '';
				
				var prod_data = data.shift();
				var cate_data = data.pop();
				

				 for(var count = 0; count< prod_data.length; count++)
				 {
				 	
				 	output +='<div class="col-xl-3 col-lg-3 col-md-4 col-6 ">';
				    output +='<div class="card" style=" margin-bottom: 20px;min-height: 284px;">';

				 	// output += '<a href="#" class="img-wrap" style="height: 220px;border-radius: .37rem 0 0 .37rem;"><img src="{{asset("assets/uploads/product/")}}'+'/'+data[count].image +'"></a>';
				 	
				 	output += '<a href="{{url("collections/")}}'+'/'+cate_data.name+'/'+prod_data[count].type+'/'+prod_data[count].name +'" class="img-wrap" style="height: 220px;border-radius: .37rem 0 0 .37rem;"><img src="{{asset("assets/uploads/product/")}}'+'/'+prod_data[count].image +'"></a>';

				 	output += '<figcaption style="overflow: hidden;padding: 16px;">';
				 	output += '<a href="#" class="title">'+prod_data[count].name+'</a>';
				 	output += '<div class="price mt-1">'+prod_data[count].selling_price+'MMK';
				 	output += '<span class="float-right product_data">';
				 	output += '<span>';
				 	output += '<i class="fa fa-heart addToWishlist" style="font-size: 20px;cursor: pointer;"></i>';
				 	output += '</span>';
				 	output += '<span>';
				 	output += '<i class="fa fa-shopping-cart" style="font-size: 20px;cursor: pointer;">';
				 	output += '<input type="hidden"  class="prod_id" id="a" value="'+prod_data[count].id+'">';
				 	output +='<input type="hidden"  class="qty-input" id="b" value="1">';
				 	 output +='</i></span></span></div></figcaption></div></div>';

				 	//output += data[count].name;
				 	
				}

				//alert(JSON.stringify(prod_data.length));
				$('#updateDiv').html(output);

				//alert(JSON.stringify(cate_data.name));
				//alert(JSON.stringify(data));
			}
		});
	}


	$('.brand_check').click(function() {
		if(this.checked) {

			var check_data = $(this).attr('value');
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

			$.ajax({
				type: 'get',
				url:'{{route("home.items",$category->name)}}',
				data: "check_data="+$(this).attr('value'),
				dataType: "json",
				success: function (data){
					 var output = '';
					 var prod_data = data.shift();
					 var cate_data = data.pop();
					 for(var count = 0; count< prod_data.length; count++)
					 {
					
					 	
					 	output +='<div class="col-xl-3 col-lg-3 col-md-4 col-6 ">';
					    output +='<div class="card" style=" margin-bottom: 20px;min-height: 284px;">';

					 	// output += '<a href="#" class="img-wrap" style="height: 220px;border-radius: .37rem 0 0 .37rem;"><img src="{{asset("assets/uploads/product/")}}'+'/'+data[count].image +'"></a>';
					 	
					 	output += '<a href="{{url("collections/")}}'+'/'+cate_data.name+'/'+prod_data[count].type+'/'+prod_data[count].name +'" class="img-wrap" style="height: 220px;border-radius: .37rem 0 0 .37rem;"><img src="{{asset("assets/uploads/product/")}}'+'/'+prod_data[count].image +'"></a>';

					 	output += '<figcaption style="overflow: hidden;padding: 16px;">';
					 	output += '<a href="#" class="title">'+prod_data[count].name+'</a>';
					 	output += '<div class="price mt-1">'+prod_data[count].selling_price+'MMK';
					 	output += '<span class="float-right product_data">';
					 	output += '<span>';
					 	output += '<i class="fa fa-heart addToWishlist" style="font-size: 20px;cursor: pointer;"></i>';
					 	output += '</span>';
					 	output += '<span>';
					 	output += '<i class="fa fa-shopping-cart" style="font-size: 20px;cursor: pointer;">';
					 	output += '<input type="hidden"  class="prod_id" id="a" value="'+prod_data[count].id+'">';
					 	output +='<input type="hidden"  class="qty-input" id="b" value="1">';
					 	 output +='</i></span></span></div></figcaption></div></div>';

					 	//output += data[count].name;
					 	
					}
					$('#updateDiv').html(output);
					//alert(JSON.stringify(prod_data.length));
				}
			});


		}
		else {
			//alert("Not checke");
			//window.location.reload();

			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

			$.ajax({
				type: 'get',
				url:'{{route("home.items",$category->name)}}',
				data: "check_data="+"normal",
				dataType: "json",
				success: function (data){
					 var output = '';
					 var prod_data = data.shift();
					 var cate_data = data.pop();
					 for(var count = 0; count< prod_data.length; count++)
					 {
					
					 	
					 	output +='<div class="col-xl-3 col-lg-3 col-md-4 col-6 ">';
					    output +='<div class="card" style=" margin-bottom: 20px;min-height: 284px;">';

					 	// output += '<a href="#" class="img-wrap" style="height: 220px;border-radius: .37rem 0 0 .37rem;"><img src="{{asset("assets/uploads/product/")}}'+'/'+data[count].image +'"></a>';
					 	
					 	output += '<a href="{{url("collections/")}}'+'/'+cate_data.name+'/'+prod_data[count].type+'/'+prod_data[count].name +'" class="img-wrap" style="height: 220px;border-radius: .37rem 0 0 .37rem;"><img src="{{asset("assets/uploads/product/")}}'+'/'+prod_data[count].image +'"></a>';

					 	output += '<figcaption style="overflow: hidden;padding: 16px;">';
					 	output += '<a href="#" class="title">'+prod_data[count].name+'</a>';
					 	output += '<div class="price mt-1">'+prod_data[count].selling_price+'MMK';
					 	output += '<span class="float-right product_data">';
					 	output += '<span>';
					 	output += '<i class="fa fa-heart addToWishlist" style="font-size: 20px;cursor: pointer;"></i>';
					 	output += '</span>';
					 	output += '<span>';
					 	output += '<i class="fa fa-shopping-cart" style="font-size: 20px;cursor: pointer;">';
					 	output += '<input type="hidden"  class="prod_id" id="a" value="'+prod_data[count].id+'">';
					 	output +='<input type="hidden"  class="qty-input" id="b" value="1">';
					 	 output +='</i></span></span></div></figcaption></div></div>';

					 	//output += data[count].name;
					 	
					}
					$('#updateDiv').html(output);
					//alert(JSON.stringify(prod_data.length));
					
				}
			});

		}



	});
</script>

@endsection