@extends('layouts.front')
@section('content')
<div class="container">
	<!-- ========================= SECTION MAIN  ========================= -->
	<section class="section-main padding-y">
		<main class="card">
			<div class="card-body">
				<div class="row">
					<aside class="col-lg col-md-3 flex-lg-grow-0">
						<nav class="nav-home-aside">
							<h6 class="title-category">MY MARKETS <i class="d-md-none icon fa fa-chevron-down"></i></h6>
							<ul class="menu-category">
								<li class="has-submenu"><a href="#">Electronics</a>
									<ul class="submenu">
										<li><a href="{{route('home.items','laptops')}}">Laptops</a></li>
										<li><a href="{{route('home.items','mobile-phones')}}">Mobile Phones</a></li>
										<li><a href="#">Desktop</a></li>
										<li><a href="#">Headphone</a></li>
										<li><a href="#">Webcam</a></li>
										<li><a href="#">Bluetooth Handsfree</a></li>
									</ul>
								</li>
								<li class="has-submenu"><a href="{{route('home.items','mobile-phones')}}">Mobile Phones</a>
									<ul class="submenu">
										<li><a href="#">Submenu name</a></li>
										<li><a href="#">Great submenu</a></li>
										<li><a href="#">Another menu</a></li>
										<li><a href="#">Some others</a></li>
									</ul>
								</li>
								<li><a href="#">Bluetooth Handsfree</a></li>
								<li><a href="#">Digital Cameras</a></li>
								<li><a href="#">Watches</a></li>
								<li><a href="#">Earphones</a></li>
								<li><a href="#">Service kits</a></li>
								<li><a href="#">Desktops</a></li>

							</ul>
						</nav>
					</aside> <!-- col.// -->
					<div class="col-md-9 col-xl-7 col-lg-7">

						<!-- ================== COMPONENT SLIDER  BOOTSTRAP  ==================  -->
						<div id="carousel1_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
								<li data-target="#carousel1_indicator" data-slide-to="1"></li>
								<li data-target="#carousel1_indicator" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="assets/images/banners/slide1.jpg" alt="First slide"> 
								</div>
								<div class="carousel-item">
									<img src="assets/images/banners/slide2.jpg" alt="Second slide">
								</div>
								<div class="carousel-item">
									<img src="assets/images/banners/slide3.jpg" alt="Third slide">
								</div>
							</div>
							<a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
						<!-- ==================  COMPONENT SLIDER BOOTSTRAP end.// ==================  .// -->	

					</div> <!-- col.// -->
					<div class="col-md d-none d-lg-block flex-grow-1">
						<aside class="special-home-right">
							<h6 class="bg-blue text-center text-white mb-0 p-2 ">Popular category</h6>

							<div class="card-banner border-bottom">
								<div class="py-3" style="width:80%">
									<h6 class="card-title">Laptop</h6>
									<a href="#" class="btn btn-secondary btn-sm bg-blue-sm"> Source now </a>
								</div> 
								<img src="assets/images/laptop.png" height="80" class="img-bg">
							</div>

							 @foreach($popular_categories as $popular_cate)
								<div class="card-banner border-bottom">
									<div class="py-3" style="width:80%">
										<h6 class="card-title">{{$popular_cate->name}}</h6>
										<a href="#" class="btn btn-secondary btn-sm bg-blue-sm"> Source now </a>
									</div> 
									<img src="{{asset('assets/uploads/category/'.$popular_cate->image)}}" height="80" class="img-bg">
								</div>
							@endforeach

							

							
						</aside>
					</div> <!-- col.// -->
				</div> <!-- row.// -->

			</div> <!-- card-body.// -->
		</main> <!-- card.// -->

	</section>
	<!-- ========================= SECTION MAIN END// ========================= -->



	@include('frontend.partials.discount')



	<!-- =============== SECTION 1 =============== -->
	<section class="padding-bottom">
		<header class="section-heading heading-line">
			<h4 class="title-section text-uppercase">Collection</h4>
		</header>

		<div class="card card-home-category">
			<div class="row no-gutters">
				<div class="col-md-3">

					<div class="home-category-banner bg-light-orange">
						<h5 class="title">Best trending Items only for summer</h5>
						<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						<a href="{{url('/collections')}}" class="btn btn-outline-primary rounded-pill mt-3">Show More</a>
						<img src="" class="img-bg">
					</div>

				</div> <!-- col.// -->
				<div class="col-md-9">
					<ul class="row no-gutters bordered-cols">
						<li class="col-6 col-lg-3 col-md-4">
							<a href="{{route('home.items','laptops')}}" class="item"> 
								<div class="card-body">
									<h6 class="title">Consectetur adipisicing elit </h6>
									<img class="img-sm float-right" src="assets/images/categories1/laptop.png"> 
									<p class="text-muted">Laptops</p>
								</div>
							</a>
						</li>
						<li class="col-6 col-lg-3 col-md-4">
							<a href="#" class="item"> 
								<div class="card-body">
									<h6 class="title">Consectetur adipisicing elit </h6>
									<img class="img-sm float-right" src="assets/images/categories1/webcam.png"> 
									<p class="text-muted">Webcam</p>
								</div>
							</a>
						</li>
						<li class="col-6 col-lg-3 col-md-4">
							<a href="{{route('home.items','Mobile Phone')}}" class="item"> 
								<div class="card-body">
									<h6 class="title">Consectetur adipisicing elit  </h6>
									<img class="img-sm float-right" src="assets/images/categories1/phone2.png"> 
									<p class="text-muted">Phones</p>
								</div>
							</a>
						</li>
						<li class="col-6 col-lg-3 col-md-4">
							<a href="#" class="item"> 
								<div class="card-body">
									<h6 class="title">Consectetur adipisicing elit  </h6>
									<img class="img-sm float-right" src="assets/images/categories1/watch.png"> 
									<p class="text-muted">Watch</p>
								</div>
							</a>	
						</li>
						<li class="col-6 col-lg-3 col-md-4">
							<a href="#" class="item"> 
								<div class="card-body">
									<h6 class="title">Consectetur adipisicing elit </h6>
									<img class="img-sm float-right" src="assets/images/items/5.jpg"> 
									<p class="text-muted">Electronics</p>
								</div>
							</a>
						</li>
						<li class="col-6 col-lg-3 col-md-4">
							<a href="#" class="item"> 
								<div class="card-body">
									<h6 class="title">Consectetur adipisicing elit </h6>
									<img class="img-sm float-right" src="assets/images/categories1/camera.png"> 
									<p class="text-muted">Digital Camera</p>
								</div>
							</a>
						</li>
						<li class="col-6 col-lg-3 col-md-4">
							<a href="#" class="item"> 
								<div class="card-body">
									<h6 class="title">Well made clothes with trending collection </h6>
									<img class="img-sm float-right" src="assets/images/categories1/earphone.png"> 
									<p class="text-muted">Earphone Collection</p>

								</div>
							</a>
						</li>
						<li class="col-6 col-lg-3 col-md-4">
							<a href="#" class="item"> 
								<div class="card-body">
									<h6 class="title">Home and kitchen interior  stuff collection   </h6>
									<img class="img-sm float-right" src="assets/images/items/6.jpg"> 
									<p class="text-muted">Home Accessories</p>
								</div>
							</a>
						</li>
					</ul>
				</div> <!-- col.// -->
			</div> <!-- row.// -->
		</div> <!-- card.// -->
	</section>
	<!-- =============== SECTION 1 END =============== -->




	<!-- =============== SECTION REQUEST =============== -->
