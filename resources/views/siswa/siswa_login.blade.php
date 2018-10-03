<!doctype html>
<html lang="en">
  
<!-- Mirrored from getbootstrap.com/docs/4.1/examples/sign-in/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jun 2018 04:27:32 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
  </head>

  <body class="text-center">
    <form  class="form-signin" method="POST" action="{{ route('siswa.login') }}">
    @csrf
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      <label for="nisn" class="sr-only">NISN</label>
      <input id="nisn" type="text" class="form-control{{ $errors->has('nisn') ? ' is-invalid' : '' }}" name="nisn" placeholder="Nisn" value="{{ old('nisn') }}" required autofocus>
            @if ($errors->has('nisn'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('nisn') }}</strong>
                </span>
            @endif
      <label for="inputPassword" class="sr-only">Password</label>
      <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Login') }}</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
 
<!-- Mirrored from getbootstrap.com/docs/4.1/examples/sign-in/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jun 2018 04:27:32 GMT -->
</html>
