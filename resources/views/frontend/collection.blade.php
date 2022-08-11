@extends('layouts.front')
@section('content')
<!-- =============== SECTION ITEMS =============== -->
<section style="margin-top: 50px;">
	<h3 class="ml-5">Collections</h3>
	<hr>
	<div class="container">
		<div class="row row-sm">
			@foreach($collections as $item)
			<div class="col-xl-2 col-lg-3 col-md-4 col-6 ">
				<div class="card card-sm card-product-grid">
					<a href="{{route('home.items',$item->name)}}" class="img-wrap"> <img src="{{asset('assets/uploads/category/'.$item->image)}}"></a>
					<figcaption class="info-wrap">
						<a href="#" class="title text-center" style="font-size: 17px;font-weight: bold;">{{$item->name}}</a>
					</figcaption>
				</div>
			</div> <!-- col.// -->
			@endforeach
		</div> <!-- row.// -->
		<a href="#" id="loadMore">Show More</a>
	</div>
</section>
<!-- =============== SECTION ITEMS .//END =============== -->
@endsection