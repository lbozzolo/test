<?php

Route::group(['prefix' => 'proveedores', 'namespace' => 'Proveedores'], function() {
    //Listar proveedores
    Route::get('',[
        'as' => 'proveedores.index',
        'uses' => 'ProveedoresController@listar'
    ]);
    /*Route::get('buscar',[
        'as' => 'servicios.buscar',
        'uses' => 'ServiciosController@buscar'
    ]);
    Route::get('activar', [
        'as' => 'servicios.activar',
        'uses' => 'ServiciosController@activar'
    ]);
    Route::get('desactivar', [
        'as' => 'servicios.desactivar',
        'uses' => 'ServiciosController@desactivar'
    ]);*/

});

