@extends('layout-logueado')

@section('contenido')
    @parent

    @foreach($user->colores as $color) @endforeach
    <div class="row ">
        <h2>Perfil</h2>
        <div class="col-xs-6">
            <ul class="list-group">
                <li class="list-group-item">Nombre: {!! ucfirst($user->name) !!}</li>
                <li class="list-group-item">Apellido: {!! ucfirst($user->apellido) !!}</li>
                <li class="list-group-item">Email: {!! $user->email !!}</li>
                <li class="list-group-item">Edad: {!! $user->edad !!} años</li>
                <li class="list-group-item">@if(count($user->roles) > 1) Roles: @else Rol: @endif
                    @foreach($user->roles as $role)
                        {!! $role->name!!},
                    @endforeach
                </li>
                <li class="list-group-item">Color:
                    <span class="colorUser" style="background-color: {!! $color->rgb !!}" ></span>
                    {!! $color->color !!}
                </li>
            </ul>
        </div>
        <div class="col-xs-6">

        </div>
    </div>

@endsection