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
              <h3 class="card-title">Nueva Categoria</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{url('categories')}}">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                </div>

                <div class="form-group">
                  <label for="ans">Tiempo Max <small>Hrs</small></label>
                  <input type="number" class="form-control" name="ans" value="{{old('ans')}}" required>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-block btn-success">Guardar</button>
                  </div>
                  <div class="col-md-4">
                    <a href="/clients" class="btn btn-block bg-gradient-info" style="color: white;">Volver</a>
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
