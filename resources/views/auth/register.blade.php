@extends('layouts.app')

@section('style')
  <style media="screen">
  .cabecera {
    width: 100%;
    position: relative;
    background-color: #13251c;
    z-index: 1;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    align-items: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    padding: 10px 15px 10px 15px;
  }

  .btn-back {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 20px;
    height: 50px;
    margin-left: 10px;
    background-color: #1b72cc;
    border-radius: 25px;
    font-family: Poppins-Regular;
    font-size: 16px;
    color: #fff;
    line-height: 1.2;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    -moz-transition: all 0.4s;
    transition: all 0.4s;
  }

  .btn-back:hover {
    background-color: #333333;
    color: white;
  }
  </style>

@endsection

@section('content')
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">

        <div class="cabecera" >
          <span class="login100-form-title-1">
            Registro
          </span>
          <small style="color: #dadada; padding: 5px 5px 5px 50px; ">Este registro básico le permitirá acceder a la plataforma como cliente, una vez se encuentre en su cuenta, podrá completar el registro de forma detallada.</small>
        </div>

        <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
          @csrf

          <div class="wrap-input100 validate-input m-b-21 ">
            <span class="label-input100">Nombre Completo</span>
            <input class="input100 " name="name" type="text" required>
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-21 ">
            <span class="label-input100">Ciudad <small>(Colombia)</small> </span>
            <input class="input100 " name="city" type="text" required>
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-21 ">
            <span class="label-input100">Correo</span>
            <input class="input100 " name="email" type="email" required>
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-18 " data-validate = "Password is required">
            <span class="label-input100">Contraseña</span>
            <input class="input100" name="password" required type="password">
            <span class="focus-input100"></span>
          </div>

          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
              Enviar
            </button>
            <a href="/login" class="btn-back">Volver</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
