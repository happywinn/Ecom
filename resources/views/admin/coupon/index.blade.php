@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Coupon Page  <a href="{{url('add-coupon')}}" class="btn btn-dark float-end" >Add Coupon</a></h4>
		</div>
		<hr style="border : 1px solid;margin-top: -10px;">
		<div class="card-body">
			<table class="table table-bordered  align-middle">
					<tr>
						<th>Id</th>
						<th>Code</th>
						<th>Coupon Type</th>
						<th>Amount</th>
						<th>Expiry Date</th>
						<th class="text-center">Action</th>
					</tr>
					@foreach($coupons as $coupon)
					<tr>
						<td>{{$coupon->id}}</td>
						<td>{{$coupon->code}}</td>
						<td>{{$coupon->type}}</td>
						<td>{{$coupon->value}}
						   @if($coupon->type == "percent")
						   	%
						   @else
						    MMK
						   @endif
						</td>
						<td>{{$coupon->expiry_date}}</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="{{url('edit-coupon/'.$coupon->id)}}" class="btn-sm  btn-primary">Edit</a>
							<a href="{{url('delete-coupon/'.$coupon->id)}}" class="btn-sm
							 btn-danger">Delete</a>
						</td>
					</tr>
					@endforeach
			</table>
		</div>
	</div>
@endsection