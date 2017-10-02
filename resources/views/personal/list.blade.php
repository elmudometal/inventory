@extends('layouts.app')
@section('htmlheader_title')
    Agregar o Editar Producto
@endsection

@section('main-content')
<div class="box">
            <div class="box-header">
              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <h3 class="box-title">Listado de Productos</h3>
                <a href="{{ url('/productAdd') }}" class="btn btn-primary">Agregar</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="listProduct" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Código</th>
                  <th>Descripción</th>
                  <th>Precio</th>
                  <th>Stock Maximo</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                <tr>
                  <td>{{ $product->identifier }}</td>
                  <td>{{ $product->description }}</td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->max }}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock Maximo</th>
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
