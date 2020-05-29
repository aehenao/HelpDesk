@extends('layouts.panel')

@section('options')
  <li class="breadcrumb-item"><a href="/cases/create">Crear</a></li>
@endsection

@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-header">
            <h3 class="card-title">Vista de Casos</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
          </div>

          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table id="tableInfo" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Caso #</th>
                  <th>Asunto</th>
                  <th>Cliente</th>
                  <th>Estado</th>
                  <th>Tiempo de Solucion</th>
                  <th>Tipo</th>
                  <th>Categoria</th>
                  <th>Especialista</th>
                </tr>
              </thead>
              <tbody id="contenido">
                @foreach($cases as $case)
                  <tr  @if($case->status == 'close') class="activo" style="display: none;" @endif>
                    <td>{{$case->id}}</td>
                    <td><a  href="{{url('cases/'.$case->id.'/edit')}}">{{$case->title}}</a>
                    </td>
                    <td>{{$case->client->name}}</td>
                    <td>
                      @if($case->status == 'register')
                        <span class="badge bg-warning" style="font-size: 14px; display: block; background-color:#fcff43;">
                          Registrado</span>
                      @elseif($case->status == 'stop')
                        <span class="badge bg-danger" style="font-size: 14px; display: block;">En pausa</span>
                      @elseif($case->status == 'process')
                        <span class="badge bg-primary" style="font-size: 14px; display: block;">En proceso</span>
                      @elseif($case->status == 'close')
                        <span class="badge " style="font-size: 14px; display: block; color: #ffffff!important; background-color: #0a0a0a!important;">Cerrado</span>
                      @endif
                    </td>
                    <td>{{$case->solution_time}}</td>
                    <td>
                      @if($case->type == 'request')
                        <b style="color: #07c116">Requerimiento</b>
                      @else
                        <b style="color: #fb6228">Incidente</b>
                      @endif
                    </td>
                    <td>{{$case->category->name}}</td>
                    <td>
                      {{$case->specialist->name}}
                    </td>

                  </tr>
                @endforeach

              </tbody>

            </table>
            <div class="card-body">
              {{-- {{ $cases->links() }} --}}
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->

@endsection

@section('scripts')
  <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <!-- Bootstrap Switch -->
  <script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
  <script>
  $(function () {

    $('#tableInfo').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });


  });
});
</script>
@endsection
