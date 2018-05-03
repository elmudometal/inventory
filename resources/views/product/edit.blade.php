@extends('layouts.app')
@section('htmlheader_title')
    Agregar o Editar Producto
@endsection

@section('main-content')

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Ficha del Producto: </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="/productEdit/">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="identifier" class="col-sm-2 control-label">Código:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="identifier" name="identifier" placeholder="Código">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Descripción:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description" placeholder="Descripción">
                    </div>
                </div>
                <div class="form-group">
                    <label for="min" class="col-sm-2 control-label">Stock Minimo</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="min" name="min" placeholder="Stock minimo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="max" class="col-sm-2 control-label">Stock Maximo</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="max" name="max" placeholder="Stock maximo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-2 control-label">Precio</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" name="price" placeholder="Precio">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Categoria del Producto:</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="type" name="type" placeholder="Categoria del producto">
                            <option value="1">Consumible</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Añadir</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>

@endsection
