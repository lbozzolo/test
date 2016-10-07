@extends('layout')

@section('contenido')
    <div class="row">
        <hr>
        <div class="col-xs-6">
            {!! Form::open(['route'=>'auth.login', 'method' => 'POST']) !!}

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>

            {!! Form::submit('Ingresar', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}

            <a href="{{ route('auth.register') }}">Registrar nuevo usuario</a>
        </div>
    </div>
@endsection


