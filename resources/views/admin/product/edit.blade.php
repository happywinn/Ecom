@extends('layouts.admin')
@section('content')
	<div class="card card-custom">
		<div class="card-header">
			<h4>Add Product</h4>
			<hr style="border : 1px solid;">
		</div>
		<div class="card-body">
			<form action="{{url('update-product/'.$product->id)}}" method="post" enctype="multipart/form-data">
			@csrf
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="">Category</label>
						<select class="form-select" style="background-color: #e6e7f0;">
							<option>&nbsp;&nbsp;{{$product->category->name}}</option>
							@foreach($category as $item)
							<option value="{{$item->id}}">
								{{$item->name}}
							</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-4 mb-3">
						<label for="">Name</label>
						<input type="text" class="form-control" name="name" style="background-color: #e6e7f0;" value="&nbsp;&nbsp;{{$product->name}}">
					</div>
					<div class="col-md-4 mb-3">
						<label for="">Type</label>
						<input type="text" class="form-control" name="type"  style="background-color: #e6e7f0;" value="&nbsp;&nbsp;{{$product->type}}">
					</div>
					<div class="col-md-4 mb-3">
						<label for="">Brand</label>
						<select class="form-select" name="brand_id" style="background-color: #e6e7f0;">
						  @if($product->brand != null )	
							<option>
								&nbsp;&nbsp;{{$product->brand->name}}
							</option>
						  @else
						  	<option>&nbsp;&nbsp;Select a Brand</option>
						  @endif
							@foreach($brands as $brand)
							<option value="{{$item->id}}">
								&nbsp;&nbsp;{{$brand->name}}
							</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-12 mb-3">
						<textarea name="small-description" rows="5" class="form-control" placeholder="Small Description"  style="background-color: #e6e7f0;">
							&nbsp;&nbsp;{{$product->small_description}}
						</textarea>
					</div>
					<div class="col-md-12 mb-3">
						<textarea name="description" rows="5" class="form-control" placeholder="Description"  style="background-color: #e6e7f0;">
							&nbsp;&nbsp;{{$product->description}}
						</textarea>
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Original Price</label>
						<input type="text" name="original-price"
						  class="form-control" style="background-color: #e6e7f0;" value="&nbsp;&nbsp;{{$product->original_price}}">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Selling Price</label>
						<input type="text" name="selling-price"
						  class="form-control" style="background-color: #e6e7f0;" value="&nbsp;&nbsp;{{$product->selling_price}}">
					</div>
					<div class="col-md-4 mb-3">
						<label for="">Tax</label>
						<input type="text" name="tax"
						  class="form-control" style="background-color: #e6e7f0;" value="&nbsp;&nbsp;{{$product->tax}}">
					</div>
					<div class="col-md-4 mb-3">
						<label for="">Quantity</label>
						<input type="text" name="quantity"
						  class="form-control" style="background-color: #e6e7f0;" value="&nbsp;&nbsp;{{$product->qty}}">
					</div>
					<div class="col-md-4 mb-3">
						<label for="">Discount</label>
						<input type="text" name="discount"
						  class="form-control" style="background-color: #e6e7f0;" value="&nbsp;&nbsp;{{$product->discount}}">
					</div>
					<div class="col-md-4 mb-3">
						<label for="">Status</label>
						<input type="checkbox" {{$product->status == '1'? 'checked':''}} name="status">
					</div>
					<div class="col-md-4 mb-3">
						<label for="">Trending</label>
						<input type="checkbox" {{$product->trending == '1'?' checked':''}} name="trending">
					</div>
					<div class="col-md-4 mb-3">
						<label for="">New Arrival</label>
						<input type="checkbox" {{$product->new_arrival == '1'?' checked':''}} name="trending">
					</div>

					<div class="col-md-12 mb-3">
						<label for="">Meta Title</label>
						<input type="text" class="form-control" name="meta_title"  style="background-color: #e6e7f0;" value="&nbsp;&nbsp;{{$product->meta_title}}">
					</div>
					<div class="col-md-12 mb-3">
						<label for="">Meta Keywords</label>
						<textarea type="text" class="form-control" name="meta_keywords" rows="3"  style="background-color: #e6e7f0;">
							&nbsp;&nbsp;{{$product->meta_keywords}}
						</textarea>
					</div>
					<div class="col-md-12 mb-3">
						<label for="">Meta Description</label>
						<textarea type="text" class="form-control" name="meta_description" rows="3"  style="background-color: #e6e7f0;">
							&nbsp;&nbsp; {{$product->meta_description}}
						</textarea>
					</div>
					@if($product->image)
						<img src="{{asset('assets/uploads/product/'.$product->image)}}" style="width: 300px;">
					@endif
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