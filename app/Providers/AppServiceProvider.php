<?php

namespace App\Providers;

use App\Entities\Proveedor;
use App\Entities\Servicio;
use Illuminate\Support\ServiceProvider;
use App\Entities\Product;
use App\Entities\User;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        //
    }

    public function register()
    {
        Relation::morphMap([
            'producto' => Product::class,
            'usuario' => User::class,
        ]);

    }
}
