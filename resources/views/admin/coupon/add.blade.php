@extends('layouts.admin')


@section('assets')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });

  } );
  </script>
@endsection
@section('content')
	<div class="card card-custom">
		<div class="card-header">
			<h4>Add Coupon</h4>
			<hr style="border : 1px solid;">
		</div>
		<div class="card-body">
			<form action="{{url('insert-coupon')}}" method="post">
			@csrf
				<div class="row">
					
					<div class="col-md-4 mb-3">
						<label for="">Code <a class="btn-sm btn-dark cu-code" style="cursor: pointer;">auto</a></label>
						<input type="text" class="form-control coupon_code"  name="code" value="" required="">
					</div>

					<div class="col-md-4 mb-3">
						<label for="">Select Type</label>
						<select class="form-select" name="coupon_type">
							<option>Select Type</option>
							<option value="fixed">fixed</option>
							<option value="percent">percent</option>		
						</select>
					</div>

					<div class="col-md-4 mb-3">
						<label for="">Amount / Percentage</label>
						<input type="text" class="form-control" name="coupon_value" required="">
					</div>
					
					<p>Expiry Date: <input type="text" id="datepicker" value="">
					  <input type="hidden" class="expiry_date" name="expiry_date" value="">
				    </p>
					
					<div class="col-md-4 mb-3">
						<label for="">Status</label>
						<input type="checkbox" name="status">
					</div>
					

					<div class="col-md-12">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('scripts')
	<script>

		function makeid() {
		  var text = "";
		  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

		  for (var i = 0; i < 8; i++)
		    text += possible.charAt(Math.floor(Math.random() * possible.length));

		  return text;
		}

		$(function() {
		    $("#datepicker").datepicker();
		    $("#datepicker").on("change",function(){
		        var selected = $(this).val();
		        
		       $('.expiry_date').attr('value', $('#datepicker').val());
		        
		    });

		    console.log(makeid());

		    $(".cu-code").click(function (e) {
				e.preventDefault();

				var auto_value = makeid();
				//var auto_value = ('.coupon_code').val();
				$('.coupon_code').attr('value', auto_value);
				
			});



		});


	</script>
@endsection