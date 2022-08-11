<div class="col-8">
	<div class="card">
		<div class="card-body">
			<h6>Basic Details</h6>
			<hr>
			<div class="row checkout-form" id="submitform">
				<div class="col-md-6">
					<label for="firstName">First Name</label>
					<input type="text" class="form-control firstname" name="fname" value="{{$order_address != null ? $order_address->fname : ''}}" disabled>
					<span id="fname_error" class="text-danger"></span>
				</div>
				<div class="col-md-6">
					<label for="lastName">Last Name</label>
					<input type="text" name="lname" class="form-control lastname" value="{{$order_address != null ? $order_address->lname : ''}}" disabled>
					<span id="lname_error" class="text-danger"></span>
				</div>
				<div class="col-md-6 mt-3">
					<label for="">Phone Number</label>
					<input type="text" class="form-control phone" name="phone" value="{{$order_address != null ? $order_address->phone : ''}}" disabled>
					<span id="phone_error" class="text-danger"></span>
				</div>
				<div class="col-md-6 mt-3">
					<label for="email">Email</label>
					<input type="email" class="form-control email" name="email" value="{{$order_address != null ? $order_address->email : ''}}" disabled>
					<span id="email_error" class="text-danger"></span>
				</div>
				<div class="col-md-6 mt-3">
					<label for="">Adress 1</label>
					<input type="text" class="form-control address1" value="{{$order_address != null ? $order_address->address1 : ''}}" name="address1" disabled >
					<span id="address1_error" class="text-danger"></span>
				</div>
				<div class="col-md-6 mt-3">
					<label for="">Adress 2</label>
					<input type="text" class="form-control address2" value="{{$order_address != null ? $order_address->address2 : ''}}" name="address2"  disabled>
					<span id="address2_error" class="text-danger"></span>
				</div>
				<div class="col-md-6 mt-3">
					<label for="">City</label>
					<input type="text" class="form-control city" value="{{$order_address != null ? $order_address->city : ''}}" name="city" disabled>
					<span id="city_error" class="text-danger"></span>
				</div>
				<div class="col-md-6 mt-3">
					<label for="">State</label>
					<input type="text" class="form-control state" value="{{$order_address != null ? $order_address->state : ''}}" name="state" disabled >
					<span id="state_error" class="text-danger"></span>
				</div>
				<div class="col-md-6 mt-3">
					<label for="">Country</label>
					<input type="text" class="form-control country" value="{{$order_address != null ? $order_address->country : ''}}" name="country" disabled>
					<span id="country_error" class="text-danger"></span>
				</div>
				<div class="col-md-6 mt-3">
					<label for="">Pincode</label>
					<input type="text" class="form-control pincode" value="{{$order_address != null ? $order_address->pincode : ''}}" name="pincode" disabled>
					<span id="pincode_error" class="text-danger"></span>
				</div>
			</div>
		</div>
	</div>
</div>