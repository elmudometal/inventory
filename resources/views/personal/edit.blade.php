@extends('layouts.app')
@section('htmlheader_title')
    Editar Personal
@endsection

@section('main-content')

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Registro de Proveedor: </h3>
        </div>
                    <form class="form-horizontal" method="POST" action="/providerEdit/{{ isset($personal->id) ? $personal->id : '' }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                            <label for="rut" class="col-md-4 control-label">RUT:</label>
                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control" name="rut" value="{{ old('rut') ? old('rut') : $personal->rut }}" required autofocus>
                                @if ($errors->has('rut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                            <label for="fullname" class="col-md-4 control-label">Nombre Completo:</label>
                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') ? old('fullname') : $personal->fullname }}" required autofocus>
                                @if ($errors->has('fullname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }} hidden">
                            <label for="role_id" class="col-md-4 control-label">Tipo:</label>
                            <div class="col-md-6">
                              <select name="role_id" class="form-control">
                                <option value="1" selected>Proveedor</option>
                                <option value="2">Personal</option>
                              </select>
                                @if ($errors->has('role_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $personal->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Telefono:</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') ? old('phone') : $personal->phone }}" required autofocus>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('adress') ? ' has-error' : '' }}">
                            <label for="adress" class="col-md-4 control-label">Dirección:</label>
                            <div class="col-md-6">
                                <input id="adress" type="text" class="form-control" name="adress" value="{{ old('adress') ? old('adress') : $personal->adress }}" required autofocus>
                                @if ($errors->has('adress'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" type="submit" class="btn btn-info"><i class="fa fa-fw fa-save"></i>{{ ( Empty( $personal)  ? 'Guardar' : 'Acutalizar' ) }}</button>
                                <a class="btn btn-default" href="{{ url('/provider/') }}" role="button"><i
                                            class="fa fa-fw fa-reply-all"></i>Cancelar</a>
                                <a href="{{  url('/providerEdit', [$personal->id])}} " class="btn btn-danger pull-right"
                                   data-method="delete" data-confirm="¿Esta Seguro que Desea Eliminar este Registro?"
                                   data-token="{{ csrf_token() }}"> <i class="fa fa-fw fa-trash-o"></i>Eliminar</a>
                            </div>
                        </div>
                    </form>
        <br><br><br>
    </div>
@endsection
