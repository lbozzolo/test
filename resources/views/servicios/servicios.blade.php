@extends('layout-logueado')

@section('contenido')
    @parent

    <h2>Servicios disponibles</h2>

    @include('servicios.partials.table')

    {!! $servicios->render() !!}


@endsection


