@extends('layout-logueado')

@section('contenido')
    @parent
    <div class="pull-right">
        {!! Form::open(['method'=>'GET','url'=> route('productos.buscar'),'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
        <div class="input-group custom-search-form">
            {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar proveedor...']) !!}
            <span class="input-group-btn">
                <button class="btn btn-default-sm" type="submit"><span class="glyphicon glyphicon-search"></span></button>
            </span>
        </div>
        <div>
             <span>
                 Proveedor {!! Form::radio('filtro', 'proveedor', true) !!}
            </span>
            <span>
                 Otra opcion {!! Form::radio('filtro', 'color') !!}
            </span>
        </div>
        {!! Form::close() !!}
    </div>

    <h2>Proveedores</h2>

    @include('proveedores.partials.table')
    {!! $proveedores->render() !!}


@endsection