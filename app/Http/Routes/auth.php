<?php

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function() {

    Route::group(['middleware' => 'guest'], function() {

        Route::get('login', [
            'as' => 'auth.login',
            'uses' => 'AuthController@getLogin'
        ]);

        Route::post('login', 'AuthController@loginUser');

        Route::get('register', [
            'as' => 'auth.register',
            'uses' => 'AuthController@getRegisterUser'
            /*'uses' => 'AuthController@getRegister'*/
        ]);

        Route::post('register', 'AuthController@registerUser');

    });

    Route::get('logout', [
        'as' => 'auth.logout',
        'uses' => 'AuthController@logout',
        'middleware' => 'auth'
    ]);



});