<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="pragma" content="no-cache" />
  <meta http-equiv="cache-control" content="max-age=604800"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
    <meta name="csrf-token" content = "{{ csrf_token() }}">

  <title>@yield('title')</title>

  <link href="" rel="shortcut icon" type="image/x-icon">
  <link href="{{ asset('/assets/images/favicon.ico') }}" rel="stylesheet">

  <!-- jQuery -->
  <script src="{{ asset('/assets/js/jquery-2.0.0.min.js') }}"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

  <!-- Bootstrap4 files--> 
  <script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
  <link href="{{ asset('/assets/css/bootstrap.css') }}" rel="stylesheet">

  <!-- Font awesome 5 -->
  <link href="" type="text/css" rel="stylesheet">
  <link href="{{ asset('/assets/fonts/fontawesome/css/all.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- custom style -->
  <link href="{{ asset('/assets/css/ui.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/css/responsive.css') }}" rel="stylesheet">
  <link href="{{ asset('/frontend/css/custom.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
   
  @yield('styles')

</head>
<body>
  @include('layouts.frontComponents.header')
  @yield("content")
  @include('layouts.frontComponents.footer')

  <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
  <script src="{{ asset('frontend/js/owl.carousel.min.js') }}" defer></script>
  <script src="{{ asset('frontend/js/custom.js') }}" defer></script>
  <script src="{{ asset('frontend/js/checkout.js') }}" defer></script>
  <script src="{{ asset('frontend/js/shoppingCart.js') }}" defer></script>
  <script src="{{ asset('frontend/js/shoppingWish.js') }}" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- <script src="{{ asset('frontend/js/jquery-3-2-1.js') }}"></script> -->

   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  @yield('scripts')
</body>
</html>