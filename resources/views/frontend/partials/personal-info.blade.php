<div class="col-5">
	<div class="card mb-4">
	  <div class="card-body">
	  <h4 class="card-title mb-4">Personal Information</h4>
	 <form>
	 	<div class="form-group">
	 		<span class="icon icon-md rounded-circle btn-dark">
	 			<i class="fa fa-user white"></i>
	 		</span>
	     	<!-- <img src="{{asset('assets/images/banners/profile.jpg')}}" class="img-sm rounded-circle border"> -->
	     </div>
	    <div class="form-row">
			<div class="col-md-12 form-group">
				<label>Name</label>
			  	<input type="text" class="form-control username inputDisabled" value="{{$user->name}}" disabled="">
			</div> <!-- form-group end.// -->
			<div class="col-md-12 form-group">
				<label>Email</label>
			  	<input type="email" class="form-control email inputDisabled" value="{{$user->email}}" disabled="">
			</div> <!-- form-group end.// -->
		</div> <!-- form-row.// -->
		<div class="form-row">
			<div class="form-group col-md-12">
			  <label>Phone</label>
			  <input type="text" class="form-control phone inputDisabled" value="{{$user->phone}}" disabled="">
			</div> <!-- form-group end.// -->
		</div> <!-- form-row.// -->

		<div class="form-row">
			<div class="form-group col-md-2">
			  <button class="btn btn-outline-dark btn-block" id="edit">Edit</button>
			</div> <!-- form-group end.// -->
			<div class="form-group col-md-2">
			  <button class="btn btn-primary btn-block" id="save">Save</button>
			</div> <!-- form-group end.// -->
		</div> <!-- form-row.// -->
	  </form>
	  </div> <!-- card-body.// -->
	</div> <!-- card .// -->
</div>

<script>
	$("#edit").click(function(event){
	   event.preventDefault();
	   $('.inputDisabled').prop("disabled", false); // Element(s) are now enabled.

	});

	$("#save").click(function(event) {

		var username = $('.username').val();
		var email = $('.email').val();
		var phone = $('.phone').val();

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$.ajax({
			method: "POST",
			url: "/account-update",
			data: {
				'username': username,
				'email': email,
				'phone': phone,
			},
			success: function(response){
				Swal.fire(response.status);	
				//alert(response);
			}
		});
	});


</script>