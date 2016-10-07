@extends('layout-logueado')

@section('contenido')
    @parent

    @include('productos.partials.buscador')
    <h2>Productos</h2>

    <a href="{{ route('productos.create') }}" class="btn btn-primary">Ingresar nuevo producto</a>
    <a href="{{ route('productos.mis-productos') }}" class="btn btn-default">Ver mis productos</a>
    @include('productos.partials.table')
    {!! $productos->render() !!}

@endsection

@section('js')
    <script type="text/javascript">
        var form = $('#frm-delete-producto');

        $('.btn-delete-producto').on('click', function() {

            if (confirm('¿Desea eliminar el producto?'))
            {
                var action = form.attr('action');
                form.attr('action', action.replace(':productoId:', $(this).data('id')));
                form.submit();
            }
        });
    </script>
@endsection

