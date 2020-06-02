@extends('layouts.app')

@section('content')
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Ingresar</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Iniciar Sesíon</p>

        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required >
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                  Recordar
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center mb-3">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="{{ route('password.request') }}">Olvido su contraseña</a>
        </p>
        <p class="mb-0">
          <a href="{{ route('register') }}" class="text-center">Registrarse</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
@endsection
