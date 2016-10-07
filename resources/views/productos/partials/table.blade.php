<table class="table table-striped  ">
    <caption>Total de productos ({!! $productos->total() !!})</caption>
    <thead>
    <tr class="alert-info">
        <th>Producto</th>
        <th>Precio</th>
        <th>Color</th>
        <th>Stock</th>
        <th>Responsable</th>
        <th>Proveedor</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @if ($productos->count() > 0)
        @foreach($productos as $producto)
            <tr>
                <td>{!! $producto->producto !!}</td>
                <td>$ {!! $producto->precio !!}</td>
                <td>
                    @foreach($producto->colores as $color)
                        <span class="colorUser" style="background-color: {!! $color->rgb !!}" ></span>
                        {!! $color->color !!}
                    @endforeach
                </td>
                <td>{!! $producto->stock !!}</td>
                <td>{!! ucfirst($producto->user->name) !!}
                    {!! ucfirst($producto->user->apellido) !!}
                    <code>id:{!! $producto->user->id !!}</code>
                </td>
                <td>
                    @foreach($producto->proveedores()->get() as $p)
                        {!! $p->nombre !!}
                    @endforeach
                </td>
                <td style="width: 180px">
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-info btn-productos">Editar</a>
                    <a href="javascript:;" role="button" class="btn-delete-producto btn btn-danger btn-productos" data-id="{{ $producto->id }}" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        @endforeach
    @else
        <tr><td colspan="8">No se encontraron productos.</td></tr>
    @endif
    </tbody>
</table>

{!! Form::open(['route'  => ['productos.edit', ':productoId:'],
                'method' => 'delete',
                'id'     => 'frm-delete-producto']) !!}
{!! Form::close() !!}