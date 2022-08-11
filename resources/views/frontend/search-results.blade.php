@extends('layouts.front')

@section('title', 'Items')

@section('content')


<!-- =============== SECTION ITEMS =============== -->
<section  class="padding-y" style="margin-top: 80px;" >
	<h2 class="text-center" style="margin: 10px;padding: 10px;color: #996868;">Search Products</h2><br>
	@if($featured_products->count() == 0)
		<p class="text-center h5 text-muted">Sorry! No Such Product Found.</p>
	@endif 
	<div class="row row-sm">
		<div class="col-1"></div>
		<div class="col-10">
			<div class="row row=sm">
				@foreach($featured_products as $prod)
				<div class="col-xl-3 col-lg-3 col-md-4 col-6 ">
					<div class="card card-sm card-product-grid">
						<a href="{{route('home.itemdetail',[$prod->category->name, $prod->type, $prod->name])}}" class="img-wrap"> <img src="{{asset('assets/uploads/product/'.$prod->image)}}"></a>
						<figcaption class="info-wrap">
							<a href="#" class="title">{{$prod->name}}</a>
							<div class="price mt-1 product_data">{{$prod->selling_price}} MMK
								<span class="float-right">
									<span>
										<i class="fa fa-heart {{Auth::check() ? 'addToWishlist' : ''}}" {{Auth::check() ?'' : 'data-toggle=modal data-target=#loginModal'}} style="font-size: 20px;cursor: pointer;"></i>
									</span>
									<span>
										<i class="fa fa-shopping-cart {{Auth::check() ? 'addToCartBtn1' : ''}}" {{Auth::check() ?'' : 'data-toggle=modal data-target=#loginModal'}} style="font-size: 20px;cursor: pointer;">
											<input type="hidden"  class="prod_id" id="a" value="{{$prod->id}}">
											<input type="hidden"  class="qty-input" id="b" value="1">
										</i>
									</span>
								</span>
							</div> <!-- price-wrap.// -->
						</figcaption>
					</div>
				</div> <!-- col.// -->
				@endforeach
			</div>
		</div>
		<div class="col-1"></div>
	</div> <!-- row.// -->
	<a href="#" id="loadMore">Show More</a>
</section>
@include('frontend.partials.modal')
<!-- =============== SECTION ITEMS .//END =============== -->
@endsection