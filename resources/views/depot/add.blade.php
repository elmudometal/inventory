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
                  <label for="description" class="col-sm-2 control-label">Descripción:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Descripción">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="type" class="col-sm-2 control-label">Tipo</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="type" name="type" placeholder="Tipo">
                    	<option value="1">Deposito</option>
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