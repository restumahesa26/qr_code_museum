<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Stisla</title>

  @include('includes.style')
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <img src="{{ url('logo.png') }}" alt="logo" width="100" class="">
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li class="text-danger">{{ $item }}</li>
                        @endforeach
                    </ul>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label for="login">Email / Username</label>
                                <input id="login" type="text" class="form-control" name="login" tabindex="1" required autofocus value="{{ old('login') }}">
                                <div class="invalid-feedback">
                                    Please fill in your email or username
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                    <div class="float-right">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-small">
                                                Forgot Password?
                                            </a>
                                        @endif

                                    </div>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                    please fill in your password
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember">
                                    <label class="custom-control-label" for="remember">Remember Me</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-5 text-muted text-center">
                    Don't have an account? <a href="{{ route('register') }}">Create One</a>
                </div>
                <div class="simple-footer">
                    Copyright &copy; Stisla 2018
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>

  @include('includes.script')
</body>
</html>
