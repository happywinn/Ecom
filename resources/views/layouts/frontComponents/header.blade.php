<header class="section-header fixed-top" >
  	<!-- ========================= TOP HEADER ========================= -->
  	<section class="header-main border-bottom">
	  <div class="container">
		<div class="row align-items-center">
			<div class="col-xl-2 col-lg-3 col-md-12 logo-show">
				<a href="{{url('/')}}" class="brand-wrap">
					<h2 class="logo"><strong><em>Shwe</em></strong><em class="secondem"> Linyon</em></h2>
				</a> <!-- brand-wrap.// -->
			</div>
			<div class="col-xl-6 col-lg-5 col-md-6 search-div">
				<form action="{{url('searched-products')}}" class="search-header" method="POST">
					@csrf
					<div class="input-group w-100">
						<select class="custom-select border-right"  name="category_name">
								<option value="">All type</option><option value="codex">Special</option>
								<option value="content">Latest</option>
						</select>
					    <input type="search" id="search_product" class="form-control" name="product_name" placeholder="Search">
					    
					    <div class="input-group-append search-bar">
					      <button class="btn btn-primary"  type="submit">
					        <i class="fa fa-search"></i> Search
					      </button>
					    </div>
				    </div>
				</form> <!-- search-wrap .end// -->
			</div> <!-- col.// -->
			<div class="col-xl-4 col-lg-4 col-md-6">
				<div class="widgets-wrap float-md-right">
					@if(Auth::check())
						@if(Auth::user()->role_as == "1")
						<div class="widget-header mr-3">
							<a href="{{url('dashboard')}}" class="widget-view">
							  <div class="icon-area">
							  	<i class="fa-solid fa-gauge"></i>
							  </div>
							  <small class="text"> DashBoard </small>
							</a>
						</div>
						@endif
					@endif
					<div class="widget-header mr-3">
						<a href="{{url('my-orders')}}" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-store"></i>
							</div>
							<small class="text"> Orders </small>
						</a>
					</div>	

					<div class="widget-header mr-3">
						<a href="{{url('wishlist')}}" class="widget-view {{Auth::check() ? 'wish-to-db' : ''}}">
							<div class="icon-area">
								<i class="fa fa-heart"></i>
								<span class="notify wish-count">0</span>
							</div>
							<small class="text"> My WishList </small>
						</a>
					</div>
					
					
					<div class="widget-header">
						<a href="{{url('cart')}}" class="widget-view {{Auth::check() ? 'cart-to-db' : ''}}">
							<div class="icon-area">
								<i class="fa fa-shopping-cart"></i>
								<span class="notify cart-count">0</span>
							</div>
							<small class="text"> Cart </small>
						</a>
					</div>
					<div class="widget-header mr-3">
						@if(Auth::check())
						<a class="dropdown-toggle widget-view" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
							<div class="icon-area">
								<i class="fa fa-user"></i>
							</div>
							<!-- <small class="text"> My profile </small> -->
						</a>
							<small class="text" style="margin-left:10px;"> {{Str::limit(Auth::user()->name,3)}} </small>

						<ul class="dropdown-menu" 
						  aria-labelledby="dropdownMenuButton2">
						  <li>
						  	<a class="dropdown-item" href="{{route('user.profile')}}">Profile</a>
						  </li>
						  <li>
						  	<a class="dropdown-item" href="{{url('logout')}}" onclick="event.preventDefault();document.getElementById('frm-logout').submit();">Logout</a>
						  	<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
						       @csrf
						    </form>
						  </li>
						</ul>
						@else 
						<a href="{{url('login')}}" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-user"></i>
							</div>
							<small class="text"> Login </small>
						</a>
						@endif
					</div>
				</div> <!-- widgets-wrap.// -->
			</div> <!-- col.// -->
		</div> <!-- row.// -->
	  </div> <!-- container.// -->
	</section> <!-- header-main .// -->
	<!-- ========================= TOP HEADER END // =================== -->
</header> <!-- section-header.// -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    window.onscroll = () => {
			if (window.scrollY > 300) {
			   $(".align-items-center").each(function() {
				$(".widget-header").hide();
			  });
			   $(".logo-show").show();
			   $(".search-div").addClass("only-search");

				
			} else {
				$(".align-items-center").each(function() {
				   $(".widget-header").show();
				});
				$(".logo-show").show();
			   $(".search-div").removeClass("only-search");
			  }
		};
  </script>