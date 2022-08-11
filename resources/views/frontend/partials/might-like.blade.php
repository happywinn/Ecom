<div class="container">
  <h4 style="color: #66545c;">You might also like ... </h4>
 
  <div class="row row-sm">
	@foreach($related_products as $prod)
	<div class="col-xl-2 col-lg-3 col-md-4 col-6 ">
	  <div class="card card-sm card-product-grid">
		<a href="{{route('home.itemdetail',[$prod->category->name,$prod->type,$prod->name])}}" class="img-wrap"> <img src="{{asset('assets/uploads/product/'.$prod->image)}}"></a>
		<figcaption class="info-wrap">
			<a href="#" class="title">{{Str::limit($prod->name,15)}}</a>
			<div class="price mt-1">{{number_format($prod->selling_price)}} Ks
				<span class="float-right">
					<span class="product_data">
					  <input type="hidden" value="{{$prod->id}}" class="prod_id">
					  <i class="fa fa-heart {{Auth::check() ? 'addToWishlist' : ''}}" {{Auth::check() ?'' : 'data-toggle=modal data-target=#loginModal'}} style="font-size: 20px;cursor: pointer;"></i>
					 </span>
					<span class="product_data">
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
  </div> <!-- row.// -->
  @include('frontend.partials.modal')
</div>	