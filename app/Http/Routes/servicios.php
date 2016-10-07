<?php

Route::group(['prefix' => 'servicios', 'namespace' => 'Servicios'], function() {

    //Listar servicios
    Route::get('',[
        'as' => 'servicios.index',
        'uses' => 'ServiciosController@listar'
    ]);

    Route::get('buscar',[
        'as' => 'servicios.buscar',
        'uses' => 'ServiciosController@buscar'
    ]);

    //Activar y desactivar
    Route::get('modificar{id}/{srv}', [
        'as' => 'servicios.modificar',
        'uses' => 'ServiciosController@modificar'
    ]);
    /*Route::get('desactivar{id}', [
        'as' => 'servicios.desactivar',
        'uses' => 'ServiciosController@desactivar'
    ]);*/

});