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
			<h4>Edit Brand</h4>
			<hr style="border : 1px solid;">
		</div>
		<div class="card-body">
			<form action="{{url('update-coupon/'.$coupon->id)}}" method="POST">
			@csrf
				<div class="row">

					<div class="col-md-4 mb-3">
						<label for="">Code <a class="btn-sm btn-primary" style="cursor: pointer;">auto</a></label>
						<input type="text" class="form-control" name="code" value="{{$coupon->code}}" required>
					</div>

					<div class="col-md-4 mb-3">
						<label for="">Coupon Type</label>
						<select class="form-select" name="coupon_type">
							<option>{{$coupon->type}}</option>
							<option value="fixed">fixed</option>
							<option value="percent">percent</option>
						</select>
					</div>
					
					<div class="col-md-4 mb-3">
						<label for="">Amount / Percentage</label>
						<input type="text" class="form-control" name="coupon_value" value="{{$coupon->value}}" required>
					</div>
						<p>Expiry Date: <input type="text" id="datepicker" value="{{$coupon->expiry_date}}" required>
						  <input type="hidden" class="expiry_date" name="expiry_date" value="" >
					    </p>

					<div class="col-md-4 mb-3">
						<label for="">Status</label>
						<input type="checkbox" 
						{{$coupon->status == '1' ? 'checked':''}}
						name="status">
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		$(function() {
		    $("#datepicker").datepicker();
		    $("#datepicker").on("change",function(){
		        var selected = $(this).val();
		        
		       $('.expiry_date').attr('value', $('#datepicker').val());
		        
		    });
		});
	</script>
@endsection