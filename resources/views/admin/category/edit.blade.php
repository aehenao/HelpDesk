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
              <h3 class="card-title">Editar Categoria</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{url('categories/'. $category->id)}}">
              @csrf
              @method('PUT')
              <div class="card-body">

                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{old('name', $category->name)}}" required>
                </div>

                <div class="form-group">
                  <label for="ans">Tiempo Max <small>Hrs</small></label>
                  <input type="number" class="form-control" name="ans" value="{{old('ans', $category->ans)}}" required>
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
