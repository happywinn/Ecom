@extends('layouts.admin')
@section('content')
  <div class="container">
  	<div class="row">
  		<div class="col-md-12">
  			<div class="card">
  			  <div class="card-header">
  			    <h4>New Orders
              <a href="{{url('order-history')}}" class="btn btn-warning float-end">Order History</a>
            </h4>
  			  </div>
  			  <div class="card-body">
  			    <table class="table table-bordered table-striped">
  			        <tr>
  			          <th>Order Date</th>
  			          <th>Tracking Number</th>
  			          <th>Total Price</th>
  			          <th>Status</th>
  			          <th >Action</th>
  			        </tr>
  			      
  			        @foreach($orders as $item)
  			        <tr>
  			          <td>{{date('d-m-y',strtotime($item->created_at))}}</td>
  			          <td>{{$item->tracking_no}}</td>
  			          <td>{{$item->total_price}}</td>
  			          <td>{{$item->status == '0'? 'pending' : 'completed'}}</td>
  			          <td>
  			            <a href="{{url('admin/view-order/'.$item->id)}}" class="btn-sm btn-primary">View</a>
  			          </td>
  			        </tr>
  			        @endforeach
  			    </table>
  			  </div><!-- card body-->
  			</div><!-- card end-->
  		</div>
  	</div>
  </div>
@endsection