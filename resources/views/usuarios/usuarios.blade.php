@extends('layout-logueado')

@section('contenido')
    @parent
    <div class="pull-right">
        {!! Form::open(['method'=>'GET','url'=> route('usuarios.buscar'),'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
        <div class="input-group custom-search-form">
            {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar usuario...']) !!}
            <span class="input-group-btn">
                <button class="btn btn-default-sm" type="submit"><span class="glyphicon glyphicon-search"></span></button>
            </span>
        </div>
        <div>
             <span>
                 Usuario {!! Form::radio('filtro', 'usuario', true) !!}
            </span>
            <span>
                 Rol {!! Form::radio('filtro', 'rol') !!}
            </span>
        </div>
        {!! Form::close() !!}
    </div>
    <h2>Usuarios</h2>
    @include('usuarios.partials.table')
    {!! $usuarios->render() !!}

@endsection

@section('js')
    <script type="text/javascript">
        var form = $('#frm-delete-usuario');

        $('.btn-delete-usuario').on('click', function() {

            if (confirm('¿Desea eliminar el usuario?'))
            {
                var action = form.attr('action');
                form.attr('action', action.replace(':usuarioId:', $(this).data('id')));
                form.submit();
            }
        });
    </script>
@endsection

