<?php

Route::group(['prefix' => 'usuarios', 'namespace' => 'Usuarios'], function() {
    //Listar usuarios
    Route::get('',[
        'as' => 'usuarios.index',
        'uses' => 'UsuariosController@listar'
    ]);
    Route::get('buscar',[
        'as' => 'usuarios.buscar',
        'uses' => 'UsuariosController@buscar'
    ]);
    Route::group(['prefix' => '{id}'], function() {

        Route::get('perfil', [
            'as' => 'usuario.perfil',
            'uses' => 'UsuariosController@verPerfil'
        ]);

        Route::group(['middleware' => 'admin'], function() {

            Route::get('', [
                'as' => 'usuarios.edit',
                'uses' => 'UsuariosController@show'
            ]);

            Route::put('', [
                'as' => 'usuarios.edit',
                'uses' => 'UsuariosController@edit'
            ]);

            Route::delete('', [
                'as' => 'usuarios.edit',
                'uses' => 'UsuariosController@destroy'
            ]);

        });


        Route::get('password-change', [
            'as' => 'update.password',
            'uses' => 'UsuariosController@password'
        ]);
        Route::put('password-change', [
            'as' => 'update.password',
            'uses' => 'UsuariosController@updatePassword'
        ]);
    });
});

