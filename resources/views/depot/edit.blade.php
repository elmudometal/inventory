@extends('layouts.app')
@section('htmlheader_title')
    Listado de Almacenes
@endsection

@section('main-content')

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Ficha de la Obra: </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="/depotEdit/{{ ( Empty( $depot->id)  ? '' : $depot->id ) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="box-body">
                <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">Id:</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id" name="id" placeholder="Id" value="{{ ( Empty( $depot->id)  ? old('id') : $depot->id ) }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ ( Empty( $depot->name)  ? old('id') : $depot->name ) }}"
                               placeholder="Nombre de la Obra" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="adress" class="col-sm-2 control-label">Dirección:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="adress" name="adress"
                               value="{{ ( Empty( $depot->adress)  ? old('id') : $depot->adress ) }}"
                               placeholder="Direccion de la Obra" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nproject" class="col-sm-2 control-label">Nro Proyecto:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nproject" name="nproject"
                               value="{{ ( Empty( $depot->nproject)  ? old('id') : $depot->nproject ) }}"
                               placeholder="Nro del Proyecto" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="supervisor" class="col-sm-2 control-label">Supervisor:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="supervisor" name="supervisor"
                               value="{{ ( Empty( $depot->supervisor)  ? old('id') : $depot->supervisor ) }}"
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

                <button type="submit" type="submit" class="btn btn-info"><i class="fa fa-fw fa-save"></i>Actualizar</button>
                <a class="btn btn-default" href="{{ url('/depot/') }}" role="button"><i
                            class="fa fa-fw fa-reply-all"></i>Cancelar</a>
                <a href="{{  url('/depotDelete', [$depot->id])}} " class="btn btn-danger pull-right"
                   data-method="delete" data-confirm="¿Esta Seguro que Desea Eliminar este Registro?"
                   data-token="{{ csrf_token() }}"> <i class="fa fa-fw fa-trash-o"></i>Eliminar</a>

            </div>
            <!-- /.box-footer -->
        </form>
    </div>

@endsection