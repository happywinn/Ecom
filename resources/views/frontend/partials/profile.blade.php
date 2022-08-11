@extends('layouts.front')
@section('content')
<div class="row" style="margin-top: 80px;margin-bottom: 50px;">
	<div class="col-3" style="margin-left: 30px;">
		@include('layouts.profileComponents.profile-settings')	
	</div>
	@if ($setting_type == 'profile')
	  @include('frontend.partials.personal-info')
	@endif
	@if ($setting_type == 'address')
	  @include('frontend.partials.personal-address')
	@endif
	@if ($setting_type == 'orders')
	  @include('frontend.partials.personal-orders')
	@elseif ($setting_type == 'wishlists')
	  @include('frontend.partials.personal-wishlists')
	@endif
</div>
@endsection

