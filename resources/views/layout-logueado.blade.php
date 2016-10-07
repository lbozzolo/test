@extends('layout')

@section('contenido')
    @foreach(Auth::user()->colores as $color)@endforeach
<div class="row">
    <nav class="navbar navbar-inverse col-xs-12" style="border-bottom: 3px solid {!! $color->rgb !!}">
        <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li {{ (Request::is('productos') ? 'class=active' : '') }}><a href="{{ route('productos.index') }}">Productos</a></li>
                    <li {{ (Request::is('servicios') ? 'class=active' : '') }}><a href="{{ route('servicios.index') }}">Servicios</a></li>
                    <li {{ (Request::is('proveedores') ? 'class=active' : '') }}><a href="{{ route('proveedores.index') }}">Proveedores</a></li>
                    <li {{ (Request::is('contrataciones') ? 'class=active' : '') }}><a href="{{ route('contrataciones.index') }}">Contrataciones</a></li>
                    <li {{ (Request::is('usuarios') ? 'class=active' : '') }}><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
                </ul>
                <ul>
                    <li class="navbar-btn navbar-right">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                {{  strtoupper(Auth::user()->apellido) }}, {{ ucfirst(Auth::user()->name ) }}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="{{ route('usuario.perfil', Auth::user()->id) }}">Ver perfil</a></li>
                                <li><a href="{{ route('update.password', Auth::user()->id) }}">Cambiar contraseña</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('auth.logout') }}">Cerrar sesión</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>

        </div>
    </nav>

</div>

@endsection