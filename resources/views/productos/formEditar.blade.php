@extends('layout-logueado')

@section('contenido')
    @parent

    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::model($producto,['route' => ['productos.edit', $producto->id], 'method' => 'put']) !!}
                    <div class="form-group">
                        {!! Form::label('producto', 'Producto') !!}
                        {!! Form::text('producto',$producto->producto,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('precio', 'Precio') !!}
                        {!! Form::text('precio',$producto->precio,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('color','Color') !!}
                        {!! Form::select('color', $colores, $producto->colorActual, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('stock', 'Stock') !!}
                        {!! Form::text('stock',$producto->stock,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('proveedor_id','Proveedor') !!}
                        {!! Form::select('proveedor_id', $proveedores, $producto->provActual, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('users_id','Responsable') !!}
                        {!! Form::select('users_id', $users, null, ['class' => 'form-control']) !!}
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <a href="{{ route('productos.index') }}" class="btn btn-default">Cancelar<a/>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

