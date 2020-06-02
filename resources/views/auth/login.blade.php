@extends('layouts.app')

@section('style')
  <style>
   .description{
     font-family: Poppins-Bold;
     font-size: 14px;
     color: #efefef;
     text-align: center;
     padding-top: 15px;
   }
  </style>
@endsection

@section('content')
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-form-title" style="background-image: url({{asset('images/helpdesk_logo.jpg')}}); background-size: 100% 120%;">
          <span class="login100-form-title-1">
            ¡Hola!
          </span>
          <small class="description">Si eres cliente, ingresa y reporta tu inconveniente y en cuestión de minutos un técnico se pondrá en contacto contigo, <b style="color: #61f361;">mantente conectado.</b></small>
        </div>

        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
          @csrf

          <div class="wrap-input100 validate-input m-b-26">
            <span class="label-input100">Correo</span>
            <input class="input100 @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus name="email" type="email" >
            <span class="focus-input100"></span>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
            <span class="label-input100">Contraseña</span>
            <input class="input100 @error('password') is-invalid @enderror" placeholder="Password" name="password" required type="password">
            <span class="focus-input100"></span>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

          </div>

          <div class="flex-sb-m w-full p-b-30 row">
{{--
            <div class="col-sm">
              <a href="{{ route('register') }}" class="txt1">
                Registrarme
              </a>
            </div>

            <div class="col-sm">
              <a href="{{ route('password.request') }}" class="txt1">
                ¿Olvido su contraseña?
              </a>
            </div> --}}

          </div>

          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
              Ingresar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
