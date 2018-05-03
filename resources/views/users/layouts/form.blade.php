<div class="form-group {{ $errors->has('id') ? 'has-error' : ''}}">
    <label for="id" class="col-md-4 control-label">Identificador del Usuario:</label>

    <div class="row">
        <div class="col-md-2">
            <input id="id" type="text" class="form-control" name="id" readonly
                   value="{{ ( Empty( $usuario)  ? old('id') : $usuario->id ) }}">
            {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('nombres') ? 'has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Nombres del Usuario:</label>

    <div class="row">
        <div class="col-md-2">
            <input id="name" type="text" class="form-control" name="name"
                   value="{{ ( Empty( $usuario)  ? old('name') : $usuario->name ) }}"
                   placeholder="Ingrese los Nombre de Usuario" required autofocus>
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">Email del Usuario</label>

    <div class="row">
        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email"
                   value="{{ ( Empty( $usuario)  ? old('email') : $usuario->email ) }}" required autofocus>
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="col-md-4 control-label">Contraseña del Usuario </label>

    <div class="row">
        <div class="col-md-6">
            <input id="password" type="password" class="form-control"
                   name="password" {{ ( Empty( $usuario)  ? 'required' : '' ) }}>
            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

