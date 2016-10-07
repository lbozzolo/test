@extends('layout-logueado')

@section('contenido')
    @parent
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
            <h2>Cambiar contraseña</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::model($user,['route' => ['update.password', Auth::user()->id], 'method' => 'put']) !!}
                    <div class="form-group">
                        {!! Form::label('mypassword', 'Contraseña actual') !!}
                        {!! Form::password('mypassword',['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'Nueva contraseña') !!}
                        {!! Form::password('password',['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Repetir nueva contraseña') !!}<br>
                        {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-default">Cancelar<a/>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
