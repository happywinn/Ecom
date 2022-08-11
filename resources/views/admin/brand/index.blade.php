@extends('layouts.admin')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Brand Page  <a href="{{url('add-brand')}}" class="btn btn-dark float-end" >Add Brand</a></h4>
		</div>
		<hr style="border : 1px solid;margin-top: -10px;">
		<div class="card-body">
			<table class="table table-bordered  align-middle">
					<tr>
						<th>Id</th>
						<th>Category</th>
						<th>Name</th>
						<th>Slug</th>
						<th>&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
					</tr>
					@foreach($brands as $item)
					<tr>
						<td>{{$item->id}}</td>
						<td>{{$item->category->name}}</td>
						<td>{{$item->name}}</td>
						<td>{{$item->slug}}</td>
						<td>
							<a href="{{url('edit-brand/'.$item->id)}}" class="btn-sm btn-primary">Edit</a>
							<a href="{{url('delete-brand/'.$item->id)}}" class="btn-sm btn-danger">Delete</a>
						</td>
					</tr>
					@endforeach
			</table>
		</div>
	</div>
@endsection