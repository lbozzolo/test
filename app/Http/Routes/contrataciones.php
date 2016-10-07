<?php

Route::group(['prefix' => 'contrataciones', 'namespace' => 'Contrataciones'], function() {
    //Listar contrataciones
    Route::get('',[
        'as' => 'contrataciones.index',
        'uses' => 'ContratacionesController@listar'
    ]);
   /* Route::get('buscar',[
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

