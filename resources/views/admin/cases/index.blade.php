@extends('layouts.panel')

@section('subtitle', 'Casos')

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

          <!-- /.card-header -->
          <div class="card-body">
            <table id="tableInfo" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Caso #</th>
                  <th>Asunto</th>
                  <th>Cliente</th>
                  <th>Estado</th>
                  <th>Tiempo de Solucion</th>
                  <th>Prioridad</th>
                  <th>Categoria</th>
                  <th>Especialista</th>
                </tr>
              </thead>
              <tbody>
                @foreach($cases as $case)
                  <tr>
                    <td>{{$case->id}}</td>
                    <td><a  href="{{url('cases/'.$case->id.'/edit')}}">{{$case->title}}</a>
                    </td>
                    <td>{{$case->client->name}}</td>
                    <td>
                      @if($case->status == 'register')
                        <span class="badge bg-warning" style="font-size: 14px; display: block; background-color:#fcff43;">
                          Registrado</span>
                      @elseif($case->status == 'stop')
                        <span class="badge bg-error" style="font-size: 14px; display: block;">En pausa</span>
                      @elseif($case->status == 'process')
                        <span class="badge bg-primary" style="font-size: 14px; display: block;">En proceso</span>
                      @elseif($case->status == 'close')
                        <span class="badge bg-error" style="font-size: 14px; display: block; color: #ffffff!important; background-color:#3c3c3c;">Cerrado</span>
                      @endif
                    </td>
                    <td>{{$case->solution_time}}</td>
                    <td>
                      @if($case->priority == 'low')
                        <p>Bajo</p>
                      @elseif($case->priority == 'normal')
                        <p>Normal</p>
                      @elseif($case->priority == 'high')
                        <p style="color: #05a720;">Alto</p>
                      @elseif($case->priority == 'critical')
                        <p style="color: #e6470a;"><b>Critico</b></p>
                      @endif
                    </td>
                    <td>{{$case->category->name}}</td>
                    <td>
                      {{$case->specialist->name}}
                    </td>
                    {{-- <td>
                      <form action="{{ url('/cases/' .$case->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                          <div class="col-md-3">
                            <a  href="{{url('clients/'.$case->id.'/edit')}}"class="btn btn-block btn-outline-warning btn-sm">
                              <i class="fas fa-edit"></i>
                            </a>
                          </div>

                          <div class="col-md-3">
                            <button type="submit" class="btn btn-block btn-outline-danger btn-sm">
                              <i class="fa fa-trash-alt"></i>
                            </button>
                          </div>

                        </div>
                      </form>


                    </td> --}}
                  </tr>
                @endforeach

              </tbody>

            </table>
            <div class="card-body">
              {{ $cases->links() }}
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

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  });
</script>
@endsection