<!-- 
<section class="padding-bottom">

<header class="section-heading heading-line">
<h4 class="title-section text-uppercase">Request for Quotation</h4>
</header>

<div class="row">
<div class="col-md-8">
<div class="card-banner banner-quote overlay-gradient" style="background-image: url('images/banners/banner9.jpg');">
<div class="card-img-overlay white">
<h3 class="card-title">An easy way to send request to suppliers</h3>
<p class="card-text" style="max-width: 400px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt.</p>
<a href="#" class="btn btn-primary rounded-pill">Learn more</a>
</div>
</div>
</div> 
<div class="col-md-4">

<div class="card card-body">
<h4 class="title py-3">One Request, Multiple Quotes</h4>
<form>
<div class="form-group">
<input class="form-control" name="" placeholder="What are you looking for?" type="text">
</div>
<div class="form-group">
<div class="input-group">
<input class="form-control" placeholder="Quantity" name="" type="text">

<select class="custom-select form-control">
<option>Pieces</option>
<option>Litres</option>
<option>Tons</option>
<option>Gramms</option>
</select>
</div>
</div>
<div class="form-group text-muted">
<p>Select template type:</p>
<label class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" value="option1">
<span class="form-check-label">Request price</span>
</label>
<label class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" value="option2">
<dspaniv class="form-check-label">Request a sample</span>
</label>
</div>
<div class="form-group">
<button class="btn btn-warning">Request for quote</button>
</div>
</form>
</div>

