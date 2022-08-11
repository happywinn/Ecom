<!-- =============== SECTION DEAL =============== -->
<section class="padding-bottom">
	<div class="card card-deal">
		<div class="col-heading content-body">
			<header class="section-heading">
				<h3 class="section-title">Discount Items</h3>
				<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</header><!-- sect-heading -->
			<a href="{{url('/collections')}}" class="btn btn-outline-dark rounded-pill mt-3">Show More</a>
		</div> <!-- col.// -->
		<div class="row no-gutters items-wrap">
		  @foreach($discount_products as $prod)
			<div class="col-md col-6">
				<figure class="card-product-grid card-sm">
					<a href="{{route('home.itemdetail',[$prod->category->name,$prod->type,$prod->name])}}" class="img-wrap"> 
						<img src="{{asset('assets/uploads/product/'.$prod->image)}}"> 
					</a>
					<div class="text-wrap p-3">
						<a href="#" class="title">{{Str::limit($prod->name,10)}}</a>
						<span class="badge badge-danger"> -{{$prod->discount}}% </span>
					</div>
				</figure>
			</div> <!-- col.// -->
		  @endforeach
			
		</div>
	</div>

</section>
<!-- =============== SECTION DEAL // END =============== -->