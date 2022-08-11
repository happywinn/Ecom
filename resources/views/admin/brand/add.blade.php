@extends('layouts.admin')
@section('content')
	<div class="card card-custom">
		<div class="card-header">
			<h4>Add Brand</h4>
			<hr style="border : 1px solid;">
		</div>
		<div class="card-body">
			<form action="{{url('insert-brand')}}" method="post">
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
					<div class="col-md-6 mb-3">
						<label for="">Name</label>
						<input type="text" class="form-control" name="name" required="">
					</div>
					<div class="col-md-6 mb-3">
						<label for="">Slug</label>
						<input type="text" class="form-control" name="slug" required="">
					</div>
					<div class="col-md-6 mb-3">
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
	
@endsection