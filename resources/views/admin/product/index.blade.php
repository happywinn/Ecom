@extends('layouts.admin')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Product Page  <a href="{{url('add-product')}}" class="btn btn-dark float-end" >Add Product</a></h4>
		</div>
		<hr style="border : 1px solid;margin-top: -10px;">
		<div class="card-body">
			<table class="table table-bordered  align-middle">
				<tr>
					<th>Id</th>
					<th>Category</th>
					<th>Name</th>
					<th>Selling Price</th>
					<th>Image</th>
					<th class="text-center">Action</th>
				</tr>
				@foreach($products as $item)
				<tr>
					<td>{{$item->id}}</td>
					<td>{{$item->category->name}}</td>
					<td>{{$item->name}}</td>
					<td>{{$item->selling_price}}</td>
					<td>
						<img src="{{asset('assets/uploads/product/'.$item->image)}}" style="width:100px;">
					</td>
					<td>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="{{url('edit-product/'.$item->id)}}" class="btn-sm btn-primary">Edit</a>
						<a href="{{url('delete-product/'.$item->id)}}" class="btn-sm btn-danger">Delete</a>
					</td>
				</tr>
					@endforeach
			</table>
		</div>
	</div>

@endsection