</div>
</div> 
</section> -->

<!-- =============== SECTION REQUEST .//END =============== -->


<!-- =============== SECTION ITEMS =============== -->
<section  class="padding-y" style="margin-top: 100px;">

	<header class="section-heading heading-line">
		<h4 class="title-section text-uppercase">Just for you</h4>
	</header>

	<div class="row row-sm">
		@foreach($featured_products as $prod)
		<div class="col-xl-2 col-lg-3 col-md-4 col-6 ">
			<div class="card card-sm card-product-grid">
				<a href="{{route('home.itemdetail',[$prod->category->name,$prod->type,$prod->name])}}" class="img-wrap"> <img src="{{asset('assets/uploads/product/'.$prod->image)}}"></a>
				<figcaption class="info-wrap">

					<a href="#" class="title">{{Str::limit($prod->name,15)}}</a>
					<div class="price mt-1 product_data">{{number_format($prod->selling_price)}} Ks 
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


	</div> <!-- row.// -->
	<a href="#" id="loadMore">Show More</a>
</section>


@include('frontend.partials.modal')

<!-- =============== SECTION SERVICES =============== -->
<section  class="padding-bottom">

	<header class="section-heading heading-line">
		<h4 class="title-section text-uppercase">Trade services</h4>
	</header>

	<div class="row">
		<div class="col-md-3 col-sm-6">
			<article class="card card-post">
				<img src="assets/images/posts/1.jpg" class="card-img-top">
				<div class="card-body">
					<h6 class="title">Trade Assurance</h6>
					<p class="small text-uppercase text-muted">Order protection</p>
				</div>
			</article> <!-- card.// -->
		</div> <!-- col.// -->
		<div class="col-md-3 col-sm-6">
			<article class="card card-post">
				<img src="assets/images/posts/2.jpg" class="card-img-top">
				<div class="card-body">
					<h6 class="title">Pay anytime</h6>
					<p class="small text-uppercase text-muted">Finance solution</p>
				</div>
			</article> <!-- card.// -->
		</div> <!-- col.// -->
		<div class="col-md-3 col-sm-6">
			<article class="card card-post">
				<img src="assets/images/posts/3.jpg" class="card-img-top">
				<div class="card-body">
					<h6 class="title">Inspection solution</h6>
					<p class="small text-uppercase text-muted">Easy Inspection</p>
				</div>
			</article> <!-- card.// -->
		</div> <!-- col.// -->
		<div class="col-md-3 col-sm-6">
			<article class="card card-post">
				<img src="assets/images/posts/4.jpg" class="card-img-top">
				<div class="card-body">
					<h6 class="title">Ocean and Air Shipping</h6>
					<p class="small text-uppercase text-muted">Logistic services</p>
				</div>
			</article> <!-- card.// -->
		</div> <!-- col.// -->
	</div> <!-- row.// -->
</section>



<!-- ========================= SECTION SUBSCRIBE  ========================= -->
<section class="section-subscribe padding-y-lg">
	<div class="container">

		<p class="pb-2 text-center text-white">Delivering the latest product trends and industry news straight to your inbox</p>

		<div class="row justify-content-md-center">
			<div class="col-lg-5 col-md-6">
				<form class="form-row">
					<div class="col-md-8 col-7">
						<input class="form-control border-0" placeholder="Your Email" type="email">
					</div> <!-- col.// -->
					<div class="col-md-4 col-5">
						<button type="submit" class="btn btn-block btn-warning"> <i class="fa fa-envelope"></i> Subscribe </button>
					</div> <!-- col.// -->
				</form>
				<small class="form-text text-white-50">We’ll never share your email address with a third-party. </small>
			</div> <!-- col-md-6.// -->
		</div>
	</div>
</section>
<!-- ========================= SECTION SUBSCRIBE END// ========================= -->

@endsection