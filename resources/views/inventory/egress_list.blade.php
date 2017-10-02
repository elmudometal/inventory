@extends('layouts.app')
@section('htmlheader_title')
    Agregar o Editar Producto
@endsection

@section('main-content')
<div class="box">
            <div class="box-header">
              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <h3 class="box-title">Listado de salidas</h3>
                <a href="{{ url('/entryAdd') }}" class="btn btn-primary">Agregar</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="listProduct" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Fecha</th>
                  <th>almacen</th>
                  <th>Personal</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($entries as $entry)
                <tr>
                  <td>{{ $entry->id }}</td>
                  <td>{{ $entry->date }}</td>
                  <td>{{ $entry->depot_id }}</td>
                  <td>{{ $entry->provider_id }}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Fecha</th>
                    <th>almacen</th>
                    <th>Personal</th>
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
    $('#listProduct').DataTable()

  })
</script>
@endsection
