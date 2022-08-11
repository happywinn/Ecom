@foreach($featured_products as $prod)
	<div class="col-xl-3 col-lg-3 col-md-4 col-6">
		<div class="card card-sm card-product-grid">
			<a href="{{route('home.itemdetail',[$prod->category->name, $prod->type, $prod->name])}}" class="img-wrap"> <img src="{{asset('assets/uploads/product/'.$prod->image)}}"></a>
			<figcaption class="info-wrap">
				<a href="#" class="title">{{Str::limit($prod->name, 10)}}</a>
				<div class="price mt-1">{{number_format(Str::limit($prod->selling_price, 7))}} Ks
					<span class="float-right product_data">
						<span>
							<i class="fa fa-heart addToWishlist" style="font-size: 20px;cursor: pointer;"></i>
						</span>
						<span>
							<i class="fa fa-shopping-cart {{Auth::check() ? 'addToCartBtn1' : ''}}" {{Auth::check() ?'' : 'data-toggle=modal data-target=#exampleModal'}}  style="font-size: 20px;cursor: pointer;">
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

