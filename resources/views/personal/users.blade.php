@extends('layouts.app')
@section('htmlheader_title')
    Listado de Usuarios
@endsection

@section('main-content')
<div class="box">
            <div class="box-header">
              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <h3 class="box-title">Listado de Usuarios</h3>
                <a href="{{ url('/register') }}" class="btn btn-primary">Agregar</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="listUsers" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Email</th>
                  <th>Nombre</th>
                  <td></td>
                </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td></td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Nombre</th>
                    <td></td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
@endsection
@section('footer_scripts')
<script src="{{ url('/js/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('/js/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#listUsers').DataTable()

  })
</script>
@endsection
