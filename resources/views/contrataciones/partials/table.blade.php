<div class="panel-body">

    <div class="col-md-6">
        <h3>Productos</h3>
        <table class="table table-striped table-condensed ">
            <caption>Listado de productos contratados. <span><a href="{!! route('productos.index') !!}">Ver detalles</a></span></caption>
            <thead>
            <tr class="alert-info">
                <th>Producto</th>
                <th>Proveedor</th>
            </tr>
            </thead>
            <tbody>
            @if ($productos->count() > 0 )

                @foreach($productos as $producto)
                    @foreach($producto->proveedores as $proveedor)
                       @if($proveedor->pivot->contratacion == '1')
                        <tr>
                            <td>{!! $producto->producto !!}</td>
                            <td>{!! $proveedor->nombre !!}</td>
                        </tr>
                    @endif
                    @endforeach
                @endforeach
            @else
                <tr><td colspan="2">No se encontraron contrataciones.</td></tr>
            @endif
            </tbody>
        </table>
    </div>

    <div class="col-md-6">
        <h3>Servicios</h3>
        <table class="table table-striped table-condensed table-bordered">
            <caption>Listado de servicios contratados</caption>
            <thead>
            <tr class="alert-info">
                <th>Servicio</th>
                <th>Proveedor</th>
            </tr>
            </thead>
            <tbody>

            @if ($servicios->count() > 0)

                @foreach($servicios as $servicio)

                    <tr>
                        <td>{!! $servicio->nombre !!}</td>
                        <td>
                            <ul>
                            @foreach($servicio->proveedores as $proveedor)
                                    @if($proveedor->pivot->contratacion == '1')
                                        <li>{!! $proveedor->nombre !!}</li>
                                    @endif
                            @endforeach
                            </ul>
                        </td>
                    </tr>

                @endforeach

            @else
                <tr><td colspan="2">No se encontraron contrataciones.</td></tr>
            @endif
            </tbody>
        </table>
    </div>

</div>