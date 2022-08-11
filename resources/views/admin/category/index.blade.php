@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Category Page  <a href="{{url('add-category')}}" class="btn btn-dark float-end" >Add Category</a></h4>
		</div>
		<hr style="border : 1px solid;margin-top: -10px;">
		<div class="card-body">
			<table class="table table-bordered  align-middle">
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Description</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
					@foreach($category as $item)
					<tr>
						<td>{{$item->id}}</td>
						<td>{{$item->name}}</td>
						<td>{{$item->description}}</td>
						<td>
							<img src="{{asset('assets/uploads/category/'.$item->image)}}" style="width:100px;">
						</td>
						<td>
							<a href="{{url('edit-category/'.$item->id)}}" class="btn btn-primary">Edit</a>
							<a href="{{url('delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a>
						</td>
					</tr>
					@endforeach
			</table>
		</div>
	</div>

@endsection