<table class="table table-striped table-condensed table-bordered">
    <caption>Total de servicios ({!! $servicios->total() !!})</caption>
    <thead>
    <tr class="alert-info">
        <th>Categoría</th>
        <th>Servicio</th>
    </tr>
    </thead>
    <tbody>
    @if($servicios->count() > 0)

    @foreach($categorias as $categoria)
        <tr>
            <td>{!! ucfirst($categoria->nombre) !!}</td>
            <td>
                <ul class="list-unstyled">
                    @foreach($servicios as $servicio)

                        @if($servicio->categoria_id == $categoria->id)
                            <li>
                                <p>{!! ucfirst($servicio->nombre) !!}</p>
                                <table class="table table-striped table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Tarifa</th>
                                            <th>Estado</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                        @foreach($servicio->proveedores as $proveedor)

                                         <tr>
                                            <td>{!! $proveedor->nombre !!}</td>
                                            <td>${!! $proveedor->pivot->precio !!}</td>
                                            @if($proveedor->pivot->contratacion == 1)
                                                <td>ACTIVO</td>
                                                <td style="width: 100px" style="align-content: center">
                                                    <a href="{{ route('servicios.modificar', ['id' => $proveedor->id, 'srv' => $servicio->id]) }}"class="btn btn-danger" style="width: 100px">Desactivar</a>
                                                </td>
                                            @else
                                                <td><small><i>Inactivo</i></smal></td>
                                                <td style="width: 100px">
                                                    <a href="{{ route('servicios.modificar', ['id' => $proveedor->id, 'srv' => $servicio->id]) }}" class="btn btn-primary" style="width: 100px">Activar</a>
                                                </td>
                                            @endif
                                         </tr>
                                         @endforeach
                                        </tr>
                                </table>
                            </li>
                        @endif
                           
                    @endforeach
                </ul>
            </td>
        </tr>
    @endforeach    
 
    @else
        <tr><td colspan="3">No se encontraron productos.</td></tr>
    @endif
    </tbody>
</table>
