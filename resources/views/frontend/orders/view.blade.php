@extends('layouts.front')
@section('content')
  <div class="container py-5">
  	<div class="row">
  	  <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Order View
            <a href="{{url('my-orders')}}" class="btn btn-secondary float-end">Back</a>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-5 order-details">
                <h4>Shipping Details</h4>
                <hr>
                <label for="">First Name</label>
                <input type="text" name="lname" class="form-control lastname" value="{{$orders->fname}}" disabled>
                <label for="">Last Name</label>
                <div class="border"></div>
                <input type="text" name="lname" class="form-control lastname" value="{{$orders->lname}}" disabled>
                <label for="">Email</label>
                <input type="text" name="lname" class="form-control lastname" value="{{$orders->email}}" disabled>
                <label for="">Contact No.</label>
                <input type="text" name="lname" class="form-control lastname" value="{{$orders->phone}}" disabled>
                <label for="">Shipping Address</label>
                <textarea  rows="7" class="form-control" style="background-color: #e6e7f0;">
                  &nbsp;&nbsp;{{$orders->address1}},
                  {{$orders->address2}},
                  {{$orders->city}},
                  {{$orders->state}},
                  {{$orders->country}},
                </textarea>
                <label for="">Zip Code</label>
                <input type="text" name="lname" class="form-control lastname" value="{{$orders->pincode}}" disabled>
              </div>
              <div class="col-md-6">
                <h4>Order Details</h4>
                <hr>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Image</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders->orderitems as $item)
                    <tr>
                      <td>{{$item->products->name}}</td>
                      <td>{{$item->qty}}</td>
                      <td>{{number_format((1- (intval($item->products->discount)/100)) * $item->products->original_price * $item->qty)}} <strong>Ks</strong></td>
                      <td>
                        <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" width="50px">
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <h4>&nbsp;&nbsp;&nbsp;Grand Total : &nbsp;&nbsp;<span style="color: #a4201d;">{{number_format($total - session()->get('coupon')['discount'])}} </span>Ks</h4>
              </div>
            </div>
            
          </div><!-- card body-->
        </div><!-- card end-->
  	  	
  	  </div>
  	</div>
  </div>
@endsection