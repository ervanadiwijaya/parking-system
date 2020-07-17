
<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.admin.head')
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
                @include('layouts.components.messageAlert')
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                    <label class="label">Email</label>
                    <div class="input-group">
                        <input value="{{ old('email') }}" name="email" type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline @error('email') mdi-close-circle @enderror"></i>
                            </span>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="*********">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline @error('password') mdi-close-circle @enderror"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary submit-btn btn-block">{{ __('Login') }}</button>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                    <div class="form-check form-check-flat mt-0">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="text-small forgot-password text-black" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
</body>

</html>