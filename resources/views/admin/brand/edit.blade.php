@extends('layouts.admin')
@section('content')
	<div class="card card-custom">
		<div class="card-header">
			<h4>Edit Brand</h4>
			<hr style="border : 1px solid;">
		</div>
		<div class="card-body">
			<form action="{{url('update-brand/'.$brands->id)}}" method="POST">
			@csrf
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="">Category</label>
						<select class="form-select" style="background-color: #e6e7f0;">
							<option>{{$brands->category->name}}</option>
						</select>
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Name</label>
						<input type="text" class="form-control" name="name" value="{{$brands->name}}">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Slug</label>
						<input type="text" class="form-control" name="type" value="{{$brands->slug}}">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Status</label>
						<input type="checkbox" 
						{{$brands->status == '1' ? 'checked':''}}
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