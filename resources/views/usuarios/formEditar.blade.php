@extends('layout-logueado')

@section('contenido')
    @parent
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::model($user,['route' => ['usuarios.edit', $user->id], 'method' => 'put']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name',$user->name,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('apellido', 'Apellido') !!}
                        {!! Form::text('apellido',$user->apellido,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email',$user->email,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('edad', 'Edad') !!}
                        {!! Form::text('edad',$user->edad,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('color','Color') !!}
                        {!! Form::select('color', $colores, $user->colorActual, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('rol', 'Rol de usuario') !!}<br>
                        Cliente {!! Form::checkbox('rol[]', '1', $user->rolCliente)  !!}
                        Vendedor {!! Form::checkbox('rol[]', '2', $user->rolEmpleado) !!}
                        Administrador {!! Form::checkbox('rol[]', '3', $user->rolAdmin) !!}
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-default">Cancelar<a/>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

