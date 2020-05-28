@extends('layouts.panel')

@section('meta')
  <meta name="case" content="{{ $case->status }}">
@endsection

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
          <input type="text" class="form-control" id="title" name="title" value="{{old('title',$case->title)}}" disabled>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label>Cliente</label>
          <select name="client" class="form-control select2" style="width: 100%;" required disabled>
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
          <select class="form-control" name="priority" @if($case->status == 'close') disabled @endif>
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
                  <select class="form-control select2" name="specialist" style="width: 100%;" required @if($case->status == 'close') disabled @endif>
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
                    <select class="form-control select2" name="category" style="width: 100%;" required @if($case->status == 'close') disabled @endif>
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
                    <select class="form-control" name="status" @if($case->status == 'close') disabled @endif>
                      <option value="register" @if($case->status == 'register') selected @else style="display: none;" @endif>Registrado</option>
                        @if($case->status != 'close')
                          <option value="process" @if($case->status == 'process') selected @endif>En Proceso</option>
                        @endif
                        @if($case->status != 'register' or $case->status != 'close')
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
                    <select class="form-control" name="type" disabled>
                      <option value="request" @if($case->type == 'request') selected @endif>Requerimiento</option>
                        <option value="incidence" @if($case->type == 'incidence') selected @endif>Incidencia</option>
                        </select>
                      </div>
                    </div>


                    <div class="col-md-12">
                      <div class="mb-3">
                        <textarea class="textarea" name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="{{old('description')}}" disabled>
                          {!! $case->description !!}
                        </textarea>
                      </div>

                    </div>
                    @if($case->status != 'close')
                    <div class="col-md-3">
                      <button type="submit" class="btn btn-block btn-success">Guardar</button>
                    </div>
                  @endif

                    <div class="col-md-3">
                      <a href="/inbox" class="btn btn-block bg-gradient-info" style="color: white;">Volver</a>
                    </div>

                  </form>
                </div>


              </div>

              <div  class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                <div id="app" class="row" style="padding-top: 15px;">

                <notes></notes>
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

  <!-- Summernote -->
  <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
  <script>
  $(function () {
    // Summernote
    $('.textarea').summernote('disable');

  })
  </script>


@endsection
