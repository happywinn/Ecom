@extends('layouts.front')
@section('content')
	<div class="container mt-5">
	  
		<div class="row">
			<div class="col-md-7">
			  <form id="myform" action="{{url('place-order')}}" method="POST">
			  	  @csrf
				  <div class="card">
					<div class="card-body">
						<h6>Basic Details</h6>
						<hr>
						<div class="row checkout-form" id="submitform">
							<div class="col-md-6">
								<label for="firstName">First Name</label>
								<input type="text" class="form-control firstname" name="fname" placeholder="Enter First Name" required>
								@if($errors->has('fname'))
									<span id="fname_error" class="text-danger">{{$errors->first('fname')}}</span>
								@endif
							</div>
							<div class="col-md-6">
								<label for="lastName">Last Name</label>
								<input type="text" name="lname" class="form-control lastname" placeholder="Enter Last Name" required>
								@if($errors->has('lname'))
									<span id="lname_error" class="text-danger">{{$errors->first('lname')}}</span>
								@endif
								
							</div>
							<div class="col-md-6 mt-3">
								<label for="">Phone Number</label>
								<input type="text" class="form-control phone" name="phone" placeholder="Enter Phone Number" required>
								@if($errors->has('phone'))
									<span id="phone_error" class="text-danger">{{$errors->first('phone')}}</span>
								@endif
							</div>
							<div class="col-md-6 mt-3">
								<label for="email">Email</label>
								<input type="email" class="form-control email" name="email" placeholder="Enter Email" required>
								@if($errors->has('email'))
									<span id="email_error" class="text-danger">{{$errors->first('email')}}</span>
								@endif
							</div>
							<div class="col-md-6 mt-3">
								<label for="">Adress 1</label>
								<input type="text" class="form-control address1" placeholder="Enter Address 1" name="address1" required >
								@if($errors->has('address1'))
									<span id="address1_error" class="text-danger">{{$errors->first('address1')}}</span>
								@endif
							</div>
							<div class="col-md-6 mt-3">
								<label for="">Adress 2</label>
								<input type="text" class="form-control address2" placeholder="Enter Address 2" name="address2"  required>
								@if($errors->has('address2'))
									<span id="address2_error" class="text-danger">{{$errors->first('address2')}}</span>
								@endif
							</div>
							<div class="col-md-6 mt-3">
								<label for="">City</label>
								<input type="text" class="form-control city" placeholder="Enter City" name="city" required >
								@if($errors->has('city'))
									<span id="city_error" class="text-danger">{{$errors->first('city')}}</span>
								@endif
							</div>
							<div class="col-md-6 mt-3">
								<label for="">State</label>
								<input type="text" class="form-control state" placeholder="Enter State" name="state" required >
								@if($errors->has('state'))
									<span id="state_error" class="text-danger">{{$errors->first('state')}}</span>
								@endif
							</div>
							<div class="col-md-6 mt-3">
								<label for="">Country</label>
								<input type="text" class="form-control country" placeholder="Enter Country" name="country" required>
								@if($errors->has('country'))
									<span id="country_error" class="text-danger">{{$errors->first('country')}}</span>
								@endif
							</div>
							<div class="col-md-6 mt-3">
								<label for="">Pincode</label>
								<input type="text" class="form-control pincode" placeholder="Enter pincode" name="pincode" required>
								@if($errors->has('pincode'))
									<span id="pincode_error" class="text-danger">{{$errors->first('pincode')}}</span>
								@endif
							</div>
						</div>
					</div>
					<input type="hidden" name="payment_mode" value="COD">
				  </div>
			  </form>
			</div>
			<div class="col-md-5">
				<div class="card">
					<div class="card-body">
						<h6>Order Details</h6>
						<hr>
						
						@if($cartitems->count() > 0)
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Name</th>
									<th>Qty</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
						        @foreach($cartitems as $items)
								<tr>
								  <td>{{$items->products->name}}</td>
								  <td>{{$items->prod_qty}}</td>
								  <td>{{number_format((1- (intval($items->products->discount)/100)) * $items->products->original_price )}} <strong>Ks</strong></td>

								</tr>
								  
								@endforeach
							</tbody>
						</table>
						
						  
						  <h6 class="px-2">Coupon Apply ( {{session()->get('coupon')['name']}} <span class="coupon_span"></span> ) : 

						  	
						  	<form class="RemoveCoupon" action="javascript:void(0);" method="POST" style="display: none;" id="coupon_delete">
						  		@csrf
						  		@method('delete')
						  		
						  		<button class="btn-sm btn-outline-dark" type="submit" style="font-size: 15px;"><i class="fas fa-trash"></i></button>
						  	</form>
						  	@if(session('coupon'))
						  	  <form action="{{route('coupon.destroy')}}" method="POST" style="display: inline">
						  	  	@csrf
						  	  	@method('delete')
						  	  	<button class="btn-sm btn-outline-dark" type="submit" style="font-size: 15px;"><i class="fas fa-trash"></i></button>
						  	  </form>
						  	@endif
						  	<span class="float-right">-{{session()->get('coupon')['discount']}}<span class="discount_span"></span> Ks</span></h6>
						
						<h6 class="px-2">Grand Total : <span class="float-end total_span">{{number_format($total - session()->get('coupon')['discount'])}}</span> Ks</h6>
						<hr>
						<form id="ApplyCoupon" action="javascript:void(0);" method="POST">  @csrf 
							<!-- action="{{route('coupon.store')}}" -->
							
							<div class="input-group mb-3">
							  <input type="text" id="coupon_code" class="form-control" placeholder="Enter Coupon Code" aria-label="Recipient's username" aria-describedby="button-addon2" required>
							  <button class="btn btn-primary btn-click" type="submit">Apply</button>
							</div>
						</form>
						
							<div class="alert alert-danger coupon_alert" style="display: none;" role="alert">
							  Invalid Code.
							</div>
						
						<input form="myform" type="submit" class="btn btn-primary float-end w-100 place-order" value="Place Order">
						<!-- <button type="submit" class="btn btn-success w-100 mt-3 razorpay_btn">Pay with Paypal</button> -->
						  @if (session('success_message'))
							<div class="alert alert-success" role="alert">
							  {{session('success_message')}}
							</div>
						  @endif
						@else
						<h5 class="text-center">No products in cart</h5>
						@endif
					</div>
				</div>
			</div>
		</div>
	  
	  
	</div>
@endsection
@section('scripts')
	<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection