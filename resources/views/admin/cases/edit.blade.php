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

</div>
</div>

<div class="card card-primary card-outline">
<div class="card-header">
<h3 class="card-title">
<i class="fas fa-suitcase"></i>
<b>Caso #{{$case->id}}</b>
</h3>
</div>
<div class="card-body">

<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
<li class="nav-item">
  <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Info</a>
</li>
<li class="nav-item">
  <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Notas</a>
</li>
</ul>
<div class="tab-content" id="custom-content-below-tabContent">
<div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">

  <form role="form" method="POST" action="{{url('/cases/'.$case->id)}}">
    @csrf
    @method('PUT')

    <div class="card-body row">

      <div class="col-md-6">
        <div class="form-group">
          <label for="title">Asunto</label>
          <input type="text" class="form-control" id="title" name="title" value="{{old('title',$case->title)}}">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label>Cliente</label>
          <select name="client" class="form-control select2" style="width: 100%;" required>
            @foreach ($clients as $client)
              <option value="{{$client->id}}" @if($client->id == $case->client->id) selected @endif>
                {{$client->name}}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label>Urgencia</label>
          <select class="form-control" name="priority">
            <option value="low" @if($case->priority == 'low') selected @endif>Baja</option>
              <option value="normal" @if($case->priority == 'normal') selected @endif>Normal</option>
              <option value="high" @if($case->priority == 'high') selected @endif>Alta</option>
              <option value="critical" @if($case->priority == 'critical') selected @endif>Critico</option>
          </select>
        </div>
      </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Especialista</label>
                  <select class="form-control select2" name="specialist" style="width: 100%;" required>
                    @foreach ($specialists as $specialist)
                      <option value="{{$specialist->id}}" @if($specialist->id == $case->specialist->id) selected @endif>
                        {{$specialist->name}}</option>
                      @endforeach

                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" class="form-control" name="autor"  value="{{$case->author->name}}" disabled>
                  </div>
                </div>

                <div class="col-md-5">
                  <div class="form-group">
                    <label>Categoria</label>
                    <select class="form-control select2" name="category" style="width: 100%;" required>
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if($category->id == $case->category->id) selected @endif>
                          {{$category->name}}
                        </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Estado</label>
                    <select class="form-control" name="status">
                      <option value="register" @if($case->status == 'register') selected @else style="display: none;" @endif>Registrado</option>
                      <option value="process" @if($case->status == 'process') selected @endif>En Proceso</option>
                        @if($case->status != 'register')
                          <option value="stop" @if($case->status == 'stop') selected @endif>En Espera</option>
                        @endif
                        @if($case->status == 'register')
                          <option value="cancel" >Anular</option>
                        @else
                          <option value="close" @if($case->status == 'close') selected  @endif>Cerrado</option>
                        @endif
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Tipo</label>
                    <select class="form-control" name="type">
                      <option value="request" @if($case->type == 'request') selected @endif>Requerimiento</option>
                        <option value="incidence" @if($case->type == 'incidence') selected @endif>Incidencia</option>
                        </select>
                      </div>
                    </div>


                    <div class="col-md-12">
                      <div class="mb-3">
                        <textarea class="textarea" name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="{{old('description')}}">
                          {!! $case->description !!}
                        </textarea>
                      </div>

                    </div>

                    <div class="col-md-3">
                      <button type="submit" class="btn btn-block btn-primary">Guardar Cambios</button>
                    </div>

                    <div class="col-md-4">
                      <a href="/cases" class="btn btn-block btn-warning" style="color: white;">Volver</a>
                    </div>

                  </form>
                </div>


              </div>

              <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">

                <div class="row" style="padding-top: 15px;">
                  <div class="col-md-12">
                    <!-- The time line -->
                    <div class="timeline" id="app">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-green">{{$time}}</span>
                      </div>
                      <!-- /.timeline-label -->

                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-plus-circle bg-blue"></i>
                        <div class="timeline-item">
                          <h3 class="timeline-header"><a href="#">Agregar Nota</a> </h3>

                          <form role="form" id="notes" method="POST" action="{{url('/notes')}}">

                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <input type="hidden" id="caseID" value="{{$case->id}}">
                            <div class="timeline-body">
                              <textarea class="textarea" name="note" id="description" v-model="newNote"style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                            </div>

                          </form>
                          <div class="timeline-footer">
                            <button type="button" id="save"  @click="createNote" class="btn btn-primary btn-sm">Publicar</button>
                          </div>

                        </div>
                      </div>
                      <!-- END timeline item -->

                      <!-- timeline item -->
                        <notes></notes>

                      <!-- END timeline item -->

                      <div>
                        <i class="fas fa-clock bg-gray"></i>
                      </div>
                    </div>

                  </div>
                  <!-- /.col -->
                </div>

              </div>

            </div>

          </div>
          <!-- /.card -->
        </div>


      </div>

    </div>
  </section>
  <!-- /.content -->
@endsection

@section('scripts')
  <!-- Select2 -->
  <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>

  {{-- <script type="text/javascript">
  $(function(){

    $('#save').click(function(){

      var form = $('#notes');
      var url = form.attr('action');
			var token = $('#token').val();
			var data = [$('#description').val(), $('#caseID').val() ];

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      $.ajax({
            url: url,
            headers: {'X-CSRF-TOKEN': token},
            dataType: 'json',
            type:'POST',
            data:{'description':data[0], 'case': data[1]},
            success: function(res){

              console.log(res['notification']);
            alert( res['notification']);

            },
            error: function(ex){
              Toast.fire({
                type: 'success',
                title: xhr.responseText
              })
            }

        });

    });


    $('.select2').select2({
      theme: 'bootstrap4'
    })
  });
  </script> --}}

  <!-- Summernote -->
  <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
  <script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
  </script>


@endsection
