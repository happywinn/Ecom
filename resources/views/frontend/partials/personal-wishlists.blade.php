<div class="col-8">
	<div class="container">
		<div class="card shadow">
			<div class="card-body">
				@if($wishlist->count() > 0)
				<div class="card-body user_wish">
					<div class="row">
						<div class="col-md-11">
							<h5>
							  Wishlist
							  <button class="btn btn-outline-dark mb-2 delete-wish-all float-right" style="margin-right: 20px;"><i class="fas fa-trash"></i> all
							  	<input type="hidden" class="user_id" name="user_id" value="{{Auth::id()}}">
							  </button>
							    
							</h5>
						</div>
					</div>
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
						<!-- <div class="col-md-2 my-auto">
							<input type="hidden" class="prod_id" value="{{$item->prod_id}}">
							@if($item->products->qty > 0)
								<div class="input-group text-center my-auto" style="width: 130px;">
									<button class="input-group-text decrement-btn changeQuantity">-</button>
									<input type="text" name="quantity" class="form-control qty-input text-center" value="1">
									<button class="input-group-text changeQuantity increment-btn">+</button>
								</div>
							@else
								<h6>Out of stock</h6>	
							@endif
						</div> -->
						<div class="col-md-2 my-auto">
							
						</div>
						<div class="col-md-4 my-auto">
							<input type="hidden" value="{{$item->products->id}}" class="prod_id">
							<input type="hidden" value="1" class="qty-input">
							@if($item->products->qty > 0)
							<button class="btn btn-success addToCartBtn">Add <i class="fas fa-shopping-cart"></i></button>
							@else
							<span>Out of Stock</span>
							@endif
						<!-- </div> -->		
						<!-- <div class="col-md-2 my-auto"> -->
							<button class="btn btn-danger remove-wishlist-item">
							  Del <i class="fas fa-trash"></i>
							</button>
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
</div>