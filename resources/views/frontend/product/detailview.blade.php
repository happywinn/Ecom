@extends("layouts.front")
@section("content")


<!-- ================COMPONENT FILTER TOP 2 ================================= -->
<div class="card my-4 py-2">
<div class="card-body d-flex align-items-center">
	<nav class="flex-fill"> 
	<ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
	    <li class="breadcrumb-item"><a href="{{route('home.items',$product->category->name)}}">{{$product->category->name}}</a></li>
	    <li class="breadcrumb-item"><a href="{{route('home.subitems',[$product->category->name,$product->type])}}">{{$product->type}}</a></li>
	    <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
	</ol>  
	</nav> <!-- col.// -->
</div>
</div> <!-- card.// -->
<!-- ============================ COMPONENT FILTER TOP 2 END.// -->


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{url('/add-rating')}}" method="POST">
				@csrf
				<input type="hidden" name="product_id" value="{{$product->id}}">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Rate {{$product->name}}</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
				</div>
				<div class="modal-body">
					<div class="rating-css">
					    <div class="star-icon">
					    	@if($user_rating)
						    	@for($i=1;$i <= $user_rating->stars_rated; $i++)
						    	<input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
						    	<label for="rating{{$i}}" class="fa fa-star"></label>
						    	@endfor
						    	@for($j = $user_rating->stars_rated; $j<=5;$j++)
						    	<input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
						    	<label for="rating{{$j}}" class="fa fa-star"></label>
						    	@endfor
					    	@else
					        <input type="radio" value="1" name="product_rating" checked id="rating1">
					        <label for="rating1" class="fa fa-star"></label>
					        <input type="radio" value="2" name="product_rating" id="rating2">
					        <label for="rating2" class="fa fa-star"></label>
					        <input type="radio" value="3" name="product_rating" id="rating3">
					        <label for="rating3" class="fa fa-star"></label>
					        <input type="radio" value="4" name="product_rating" id="rating4">
					        <label for="rating4" class="fa fa-star"></label>
					        <input type="radio" value="5" name="product_rating" id="rating5">
					        <label for="rating5" class="fa fa-star"></label>
					        @endif
					    </div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="container">
	<!-- <div class="card shadow product_data"> -->
	<div class="product_data">
		<!-- <div class="card-body"> -->
		<div class="">
			<div class="row">
				<div class="col-md-4 border-right">
					<img src="{{asset('assets/uploads/product/'.$product->image)}}" class="w-100">
				</div>
				<div class="col-md-7">
					<span class="mb-0" style="font-size: 25px; font-weight: bold;">
						{{$product->name}}
					</span>
					@if($product->trending == '1')
					  <span style="font-size: 13px;margin-left: 90px;padding: 10px;" class="badge text-white bg-dark trending_tag">Trending</span>
					@endif
					@if($product->discount != null)
					  <label style="font-size: 13px; margin-left: 10px; padding: 10px;background-color: red;" class="badge text-white trending_tag"> - {{$product->discount}} %</label>
					@endif
					<hr>
					<label class="me-3">Original Price: <s>{{number_format($product->original_price)}} Ks</s></label>
					@if($product->discount != null)
					  <label class="fw-bold">Selling Price: {{number_format($discount_price)}} Ks </label>
					@else
					  <label class="fw-bold">Selling Price: {{number_format($product->selling_price)}} Ks</label>
					@endif
					
					
					@php $ratenum = number_format($rating_value) @endphp
					<div class="rating">
						@for($i=1;$i <= $ratenum; $i++)
						<i class="fas fa-star checked"></i>
						@endfor
						@for($j = $ratenum+1; $j <=5;$j++)
						<i class="fas fa-star"></i>
						@endfor
						<span>
							@if($ratings->count() > 0)
							   {{$ratings->count()}} Ratings
							@else
								No Ratings
							@endif
						</span>
						
					</div>
					<p class="mt-3">
						{{ $product->small_description }}
					</p>
					<hr>
					@if($product->qty > 0)
						<label class="badge bg-success text-white">In stock</label>
					@else
						<label class="badge bg-danger text-white">Out of stock</label>
					@endif
					<div class="row mt-2">
						<div class="col-md-2">
							<input type="hidden" value="{{$product->id}}" class="prod_id">
							<label for="Quantity">Quantity</label>
							<div class="input-group text-center mb-3">
								<button class="input-group-text decrement-btn">-</button>
								<input type="text" name="quantity" 
								value="1" class="form-control qty-input px-1 text-center">
								<button class="input-group-text increment-btn">+</button>
							</div>
						</div>
						<div class="col-md-10">
							<br>
							@if($product->qty > 0)
								<button type="button" class="btn btn-primary me-3 mt-2 float-start {{Auth::check() ? 'addToCartBtn1' : ''}}" {{Auth::check() ?'' : 'data-toggle=modal data-target=#loginModal'}}>Add to Cart<i class="fas fa-shopping-cart"></i></button>
								<button type="button" class="btn btn-outline-dark me-3 mt-2 float-start {{Auth::check() ? 'addToWishlist' : ''}}" {{Auth::check() ?'' : 'data-toggle=modal data-target=#loginModal'}}>Add to Wishlist <i class="fas fa-heart"></i></button>
							@else
								<button type="button" class="btn btn-outline-dark me-3 mt-2 float-start {{Auth::check() ? 'addToWishlist' : ''}}" {{Auth::check() ?'' : 'data-toggle=modal data-target=#loginModal'}}>Add to Wishlist <i class="fas fa-heart"></i></button>
							@endif
							
						</div>
					</div>
				</div>
				<div class="col-md-10">
					<hr>
					<h3>Description</h3>
					<p class="mt-3">
						{!! $product->description !!}
					</p>
				</div>
			</div><!-- row end-->
			@include('frontend.partials.modal')
			<!----- Product Description ---------------->
			
			<hr>
			<div class="row">
				<div class="col-md-4">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
						Rate This product
					</button>
					<a href="{{url('add-review/'.$product->name.'/userreview')}}" class="btn btn-link">
						Write a review
					</a>
				</div>
				<div class="col-md-8">

					@foreach($reviews as $item)
						<br>
					  <div class="user-review">
					  	<label for="">{{ $item->user->name }}</label>
					  	@if($item->user_id == Auth::id())
					  		<a href="{{url('edit-review/'.$product->name.'/userreview')}}" class="btn-sm btn-dark">Edit</a>
					  	@endif
					  	<br>
					  	@if ($item->rating)
					  		@php $user_rated = $item->rating->stars_rated	@endphp

					  		@for($i=1;$i <= $user_rated; $i++)
					  		<i class="fas fa-star checked"></i>
					  		@endfor
					  		@for($j = $user_rated+1; $j <=5;$j++)
					  		<i class="fas fa-star"></i>
					  		@endfor
					  	@endif
					  	<small> Reviewed on {{$item->created_at->format('d M Y')}}</small>
					  	<p>
					  		{{$item->user_review}}
					  	</p>
					  </div>
					@endforeach

				</div>
			</div>
			
			<hr>
			<br>
			@include('frontend.partials.might-like')
		</div>
	</div>
</div>

@endsection

