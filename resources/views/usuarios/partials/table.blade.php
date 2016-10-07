<table class="table table-striped  " >
    <caption>Total de usuarios ({!! $usuarios->total() !!})</caption>
    <thead>
        <tr class="alert-info">
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Rol</th>
            <th>Color</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @if($usuarios->count() > 0)
        @foreach($usuarios as $usuario)
            @if($usuario->id == Auth::user()->id)
                <tr style="background-color: #9acfea">
            @else
                <tr>
            @endif
                <td>{!! $usuario->id !!}</td>
                <td>{!! ucfirst($usuario->name) !!}</td>
                <td>{!! ucfirst($usuario->apellido) !!}</td>
                <td>{!! $usuario->email !!}</td>
                <td>{!! $usuario->edad !!} años</td>
                <td>
                    <ul style="list-style: none">
                        @foreach($usuario->roles as $role)
                            <li>@if($role->id == 3 )<kbd>{!! $role->name !!}</kbd>@else{!! $role->name !!}@endif</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    @foreach($usuario->colores as $color)
                        {!! ucfirst($color->color) !!}
                    <span class="colorUser" style="background-color: {!! $color->rgb !!}"></span>
                    @endforeach
                </td>
                <td style="width: 100px">
                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-info btn-usuarios">Editar</a>
                </td>
                <td style="width: 100px">
                    <a href="javascript:;" role="button" class="btn-delete-usuario btn btn-danger btn-usuarios" data-id="{{ $usuario->id }}">Eliminar</a>
                </td>
            </tr>
        @endforeach
    @else
        <tr><td colspan="9">No se encontraron usuarios.</td></tr>
    @endif
    </tbody>
</table>

{!! Form::open(['route'  => ['usuarios.edit', ':usuarioId:'],
                'method' => 'delete',
                'id'     => 'frm-delete-usuario']) !!}
{!! Form::close() !!}