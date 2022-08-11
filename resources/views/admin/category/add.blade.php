@extends('layouts.admin')
@section('content')
	<div class="card card-custom">
		<div class="card-header">
			<h4>Add Category</h4>
			<hr style="border : 1px solid;">
		</div>
		<div class="card-body">
			<form action="{{url('insert-category')}}" method="post" enctype="multipart/form-data">
			@csrf
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="">Name</label>
						<input type="text" class="form-control" name="name">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Type</label>
						<input type="text" class="form-control" name="type">
					</div>
					<div class="col-md-12 mb-3">
						<textarea name="description" rows="5" class="form-control" placeholder="Description"></textarea>
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Status</label>
						<input type="checkbox" name="status">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Popular</label>
						<input type="checkbox" name="popular">
					</div>
					
					<div class="col-md-12 mb-3">
						<label for="">Meta Title</label>
						<input type="text" class="form-control" name="meta_title">
					</div>
					<div class="col-md-12 mb-3">
						<label for="">Meta Keywords</label>
						<textarea type="text" class="form-control" name="meta_keywords" rows="3"></textarea>
					</div>
					<div class="col-md-12 mb-3">
						<label for="">Meta Description</label>
						<textarea type="text" class="form-control" name="meta_description" rows="3"></textarea>
					</div>
					<div class="col-md-12 mb-3 custom-file-upload">
						<input type="file" name="image" class="form-control custom-file-input">
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
	
@endsection