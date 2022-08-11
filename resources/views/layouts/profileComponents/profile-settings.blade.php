<aside class="col-lg col-md-3 flex-lg-grow-0">
	<nav class="nav-home-aside">
		<h6 class="title-category">Settings <i class="d-md-none icon fa fa-chevron-down"></i></h6>
		<ul class="menu-category">
			<li><a href="{{route('user.settings','profile')}}">Personal Information</a></li>
			<li><a href="{{route('user.settings','address')}}">Addresses</a></li>
			<li><a href="{{route('user.settings','orders')}}">My Orders</a></li>
			<li><a href="{{route('user.settings','wishlists')}}">Wishlists</a></li>
			<li>
				<form action="{{ route('logout') }}" id="myform" method="POST">
					@csrf
					<a href="#" onclick="document.querySelector('#myform').submit()">Logout</a>
				</form>
			</li>
		</ul>
	</nav>
</aside> <!-- col.// -->