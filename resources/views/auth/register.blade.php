@extends('layout')

@section('contenido')
    <div class="row">
        <div class="col-xs-12 col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">

                    {!! Form::open(['route' => 'auth.register', 'method' => 'POST']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre') !!}
                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('apellido', 'Apellido') !!}
                            {!! Form::text('apellido',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('edad', 'Edad') !!}
                            {!! Form::text('edad',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('rol', 'Rol: ') !!}
                            <span>Cliente
                                {!! Form::checkbox('rol[]', '1', true) !!}
                            </span>
                            <span>Vendedor
                                {!! Form::checkbox('rol[]', '2') !!}
                            </span>
                            <span>Administrador
                                {!! Form::checkbox('rol[]', '3') !!}
                            </span>
                        </div>

                        <div class="form-group">
                            {!! Form::label('color','Color identificatorio') !!}
                            {!! Form::select('color', $colores, null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', ['class'=>'form-control']) !!}
                        </div>

                        <button type="submit" class="btn btn-primary">Registrarse</button>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection