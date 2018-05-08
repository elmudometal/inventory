@extends('layouts.app')
@section('htmlheader_title')
    Agregar o Editar Producto
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Ingreso a Obra</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!--Contenido-->
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <h3>Nuevo Ingreso</h3>
                                </div>
                            </div>
                            <form method="POST" action="/entryAdd" accept-charset="UTF-8" autocomplete="off">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="proveedor">Proveedor</label>
                                            <select class="form-control select2" name="provider" style="width: 100%;" required>
                                                @foreach ($personals as $personal)
                                                    <option value="{{ $personal->id }}">{{ $personal->fullname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="depot">Obra a Ingresa</label>
                                            <select class="form-control select2" id="depot" name="depot"
                                                    style="width: 100%;" required>
                                                @foreach ($depots as $depot)
                                                    <option value="{{ $depot->id }}">{{ $depot->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <label for="nroorden">Orden de Compra</label>
                                                    <input name="nroorden" id="nroorden" class="form-control"
                                                           placeholder="Orden de Compra" type="text" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <label for="nrofactura">Nro Factura</label>
                                                    <input name="nrofactura" id="nrofactura" class="form-control"
                                                           placeholder="Nro de Factura" type="text" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <label for="fechafactura">Fecha</label>
                                                    <input name="fechafactura" id="fechafactura" class="form-control"
                                                           placeholder="Fecha de Factura" type="date" required>
                                                </div>
                                            </div>
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
                                                        <option value="x">Agregar Nuevo</option>
                                                        @foreach ($products as $product)
                                                            <option value="{{ $product->id }}">{{ $product->description }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <label for="cantidad">Cantidad</label>
                                                    <input name="pcantidad" id="pcantidad"
                                                           class="form-control" placeholder="cantidad"
                                                           type="number">
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <label for="precio">Precio</label>
                                                    <input name="pprecio" id="pprecio" class="form-control"
                                                           placeholder="P. Compra" type="number">
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" id="bt_add"
                                                            class="btn btn-primary">Agregar
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                <table id="detalles"
                                                       class="table table-striped table-bordered table-condensed table-hover">
                                                    <thead style="background-color:#A9D0F5">
                                                    <tr>
                                                        <th>Opciones</th>
                                                        <th>Artículo</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th>TOTAL</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th><h4 id="total">$ 0.00</h4></th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar"
                                         style="display: none;">
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
            $('#bt_add').click(function () {
                agregar();
            });
        });

        var cont = 0;
        total = 0;
        subtotal = [];
        $("#guardar").hide();
        $('#cantidad').change(function () {
            console.log('change');
        });

        function agregar() {
            idarticulo = $("#pidarticulo").val();
            articulo = $("#pidarticulo option:selected").text();
            cantidad = $("#pcantidad").val();
            precio = $("#pprecio").val();

            if (idarticulo != "" && cantidad != "" && cantidad > 0 && precio != "") {
                subtotal[cont] = (cantidad * precio);
                total = total + subtotal[cont];
                if(idarticulo=='x'){
                articulo = '<input type="text" name="description[]" required>';
                }
                var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont + ');">X</button></td><td><input type="hidden" name="idarticulo[]" value="' + idarticulo + '">' + articulo + '</td><td><input type="number" name="cantidad[]" value="' + cantidad + '"></td><td><input type="number" name="precio[]" value="' + precio + '"></td><td>' + subtotal[cont] + '</td></tr>';
                cont++;
                limpiar();
                $("#total").html("$ . " + total);
                evaluar();
                $('#detalles').append(fila);
            }
            else {
                alert("Error al ingresar el detalle del ingreso, revise los datos del artículo");
            }
        }

        function limpiar() {
            $("#pcantidad").val("");
            $("#pprecio").val("");
        }

        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            }
            else {
                $("#guardar").hide();
            }
        }

        function eliminar(index) {
            total = total - subtotal[index];
            $("#total").html("S/. " + total);
            $("#fila" + index).remove();
            evaluar();

        }

        $('#liCompras').addClass("treeview active");
        $('#liIngresos').addClass("active");

    </script>
@endsection
