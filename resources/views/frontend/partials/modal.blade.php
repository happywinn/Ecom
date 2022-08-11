<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">You need to login first!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group">
          	<label for="exampleInputEmail1">Email address</label>
            <input name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" type="email" required>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror      
          </div> <!-- form-group// -->
          <div class="form-group">
          	<label for="exampleInputPassword1">Password</label>
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
        <p class="text-center mt-4">Don't have account? 
        	<a href="{{url('register')}}">Sign up</a>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>