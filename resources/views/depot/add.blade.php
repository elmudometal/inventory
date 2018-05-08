@extends('layouts.app')
@section('htmlheader_title')
    Listado de Almacenes
@endsection

@section('main-content')

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Ficha del Equipo: </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="/depotAdd">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">Id:</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id" name="id" placeholder="Id" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Nombre de la Obra" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="adress" class="col-sm-2 control-label">Dirección:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="adress" name="adress"
                               placeholder="Direccion de la Obra" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nproject" class="col-sm-2 control-label">Nro Proyecto:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nproject" name="nproject"
                               placeholder="Nro del Proyecto" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="supervisor" class="col-sm-2 control-label">Supervisor:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="supervisor" name="supervisor"
                               placeholder="Supervidor de la obra" required>
                    </div>
                </div>
                <div class="form-group hidden">
                    <label for="type" class="col-sm-2 control-label">Tipo</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="type" name="type" placeholder="Tipo">
                            <option value="1" selected>Deposito</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="/depot" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Añadir</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>

@endsection