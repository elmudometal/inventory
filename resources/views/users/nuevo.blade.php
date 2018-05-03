@extends('admin.app')
@section('htmlheader_title')
    Nuevo Usuario
@endsection
@section('contentheader_title', $titulo)
@section('main-content')
    <div class="box-body">
        <form name="nuevo" action="/administrador/users" method="post" accept-charset="UTF-8">
            @include('administrador.users.layouts.form')
            <div class="form-group">
                <div class="row">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i>Guardar</button>
                    <a class="btn btn-default" href="{{ url('/administrador/users/') }}" role="button"><i
                                class="fa fa-fw fa-reply-all"></i>Cancelar</a>

                </div>
            </div>
        </form>
    </div>
    <!-- /.box-body -->
@endsection
