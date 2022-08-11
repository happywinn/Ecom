
@extends('layouts.front')
@section('content')

<!-- ========================= COMPONENT LOGIN ========================= -->
<div class="container">
  <section class="section-content padding-y" style="min-height:80vh">
    <div class="card mx-auto" style="max-width: 380px; margin-top:20px;">
      <div class="card-body">
        <h4 class="card-title mb-4">Sign in</h4>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <!-- <a href="#" class="btn btn-facebook btn-block mb-2"> 
            <i class="fab fa-facebook-f"></i> &nbsp  Sign in with Facebook
          </a> -->
          <a href="{{route('google-auth')}}" class="btn btn-google btn-block mb-4"> <i class="fab fa-google"></i 	> &nbsp  Sign in with Google
          </a>
          <div class="form-group">
            <input name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" type="email" required>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror      
          </div> <!-- form-group// -->
          <div class="form-group">
            <input name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" type="password" required>
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div> <!-- form-group// -->

          <div class="form-group">
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="float-right">{{ __('Forgot Your Password?') }}?</a> 

            @endif

            <label class="float-left custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}> 
              <div class="custom-control-label"> Remember </div> 
            </label>
          </div> <!-- form-group form-check .// -->
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Login  </button>
          </div> <!-- form-group// -->    
        </form>
      </div> <!-- card-body.// -->
    </div> <!-- card .// -->

    <p class="text-center mt-4">Don't have account? <a href="{{url('register')}}">Sign up</a></p>
    <br><br>
  </section>
</div> <!-- container .// -->
<!-- ========================= COMPONENT LOGIN END //========================= -->
@endsection
