<?php

Route::group(['prefix' => 'productos', 'namespace' => 'Productos'], function() {
    //Listar productos
    Route::get('',[
        'as' => 'productos.index',
        'uses' => 'ProductosController@listar'
    ]);
    Route::get('buscar',[
        'as' => 'productos.buscar',
        'uses' => 'ProductosController@buscar'
    ]);
    Route::get('mis-productos', [
        'as' => 'productos.mis-productos',
        'uses' => 'ProductosController@misProductos'
    ]);
    //Ingresar nuevo producto
    Route::get('nuevo', [
        'as' => 'productos.create',
        'uses' => 'ProductosController@index'
    ]);

    Route::post('nuevo', [
        'as' => 'productos.nuevo',
        'uses' => 'ProductosController@create'
    ]);
    //Editar producto
    Route::group(['prefix' => '{id}'], function() {

        Route::get('', [
            'as' => 'productos.edit',
            'uses' => 'ProductosController@show'
        ]);

        Route::put('', 'ProductosController@edit');

        Route::delete('', 'ProductosController@destroy');

    });
});

