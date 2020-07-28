<div class="form-group">
    {{ Form::label('name', 'Nombre del usuario') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>

<div class="form-group">
    {{ Form::label('email', 'email') }}
    {{ Form::text('email', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('role_id', 'roles') }}
    {{ Form::select('role_id', $roles, null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>