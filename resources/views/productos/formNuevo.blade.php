@extends('layout-logueado')

@section('contenido')
    @parent

    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">

                    {!! Form::open(['route'=>'productos.nuevo', 'method'=>'post']) !!}

                    <div class="form-group">
                        <div class="form-group">
                            {!! Form::label('producto', 'Producto') !!}
                            {!! Form::text('producto',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('precio', 'Precio') !!}
                            {!! Form::text('precio',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('stock', 'Stock') !!}
                            {!! Form::text('stock',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('color','Color') !!}
                            {!! Form::select('color', $colores, null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('proveedores_id', 'Proveedor') !!}
                            {!! Form::select('proveedor_id', $proveedores,null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('users_id','Responsable') !!}
                            {!! Form::select('users_id', $usuarios->toArray(),null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary">Grabar</button>
                        <a href="{{ route('productos.index') }}" class="btn btn-default">Cancelar<a/>

                    {!! Form::close() !!}

                 </div>
            </div>
        </div>
    </div>


@endsection
