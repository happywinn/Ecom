
  @extends('layouts.front')
  @section('content')
  <!-- ========================= COMPONENT LOGIN ========================= -->
  <div class="container">
    <section class="section-content padding-y" style="min-height:80vh">
      <div class="card mx-auto" style="max-width: 380px; margin-top:20px;">
          <div class="card-body">
            <h4 class="card-title mb-4">Sign Up</h4>
          <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="form-group">
          <input name="name" class="form-control @error('name') is-invalid @enderror" placeholder="User Name" type="text" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror      
            </div> <!-- form-group// -->
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
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                  placeholder="Confirm Password" required autocomplete="new-password" required>
            </div> <!-- form-group// -->
                
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"> Sign Up  </button>
            </div> <!-- form-group// -->    
          </form>
          </div> <!-- card-body.// -->
      </div> <!-- card .// -->

      <p class="text-center mt-4">Don't have account? <a href="{{url('login')}}">Sign In</a></p>
      <br><br>
    </section>
  </div> <!-- container .// -->
  <!-- ========================= COMPONENT LOGIN END //========================= -->
  @endsection
