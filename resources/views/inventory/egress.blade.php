@extends('layouts.app')
@section('htmlheader_title')
    Salida de Productos
@endsection

@section('main-content')


          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Nuevo Egreso</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Salida</h3>
					</div>
	</div>
  <form method="POST" action="/egressAdd" accept-charset="UTF-8" autocomplete="off">
    {{ csrf_field() }}
    <div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
      <div class="form-group">
            <label for="proveedor">Proveedor</label>
            <select class="form-control select2" name="provider" style="width: 100%;">
              @foreach ($personals as $personal)
                <option value="{{ $personal->id }}">{{ $personal->fullname }}</option>
              @endforeach
            </select>
          </div>
          </div>
          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                  <label for="depot">Almacen de Salida</label>
                  <select class="form-control select2" id="depot" name="depot" style="width: 100%;">
                    @foreach ($depots as $depot)
                    <option value="{{ $depot->id }}">{{ $depot->description }}</option>
                    @endforeach
                  </select>
                </div>
                </div>
    	</div>

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label>Artículo</label>
                        <select class="form-control select2" id="pidarticulo">
                          @foreach ($products as $product)
                            <option value="{{ $product->id.'_'.$product->max.'_'.$product->price }}">{{ $product->description }}</option>
                          @endforeach
                        </select>
                        </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input name="pcantidad" id="pcantidad" class="form-control" placeholder="cantidad" type="number">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input disabled="" name="pstock" id="pstock" class="form-control" placeholder="Stock" type="number">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="pprecio">Precio</label>
                        <input name="pprecio" id="pprecio" class="form-control" placeholder="Precio" type="number">
                    </div>
                </div>


                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                      <br>
                       <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                            <tr><th>Opciones</th>
                            <th>Artículo</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                        </tr></thead>
                        <tfoot>
                            <tr>
                                <th colspan="4"><p align="right">TOTAL:</p></th>
                                <th><p align="right"><span id="total">$ 0.00</span> <input name="total_venta" id="total_venta" type="hidden"></p></th>
                            </tr>
                            <tr>
                                <th colspan="4"><p align="right">TOTAL IMPUESTO (18%):</p></th>
                                <th><p align="right"><span id="total_impuesto">$ 0.00</span></p></th>
                            </tr>
                            <tr>
                                <th colspan="4"><p align="right">TOTAL PAGAR:</p></th>
                                <th><p align="right"><span align="right" id="total_pagar">$ 0.00</span></p></th>
                            </tr>
                        </tfoot>
                        <tbody>
                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar" style="display: none;">
    		<div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
    	</div>
    </div>
			</form>

		                          <!--Fin Contenido-->
                           </div>
                        </div>

                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->


@endsection
@section('footer_scripts')
<!-- Select2 -->
<script src="{{ url('/js/select2/dist/js/select2.full.min.js') }}"></script>
<script>
$(function () {
    $('.select2').select2();
    $('#bt_add').click(function(){
      agregar();
    });
  });

  var cont=0;
  total=0;
  subtotal=[];
  $("#guardar").hide();
  $("#pidarticulo").change(mostrarValores);
  $("#tipo_comprobante").change(marcarImpuesto);

  function mostrarValores()
  {
    datosArticulo=document.getElementById('pidarticulo').value.split('_');
    $("#pprecio").val(datosArticulo[2]);
    $("#pstock").val(datosArticulo[1]);
  }
  function marcarImpuesto()
  {
    tipo_comprobante=$("#tipo_comprobante option:selected").text();
    if (tipo_comprobante=='Factura')
    {
        $("#impuesto").prop("checked", true);
    }
    else
    {
        $("#impuesto").prop("checked", false);
    }
  }

  function agregar()
  {
    datosArticulo=document.getElementById('pidarticulo').value.split('_');

    idarticulo=datosArticulo[0];
    articulo=$("#pidarticulo option:selected").text();
    cantidad=$("#pcantidad").val();

    precio_venta=$("#pprecio").val();
    stock=$("#pstock").val();

    if (idarticulo!="" && cantidad!="" && cantidad>0 && precio_venta!="")
    {
        if (parseInt(stock)>=parseInt(cantidad))
        {
        subtotal[cont]=(cantidad*precio_venta);
        total=total+subtotal[cont];

        var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio[]" value="'+parseFloat(precio_venta).toFixed(2)+'"></td><td align="right">$ '+parseFloat(subtotal[cont]).toFixed(2)+'</td></tr>';
        cont++;
        limpiar();
        totales();
        evaluar();
        $('#detalles').append(fila);
        }
        else
        {
            alert ('La cantidad a vender supera el stock');
        }

    }
    else
    {
        alert("Error al ingresar el detalle de la orden, revise los datos del artículo");
    }
  }
  function limpiar(){
    $("#pcantidad").val("");
    $("#pprecio").val("");
  }
  function totales()
  {
        $("#total").html("$ " + total.toFixed(2));
        $("#total_venta").val(total.toFixed(2));

        //Calcumos el impuesto
        if ($("#impuesto").is(":checked"))
        {
            por_impuesto=18;
        }
        else
        {
            por_impuesto=0;
        }
        total_impuesto=total*por_impuesto/100;
        total_pagar=total+total_impuesto;
        $("#total_impuesto").html("$ " + total_impuesto.toFixed(2));
        $("#total_pagar").html("$ " + total_pagar.toFixed(2));

  }

  function evaluar()
  {
    if (total>0)
    {
      $("#guardar").show();
    }
    else
    {
      $("#guardar").hide();
    }
   }

   function eliminar(index){
    total=total-subtotal[index];
    totales();
    $("#fila" + index).remove();
    evaluar();

  }
$('#liVentas').addClass("treeview active");
$('#liVentass').addClass("active");

</script>
@endsection
