@extends('layouts.panel')

@section('content')

  <!-- Main content -->
  <section class="content">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle"
          src="../../dist/img/user4-128x128.jpg"
          alt="User profile picture">
        </div>

        <h3 class="profile-username text-center">{{$user->name}}</h3>

        <p class="text-muted text-center"><b>
          @if($user->role == 'aux')
            Especialista
          @elseif($user->role == 'admin')
            Administrador
          @else
            Cliente
          @endif
        </b>
      </p>

      <div class="tab-pane" id="settings" style="padding: 15px;">

        <form class="form-horizontal">

          <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" name="name" value="{{$user->name}}">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail" name="email" value="{{$user->email}}" disabled>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputName2" class="col-sm-2 col-form-label">Ciudad</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName2" name="city" value="{{$user->city}}">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputExperience" class="col-sm-2 col-form-label">Direccion</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputExperience" name="address" value="{{$user->address}}">
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
            <div class="col-sm-4">
              <input type="password" class="form-control"  name="password">
            </div>
          </div>

          <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-4">
              <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image" accept="image/x-png,image/gif,image/jpeg">
                  <label class="custom-file-label" for="image">Elegir...</label>
                </div>
            </div>
          </div>



          <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
              <button type="submit" class="btn btn-danger">Actualizar</button>
            </div>
          </div>

        </form>
      </div>

    </div>
    <!-- /.card-body -->
  </div>


</section>
<!-- /.content -->

@endsection

@section('scripts')
<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
@endsection
