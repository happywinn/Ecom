@extends('layouts.front')

@section('content')
<!-- <div class="py-3 mb-4 shadow-sm border-top">
	<div class="container">
		<h6 class="mb-0">
			<a href="{{url('/')}}" style="text-decoration: none">Home</a>
			/ 
			<a href="{{url('cart')}}">Cart</a>
		</h6>
	</div>
</div> -->

<div class="container my-5 cartitems">
	<div class="row">
		<div class="col-md-9">
			<div class="card shadow">
				@php  $total= 0;$grand_total= 0;  $total_discount = 0; @endphp
				@if($cartitems->count() > 0)
				<h5 class="p-2 m-3"><span style="font-size: 25px;color: #e50057;">{{$cartitems->count()}}</span> items in Shopping Cart</h5>
				<div class="card-body">
					
					@foreach($cartitems as $item)
					<div class="row product_data">
						<div class="col-md-2 border-right">
							<img src="{{asset('assets/uploads/product/'.$item->products->image)}}" style="height: 70px; width: 70px;">
						</div>
						<div class="col-md-3 my-auto">
							<h6>{{Str::limit($item->products->name,28)}}</h6>
						</div>
						<div class="col-md-2 my-auto">
							<h6>{{number_format((1- (intval($item->products->discount)/100)) * $item->products->original_price * $item->prod_qty)}} Ks</h6>

						</div>
						<div class="col-md-3 my-auto">
							<input type="hidden" class="prod_id" value="{{$item->prod_id}}">
							@if($item->products->qty >= $item->prod_qty)
							
							<div class="input-group text-center mb-3" style="width: 130px;">
								<button class="input-group-text decrement-btn changeQuantity">-</button>
								<input type="text" name="quantity" class="form-control qty-input text-center" value="{{$item->prod_qty}}">
								<button class="input-group-text changeQuantity increment-btn">+</button>
							</div>
								@php 

								$total = $item->products->original_price * $item->prod_qty;
								$grand_total +=(1- (intval($item->products->discount)/100)) * $item->products->original_price * $item->prod_qty;
								$total_discount +=(1- (intval($item->products->discount)/100)) * $item->products->original_price * $item->prod_qty - $item->products->original_price * $item->prod_qty; 
								@endphp
							@else
								<h6>Out of Stock</h6>	
							@endif
						</div>
						<div class="col-md-2">
							<button class="btn btn-danger delete-cart-item" style="margin-top:6px;"><i class="fas fa-trash"></i> Remove</button>
						</div>		
					</div>
					
					@endforeach
				</div>
				<div class="card-footer user_cart">
					<h6>Total Price : {{number_format($grand_total)}} Ks
					  <a href="{{url('checkout')}}" class="btn btn-outline-success float-end">Proceed to Checkout</a>
					  <button class="btn btn-outline-dark mb-2 delete-cart-all" style="margin-top:6px;"><i class="fas fa-trash"></i> Remove all
					  	<input type="hidden" class="user_id" name="user_id" value="{{Auth::id()}}">
					  </button>
					    
					</h6>
				</div>
				@else
				<div class="cart-body text-center py-5">
					<h2>Your <i class="fas fa-shopping-cart"></i> Cart is empty</h2>
					<a href="{{url('/')}}" class="btn btn-outline-primary float-end m-2">Continue Shopping</a>
				</div>
				@endif
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				<div class="card-body">
						<dl class="dlist-align">
						  <dt>Total price:</dt>
						  <dd class="text-right">{{number_format($total)}} <strong>Ks</strong></dd>
						</dl>
						<dl class="dlist-align">
						  <dt>Discount:</dt>
						  <dd class="text-right">{{number_format($total_discount)}} <strong>Ks</strong></dd>
						</dl>
						<hr>
						<p class="text-center mb-3 h5">
							<strong>{{number_format($grand_total)}} Ks</strong>
						</p>
						
				</div> <!-- card-body.// -->
			</div>  <!-- card .// -->
		</div>
	</div>
	<br>
	<div style="margin-top: 10px;">
		@include('frontend.partials.might-like')
	</div>
</div>
@endsection
