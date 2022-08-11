@extends('layouts.admin')
@section('content')
    <div class="row">
      <div class="col-lg-3">
        <div class="card">
            <div class="card-body"> 
              <h3>220 <i class="fa fa-shopping-cart float-end" style="font-size:20px;"></i></h3>
              <h5 class="text-muted">Products Sold</h5>
            </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
               <a href="{{asset('users')}}">
                 <h3>{{$total_users->count()}} <i class="fa fa-user float-end" style="font-size:20px;"></i></h3>
                 <h5 class="text-muted">Customers</h5>
               </a>
            </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <a href="{{asset('categories')}}">
                  <h3>{{$total_categories->count()}} <i class="fa fa-list-alt float-end" style="font-size:20px;"></i></h3>
                  <h5 class="text-muted">Categories</h5>
                </a>
            </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <a href="{{asset('products')}}">
                  <h2>{{$total_products->count()}} <i class="fa fa-product-hunt float-end" style="font-size:20px;"></i></h2>
                  <h5 class="text-muted">Total Products</h5>
                </a>
            </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <a href="{{asset('orders')}}">
                  <h2>{{$total_orders->count()}} <i class="fa fa-archive float-end" style="font-size:20px;"></i></h2>
                  <h5 class="text-muted">Total Orders</h5>
                </a>
            </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <h2>{{$complete_orders->count()}} <i class="fa fa-check-circle float-end" style="font-size:20px;"></i></h2>
                <h5 class="text-muted">Complete Orders</h5>
            </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <h2>{{$pending_orders->count()}} <i class="fa fa-pause float-end" style="font-size:20px;"></i></h2>
                <h5 class="text-muted">Pending Orders</h5>
            </div>
        </div>
      </div>
    </div>
    
@endsection