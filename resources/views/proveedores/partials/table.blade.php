<table class="table table-striped table-condensed ">
    <caption>Total de proveedores ({!! $proveedores->total() !!})</caption>
    <thead>
    <tr class="alert-info">
        <th>Proveedor</th>
        <th>Dirección</th>
        <th>Servicios</th>
        <th>Productos</th>
    </tr>
    </thead>
    <tbody>
    @if ($proveedores->count() > 0)
        @foreach($proveedores as $proveedor)
            <tr>
                <td>{!! ucfirst($proveedor->nombre) !!}</td>
                <td>{!! $proveedor->direccion !!}</td>
                <td>
                    <ul>
                        @foreach($proveedor->servicios_proveedores as $servicio)
                            <li>{!! $servicio->nombre !!}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach($proveedor->productos as $producto)
                            <li>{!! $producto->producto !!}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    @else
        <tr><td colspan="2">No se encontraron proveedores.</td></tr>
    @endif
    </tbody>
</table>
