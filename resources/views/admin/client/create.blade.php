@extends('layouts.panel')

@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Registrar nuevo cliente</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{url('clients')}}">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                </div>

                <div class="form-group">
                  <label for="email">Correo</label>
                  <input type="email" class="form-control" name="email" value="{{old('email')}}">
                </div>

                <div class="form-group">
                  <label for="address">Direccion</label>
                  <input type="text" class="form-control" name="address" value="{{old('address')}}">
                </div>

                <div class="form-group">
                  <label for="city">Ciudad</label>
                  <input type="text" class="form-control" name="city" value="{{old('city')}}">
                </div>

                <div class="form-group">
                  <label for="password">Contraseña</label>
                  <input type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control" name="status">
                    <option value="on">Activo</option>
                    <option value="off">Inactivo</option>
                  </select>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-block btn-primary">Guardar</button>
                  </div>
                  <div class="col-md-4">
                    <a href="/clients" class="btn btn-block btn-warning">Volver</a>
                  </div>

                </div>

              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->

        </div>
      </section>
      <!-- /.content -->
    </div>

  @endsection
