@extends('layouts.panel')

@section('styles')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- summernote -->
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
@endsection

@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Nuevo Caso</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                  {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button> --}}
                  </div>
                </div>
                <div class="card-body">

                  <form role="form" method="POST" action="{{url('cases')}}">
                    @csrf
                    <div class="card-body row">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="title">Asunto</label>
                          <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Cliente</label>
                          <select name="client" class="form-control select2" style="width: 100%;" required>
                            @foreach ($clients as $client)
                              <option value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Urgencia</label>
                          <select class="form-control" name="priority">
                            <option value="low">Baja</option>
                            <option value="normal" selected>Normal</option>
                            <option value="high">Alta</option>
                            <option value="critical">Critico</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-8">
                        <div class="form-group">
                          <label>Especialista</label>
                          <select class="form-control select2" name="specialist" style="width: 100%;" required>
                            @foreach ($specialists as $specialist)
                              <option value="{{$specialist->id}}" >{{$specialist->name}}</option>
                            @endforeach

                          </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Categoria</label>
                          <select class="form-control select2" name="category" style="width: 100%;" required>
                            @foreach ($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Tipo</label>
                          <select class="form-control" name="type">
                            <option value="request">Requerimiento</option>
                            <option value="incidence">Incidencia</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="autor">Autor</label>
                          <input type="text" class="form-control" name="autor"  value="{{auth()->user()->name}}" disabled>
                          <input type="text" class="form-control" name="author" style="display: none;" value="{{auth()->user()->id}}">
                        </div>
                      </div>



                      <div class="col-md-12">
                        <div class="mb-3">
                          <textarea class="textarea" name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="{{old('description')}}"></textarea>
                        </div>

                     </div>

                        <div class="col-md-3">
                          <button type="submit" class="btn btn-block btn-success">Crear</button>
                        </div>
                        <div class="col-md-3">
                          <a href="/cases" class="btn btn-block bg-gradient-info" style="color: white;">Volver</a>
                        </div>


                    </form>
                  </div>

                </div>
                <!-- /.card -->
              </div>
            </div>



          </div>

          {{-- <div class="row">
            <div class="col-12">
              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Title</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                      </div>
                    </div>
                    <div class="card-body">
                      Start creating your amazing application!
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      Footer
                    </div>
                    <!-- /.card-footer-->
                  </div>
                  <!-- /.card -->
                </div>
              </div> --}}


            </div>
          </section>
          <!-- /.content -->
@endsection

  @section('scripts')
    <!-- Select2 -->
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script type="text/javascript">
    $(function(){
      //$('.select2').select2();

      //Initialize Select2 Elements
      $('.select2').select2({
        theme: 'bootstrap4'
      })
    });
  </script>
  <!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
@endsection
