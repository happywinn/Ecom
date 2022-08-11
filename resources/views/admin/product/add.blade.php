@extends('layouts.admin')
@section('content')
	<div class="card card-custom">
		<div class="card-header">
			<h4>Add Product</h4>
			<hr style="border : 1px solid;">
		</div>
		<div class="card-body">
			<form action="{{url('insert-product')}}" method="post" enctype="multipart/form-data">
			@csrf
				<div class="row">
					<div class="col-md-12 mb-3">
						<select class="form-select" name="cate_id">
							<option>Select a Category</option>
							@foreach($category as $item)
							<option value="{{$item->id}}">
								{{$item->name}}
							</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-4 mb-3">
						<label for="">Name</label>
						<input type="text" class="form-control" name="name">
					</div>
					<div class="col-md-4 mb-3">
						<label for="">Type</label>
						<input type="text" class="form-control" name="type">
					</div>
					<div class="col-md-4 mb-3">
						<label for="">Brand</label>
						<select class="form-select" name="cate_id">
							<option>Select a Brand</option>
							@foreach($brands as $brand)
							<option value="{{$item->id}}">
								{{$brand->name}}
							</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-12 mb-3">
						<textarea name="small-description" rows="5" class="form-control" placeholder="Small Description"></textarea>
					</div>
					<div class="col-md-12 mb-3">
						<textarea name="description" rows="5" class="form-control" placeholder="Description"></textarea>
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Original Price</label>
						<input type="text" name="original-price"
						  class="form-control">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Selling Price</label>
						<input type="text" name="selling-price"
						  class="form-control">
					</div>
					<div class="col-md-4 mb-3">
						<label for="">Tax</label>
						<input type="text" name="tax"
						  class="form-control">
					</div>
					<div class="col-md-4 mb-3">
						<label for="">Quantity</label>
						<input type="text" name="quantity"
						  class="form-control">
					</div>
					<div class="col-md-4 mb-3">
						<label for="">Discount</label>
						<input type="text" name="discount"
						  class="form-control">
					</div>
					<div class="col-md-4 mb-3">
						<label for="">Status</label>
						<input type="checkbox" name="status">
					</div>
					<div class="col-md-4 mb-3">
						<label for="">Trending</label>
						<input type="checkbox" name="trending">
					</div>
					<div class="col-md-4 mb-3">
						<label for="">New Arrival</label>
						<input type="checkbox" name="new_arrival">
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
					<div class="col-md-12 mb-3">
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