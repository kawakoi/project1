



<form action={{route('contact')}} method="POST">
     {{ csrf_field() }}

    <div class="form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', Auth::user()->name, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', Auth::user()->email, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('body', 'Mensaje') }}
        {{ Form::textarea('msg', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Enviar', ['class' => 'btn btn-sm btn-primary']) }}
    </div>

</form>