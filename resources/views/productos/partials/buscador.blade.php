<div class="pull-right">
    {!! Form::open(['method'=>'GET','url'=> route('productos.buscar'),'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
    <div class="input-group custom-search-form">
        {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar producto...']) !!}
        <span class="input-group-btn">
                <button class="btn btn-default-sm" type="submit"><span class="glyphicon glyphicon-search"></span></button>
            </span>
    </div>
    <div>
             <span>
                 Producto {!! Form::radio('filtro', 'producto', true) !!}
            </span>
        <span>
                 Color {!! Form::radio('filtro', 'color') !!}
            </span>
    </div>
    {!! Form::close() !!}
</div>