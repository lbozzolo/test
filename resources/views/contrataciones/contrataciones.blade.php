@extends('layout-logueado')

@section('contenido')
    @parent


    <h2>Contrataciones</h2>

    @include('contrataciones.partials.table')



@endsection

