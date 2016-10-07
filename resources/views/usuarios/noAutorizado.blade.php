@extends('layout-logueado')

@section('contenido')
    @parent

    <div class="panel panel-danger text-center">
        <div class="panel-heading">
            <h2>Operación restringida</h2>
            <p>Debe ser administrador para realizar esta operación.</p>
            <a href="{{ route('usuarios.index') }}" class="btn btn-info btn-usuarios">Aceptar</a>
        </div>
    </div>


@endsection