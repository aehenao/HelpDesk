@extends('layouts.panel')

@section('subtitle', 'Clientes')

@section('options')
  <li class="breadcrumb-item"><a href="/clients/create">Crear</a></li>
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
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($clients as $client)
                  <tr>
                    <td>{{$client->name}}</td>
                    <td>{{$client->email}}</td>
                    <td>
                      <div class="col-md-3">
                        <input type="checkbox" name="my-checkbox" @if($client->status == 'on') checked @endif data-bootstrap-switch data-off-color="danger" data-on-color="success">
                      </div>
                    </td>
                    <td>
                      <form action="{{ url('/clients/' .$client->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                          <div class="col-md-3">
                            <a  href="{{url('clients/'.$client->id.'/edit')}}"class="btn btn-block btn-outline-warning btn-sm">
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


                    </td>
                  </tr>
                @endforeach

              </tbody>

            </table>
            <div class="card-body">
              {{ $clients->links() }}
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
