@extends('admin.app')
@section('htmlheader_title')
    Editar Usuario
@endsection
@section('contentheader_title', $titulo)
@section('main-content')
    <div class="box-body">
        <form name="editar" action="/administrador/users/{{ $usuario->id }}" method="post" accept-charset="UTF-8">
            {{ method_field('PUT') }}
            @include('administrador.users.layouts.form')
            <div class="form-group">
                <div class="row">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i>Guardar</button>
                    <a class="btn btn-default" href="{{ url('/administrador/users/') }}" role="button"><i
                                class="fa fa-fw fa-reply-all"></i>Cancelar</a>
                    <a href="{{  url('/administrador/users', [$usuario->id])}} " class="btn btn-danger pull-right"
                       data-method="delete" data-confirm="¿Esta Seguro que Desea Eliminar este Registro?"
                       data-token="{{ csrf_token() }}"> <i class="fa fa-fw fa-trash-o"></i>Eliminar</a>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box-body -->
@endsection

