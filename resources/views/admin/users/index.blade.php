@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Registed users</h4>
		</div>
		<div class="card-body">
			<table class="table table-bordered  align-middle">
				
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th class="text-center">Action</th>
					</tr>
					@foreach($users as $item)
					<tr>
						<td>{{$item->id}}</td>
						<td>{{$item->name.' '.$item->lname}}</td>
						<td>{{$item->email}}</td>
						<td>{{$item->phone}}</td>
						
						<td>&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="{{url('view-user/'.$item->id)}}" class="btn-sm btn-primary">View</a>
							<form action="{{url('user/'.$item->id)}}" method="POST" style="display: inline;">
								<button class="btn-sm btn-danger"  type="submit">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
			</table>
		</div>
	</div>

@endsection