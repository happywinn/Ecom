@extends('layouts.front')

@section('content')
<div class="py-3 mb-4 shadow-sm" style="margin-top: 50px !important;">
	<div class="container">

		<h6 class="mb-0">
			<a href="{{url('/')}}" style="text-decoration: none">Home</a>
			/ 
			<a href="{{url('wishlist')}}">Wishlist</a>
		</h6>
	</div>
</div>

<div class="container my-5">
	<div class="card shadow wishitems">
		<div class="card-body">
			@if($wishlist->count() > 0)
			<div class="card-body user_wish">
				<h6>
				  
				  <button class="btn btn-outline-dark mb-2 delete-wish-all" style="margin-top:6px;margin-left: 1000px;"><i class="fas fa-trash"></i> Remove all
				  	<input type="hidden" class="user_id" name="user_id" value="{{Auth::id()}}">
				  </button>
				    
				</h6>
				@foreach($wishlist as $item)
				<div class="row product_data">
					<div class="col-md-2 border-right">
						<img src="{{asset('assets/uploads/product/'.$item->products->image)}}" style="height: 70px; width: 70px;">
					</div>
					<div class="col-md-2 my-auto">
						<h6>{{$item->products->name}}</h6>
					</div>
					<div class="col-md-2 my-auto">
						<h6>{{$item->products->selling_price}} MMK</h6>
					</div>
					
					<div class="col-md-2 my-auto">
						
					</div>
					<div class="col-md-2 my-auto">
						<input type="hidden" value="{{$item->products->id}}" class="prod_id">
						<input type="hidden" value="1" class="qty-input">
						@if($item->products->qty > 0)
						<button class="btn btn-success addToCartBtn1"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
						@else
							<h6>Out of stock</h6>	
						@endif
					</div>		
					<div class="col-md-2 my-auto">
						<button class="btn btn-danger remove-wishlist-item"><i class="fas fa-trash"></i> Remove</button>
					</div>		
				</div>
				
				@endforeach
			</div>
			@else
			  <h4>There are no products in your Wishlist</h4>
			@endif
		</div>
	</div>
</div>
@endsection