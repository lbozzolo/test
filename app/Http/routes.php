<?php
use Intervention\Image\ImageManagerStatic as Image;

Route::get('/', 'Auth\AuthController@getLogin');

require (__DIR__ . '/Routes/auth.php');

Route::get('image', function (){
    $image = Image::make('public/foo.jpg')->resize(300, 200);

});

Route::group(['middleware' => 'auth'], function() {

    require (__DIR__ . '/Routes/producto.php');

    require (__DIR__ . '/Routes/usuarios.php');

    require (__DIR__ . '/Routes/servicios.php');

    require (__DIR__ . '/Routes/proveedores.php');

    require (__DIR__ . '/Routes/contrataciones.php');

});

