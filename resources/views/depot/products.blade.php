@extends('layouts.app')
@section('htmlheader_title')
    Inventario del {{$depots->name }}
@endsection

@section('main-content')
<div class="box">
            <div class="box-header">
              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <h3 class="box-title">Obra: {{$depots->name }}</h3>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <div class="nav-tabs-custom">
                          <ul class="nav nav-tabs pull-right">
                            <li class="active"><a href="#tab_1-1" data-toggle="tab">General</a></li>
                            <li><a href="#tab_2-2" data-toggle="tab">Cantidad / Mes</a></li>
                            <li><a href="#tab_3-3" data-toggle="tab">Costo / Mes</a></li>
                            <li class="pull-left header"><i class="fa fa-th"></i> Obra: {{$depots->name }} #{{$depots->nproject }}</li>
                          </ul>
                          <div class="tab-content">

<div class="tab-pane active" id="tab_1-1">
              <table id="listProduct1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Código</th>
                  <th>Ítem</th>
                  <th>Precio</th>
                  <th>Stock</th>
                  <th>Total</th>
                  <th>Entradas</th>
                  <th>Salidas</th>
                </tr>
                </thead>
                <tbody>
                  @php $totalPrice = $totalStock = $totalEntry = 0; @endphp
                  @foreach ($products as $product)
                <tr>
                  <td>{{ $product->identifier }}</td>
                  <td>{{ $product->description }}</td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->stock($depots->id) }}</td>
                  <td>{{ $product->stock($depots->id)*$product->price }}</td>
                  <td>{{ $product->entries($depots->id) }}</td>
                  <td>{{ $product->egresses($depots->id) }}</td>
                </tr>
                @php
                  $totalPrice += $product->price * $product->stock($depots->id);
                  $totalStock += $product->stock($depots->id);
                  $totalEntry += $product->entries($depots->id);
                @endphp
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th>Total:</th>
                    <th>{{ $totalStock}}</th>
                    <th>{{ $totalPrice}}</th>
                    <th>{{ $totalEntry}}</th>
                    <th></th>
                  </tr>
                </tfoot>
              </table>
</div>
<div class="tab-pane" id="tab_2-2">
  <table id="listProduct2" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>Código</th>
      <th>Ítem</th>
      <th>Stock</th>
      <th>Oct</th>
      <th>Nov</th>
      <th>Dic</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
    <tr>
      <td>{{ $product->identifier }}</td>
      <td>{{ $product->description }}</td>
      <td>{{ $product->stock($depots->id) }}</td>
      <td>{{ $product->egressesMonth($depots->id,10) }}</td>
      <td>{{ $product->egressesMonth($depots->id,11) }}</td>
      <td>{{ $product->egressesMonth($depots->id,12) }}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>
<div class="tab-pane" id="tab_3-3">
  <table id="listProduct3" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>Código</th>
      <th>Ítem</th>
      <th>Stock</th>
      <th>Precio</th>
      <th>Oct</th>
      <th>Nov</th>
      <th>Dic</th>
      <th>Gasto Total</th>
      <th>Total PRSPTO</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
    <tr>
      <td>{{ $product->identifier }}</td>
      <td>{{ $product->description }}</td>
      <td>{{ $product->stock($depots->id) }}</td>
      <td>{{ $product->price }}</td>
      <td>{{ $product->egressesMonth($depots->id,10)*$product->price }}</td>
      <td>{{ $product->egressesMonth($depots->id,11)*$product->price }}</td>
      <td>{{ $product->egressesMonth($depots->id,12)*$product->price }}</td>
      <td>{{ ($product->egressesMonth($depots->id,12)+
        $product->egressesMonth($depots->id,11)+
        $product->egressesMonth($depots->id,10))*$product->price }}</td>
      <td>{{ $product->entries($depots->id)*$product->price }}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>
                          <!-- /.tab-content -->
                        </div>
                        <!-- nav-tabs-custom -->
                      </div>




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
    $('.table').DataTable();
    /*$('#listProduct2').DataTable();
    $('#listProduct3').DataTable();
*/
  })
</script>
@endsection
