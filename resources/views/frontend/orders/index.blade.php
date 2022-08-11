@extends('layouts.front')
@section('content')
  <div class="container py-5">
  	<div class="row">
  	  <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>My Orders</h4>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Tracking Number</th>
                  <th>Total Price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $item)
                <tr>
                  <td>{{$item->tracking_no}}</td>
                  <td>{{number_format($item->total_price)}} MMK</td>
                  <td>{{$item->status == '0'? 'pending' : 'completed'}}</td>
                  <td>
                    <a href="{{url('view-order/'.$item->id)}}" class="btn-sm btn-primary">View</a>
                    <form action="{{route('order.destroy',$item->id)}}" method="POST" style="display: inline;">
                      @csrf
                      @method('delete')
                      <button class="btn-sm btn-outline-dark" type="submit" style="font-size: 15px;"><i class="fas fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- card body-->
        </div><!-- card end-->
  	  	
  	  </div>
  	</div>
  </div>
@endsection